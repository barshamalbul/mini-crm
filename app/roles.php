<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    public  $table = 'roles';

    protected $fillable = ['id','name','roles','description','created_at','updated_at',];
}
