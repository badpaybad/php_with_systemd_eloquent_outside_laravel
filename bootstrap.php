<?php

/*begin:require first */
define('__ROOT__', dirname(__FILE__));

echo "RootDir: " . __ROOT__ . "\r\n";

require_once  __ROOT__ . '/vendor/autoload.php';

echo "autoload.php init done\r\n";

// use libs\AppEnv;

// $appEnv = AppEnv::load_env(__ROOT__ . '/.env');

// echo ".env loaded: at " . __ROOT__ . "/.env\r\n";

function get_env($key, $defaultValue = '')
{
    return $defaultValue;
   // return AppEnv::get_env($key, $defaultValue);
}

/*end:require first */

/*begin:config_db*/

use Illuminate\Database\Capsule\Manager as Capsule;



$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => get_env('DB_HOST'),
    'port'      => get_env('DB_PORT'),
    'database'  => get_env('DB_DATABASE'),
    'username'  =>  get_env('DB_USERNAME'),
    'password'  =>  get_env('DB_PASSWORD'),
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix'    => '',
]);

$capsule->addConnection([
        'driver' => 'mongodb',
        'host' => env('HANETMONGODB_HOST', 'localhost'),
        'port' => env('HANETMONGODB_PORT', 27017),
        'database' => env('HANETMONGODB_DATABASE', 'du_test'),
        'username' => env('HANETMONGODB_USERNAME', 'du_test'),
        'password' => env('HANETMONGODB_PASSWORD', 'du_test'),
        'options' => [
            // here you can pass more settings to the Mongo Driver Manager
            // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use

            'database' => env('HANETMONGODB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
        ],
],'hanetmongodb');

$capsule->setAsGlobal();
$capsule->bootEloquent();
/*end:config_db*/

//mongodb
//https://www.php.net/manual/en/mongodb.installation.windows.php
$capsule->getDatabaseManager()->extend('mongodb', function($config, $name) {
    $config['name'] = $name;

    return new Jenssegers\Mongodb\Connection($config);
});