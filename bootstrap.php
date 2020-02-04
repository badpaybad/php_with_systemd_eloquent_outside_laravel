<?php

/*begin:require first */
define('__ROOT__', dirname(__FILE__));

echo "RootDir: " . __ROOT__ . "\r\n";

require_once  __ROOT__ . '/vendor/autoload.php';

echo "autoload.php init done\r\n";

use libs\AppEnv;

$appEnv = AppEnv::load_env(__ROOT__ . '/.env');

echo ".env loaded: at " . __ROOT__ . "/.env\r\n";

function get_env($key, $defaultValue = '')
{
    return AppEnv::get_env($key, $defaultValue);
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

$capsule->setAsGlobal();
$capsule->bootEloquent();
/*end:config_db*/
