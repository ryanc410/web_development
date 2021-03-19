#!/bin/bash

TEXTBELT_KEY=

message()
{
        curl -X POST https://textbelt.com/text \
        --data-urlencode phone='8323399606' \
        --data-urlencode message='Server no longer accessible on the Network.' \
        -d key=${TEXTBELT_KEY}
}
while :
do
    ping -i 3600 10.0.0.39 1> /dev/null
    if [[ $? -ne 0 ]]; then
        message
    fi
done
