<?php require_once 'bootstrap.php';

use app\models\train_classes;
use Carbon\Carbon;
use app\models\test_mongo;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

// $x=new test_mongo();
// $x->school_id=1234567890;
// $x->Save();

foreach (test_mongo::all() as $item)
{
    echo "\r\n";
    echo $item->school_id;
}