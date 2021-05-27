#!/bin/bash

HASH=`curl -sS https://composer.github.io/installer.sig`

if [[ $EUID -ne 0 ]]; then
    clear
    echo "****** SCRIPT MUST BE RAN WITH ROOT PRIVILEGES! ******"
    sleep 3
    exit 1
else
    apt update
fi

which unzip &>/dev/null
if [[ $? -ne 0 ]]; then
    apt install unzip -y
fi

apt install php-cli -y &>/dev/null

curl -sS https://getcomposer.org/installer -o composer-setup.php

php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo ''; } else { unlink('composer-setup.php'); } echo PHP_EOL;" &>/dev/null
if [[ $? -eq 0 ]]; then
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
else
    exit 3
fi
