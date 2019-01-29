#!/bin/bash

FILE="google"
TYPE="resume" # or "cv"

svgtopdf "$FILE.svg"
# svglinkify "$FILE.svg" "$FILE.pdf"
pdftk "$FILE.pdf" dump_data output dump.txt

head -n 1 dump.txt > dump.2.txt
cat meta-$TYPE.txt | tee -a dump.2.txt 
tail -n +2 dump.txt | tee -a dump.2.txt

pdftk "$FILE.pdf" update_info dump.2.txt output "$FILE.copy.pdf"
mv "$FILE.copy.pdf" "$FILE.pdf"
rm dump.txt dump.2.txt


# exiftool -Title="Sun Yudong - Curriculum Vitae" -Author="Sun Yudong" -overwrite_original resume.pdf

