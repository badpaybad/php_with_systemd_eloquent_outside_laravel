<?php require_once 'bootstrap.php';

use app\models\train_classes;
use Carbon\Carbon;

//todo process never end and run as services
set_time_limit(0);
$counter = 0;
while (true) {
    try {
        $counter++;
        echo Carbon::now() . " counted at: " . $counter . "\r\n";
    } catch (\Exception $ex) {
        echo 'log your error';
    }
    usleep(1 * 1000000);
}

/*begin:your main code*/

// $firstClass=train_classes::first();
// echo json_encode($firstClass);

/*end:your main code*/

/*
https://linuxize.com/post/install-php-7-on-centos-7/
sudo yum install epel-release yum-utils
sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
sudo yum-config-manager --enable remi-php72
sudo yum install php php-common php-opcache php-mcrypt php-cli php-gd php-curl php-mysqlnd

create severvice for systemd
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

*/
