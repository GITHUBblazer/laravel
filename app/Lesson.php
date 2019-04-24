<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
     use SoftDeletes;
     protected $table = 'lesson';

     // public $timestamps = false;

    //  const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';
      protected $dates = ['deleted_at'];


}