<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    //table name
    protected $table = 'profile';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamp = true;
}
