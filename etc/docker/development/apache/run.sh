#!/bin/bash
chown root:root /app -R

cp -r /root/.hostssh /root/.ssh

chown root:root -R /root/.ssh

if [ "$ALLOW_OVERRIDE" = "**False**" ]; then
    unset ALLOW_OVERRIDE
else
    sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
    a2enmod rewrite
fi

source /etc/apache2/envvars

/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
