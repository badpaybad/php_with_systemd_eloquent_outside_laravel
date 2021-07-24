<?php

namespace app\models;
//https://github.com/goldspecdigital/laravel-eloquent-uuid
use Jenssegers\Mongodb\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

//composer require ramsey/uuid
class test_mongo extends Model{
    use Uuid;
    protected $connection = 'hanetmongodb';

    protected $collection = 'class_schools';
    
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        "id",
        "department_id",
        "division_id",
        "school_id",       
    ];
}