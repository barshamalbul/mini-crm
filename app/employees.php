<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    public  $table = 'employees';

    protected $fillable = ['id','first_name','last_name','email','phone','company'];
}
