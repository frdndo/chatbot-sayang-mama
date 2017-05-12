<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $fillable = [
        'id','nama','created_at','updated_at','deleted_at',
            'updated_by',
            'deleted_by',
    ];
}
