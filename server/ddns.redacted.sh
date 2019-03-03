#!/bin/bash
# Script that updates cloudflare for home.yudong.dev

ZONE="<ZONE>"
AuthEmail="<EMAIL>"
AuthKey="<AUTH KEY>"
ddnsDNS_id="<DNS ID>"

logFile="/srv/http/ddns.log"
logLimit=50

IPv4=$(curl -s "http://ipv4.icanhazip.com/")

# curl -X GET "https://api.cloudflare.com/client/v4/zones/$ZONE/dns_records/" \
#      -H "X-Auth-Email: $AuthEmail" \
#      -H "X-Auth-Key: $AuthKey" \
#      -H "Content-Type: application/json"

start_Log_WC=$(wc -l <"$logFile")

A_REC='{"type":"A","name":"arch.yudong.dev","content":"'$IPv4'","ttl":1,"proxied":false}'

curl -X PUT "https://api.cloudflare.com/client/v4/zones/$ZONE/dns_records/$ddnsDNS_id" \
     -H "X-Auth-Email: $AuthEmail" \
     -H "X-Auth-Key: $AuthKey" \
     -H "Content-Type: application/json" \
     --data "$A_REC"  &>> "$logFile"

echo -e "\n\n" >> "$logFile"

end_Log_WC=$(wc -l <"$logFile")

# Check if log file is too big
if [[ $end_Log_WC -ge $logLimit ]]; then
    unbuffer tail -n $logLimit "$logFile" &> "$logFile.temp"
    mv "$logFile.temp" "$logFile"
fi
