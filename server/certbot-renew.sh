#!/bin/bash

# python -c 'import random; import time; time.sleep(random.random() * 3600)' && certbot renew 
certbot renew
rsync -rptgoDLAuX /etc/letsencrypt/live/arch.yudong.dev/ /opt/backup/arch.yudong.dev

#   -r = recursive
#   -L = resolve symlinks
#   -p = preserve permissions
#   -t = preserve timestamps
#   -g = preserve groups
#   -o = preserve owner
#   -D = preserve device files (super user only)
#	-A = preserve acls
#	-u = update = skip files that are newer on the receiver
#	-v = verbose
#	-X = preserve extended attributes