<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class links extends Model
{
    //table name
    protected $table = 'links';
    //primary key
    public $primaryKey = 'id';
    //timestamps
    public $timestamp = true;
}
