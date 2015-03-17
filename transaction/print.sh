#!/usr/bin/bash
echo "test:$1 ms:$(($(date +%s%N)/1000000))" >> print.log
touch bear$1
