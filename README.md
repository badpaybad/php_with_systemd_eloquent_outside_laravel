# eloquent_with_out_laravel

- create php use composer, eloquent then run as systemd in centos, linux 

- https://linuxize.com/post/install-php-7-on-centos-7/
- https://www.ringingliberty.com/2016/04/19/php-script-with-systemd/

# composer.json

{
    "require": {
        "php": "*.*",
        "illuminate/database": "*.*",
        "vlucas/phpdotenv": "^4.1"
    },
    "autoload": {
        "classmap": [
            "database/"
        ]         
        ,
        "psr-4": {
            "libs\\": "libs/",
            "app\\": "app/"
        }
    },
    "config": {
        "preferred-install": "dist",
        "sort-packages": true,
        "optimize-autoloader": true
    }
}


### composer require illuminate/database
### composer require vlucas/phpdotenv
### composer dump-autoload
### composer update

# your file have begin with <?php require_once 'bootstrap.php';
run test by command line eg: /usr/bin/php /home/dunp/eloquent_with_out_laravel/program.php

# install php in linux first

https://linuxize.com/post/install-php-7-on-centos-7/

sudo yum install epel-release yum-utils

sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm

sudo yum-config-manager --enable remi-php72

sudo yum install php php-common php-opcache php-mcrypt php-cli php-gd php-curl php-mysqlnd

# create severvice for systemd

sudo nano /etc/systemd/system/eloquent_with_out_laravel.service

--- content file begin ----

[Unit]
Description=eloquent_with_out_laravel
After=network.target

[Service]
ExecStart=/usr/bin/php /home/dunp/eloquent_with_out_laravel/program.php
Restart=on-failure

[Install]
WantedBy=multi-user.target

--- content file end ----

#bash command linux

sudo systemctl enable eloquent_with_out_laravel.service

sudo systemctl stop eloquent_with_out_laravel

sudo systemctl start eloquent_with_out_laravel

sudo systemctl status eloquent_with_out_laravel

journalctl --unit eloquent_with_out_laravel --follow

in case change file systemd eg: sudo nano /etc/systemd/system/eloquent_with_out_laravel.service

sudo systemctl daemon-reload 