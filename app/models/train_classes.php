<?php
namespace app\models;

use Illuminate\Database\Eloquent\Model;

class train_classes extends Model
{
    public $table = 'train_classes';
    public $timestamps = true;
    protected $fillable = [
        'tenant_id',
        'center_id',
        'course_id',
        'code',
        'fullname',
        'number_of_session',
        'number_of_hours',
        'number_of_session_vietnam_teacher',
        'number_of_session_foreign_teacher',
        'open_at',
        'close_at',
        'status',
        'note',
        'type_cost',
        'is_deleted',
        'created_by',
        'updated_by'
    ];

  
}
