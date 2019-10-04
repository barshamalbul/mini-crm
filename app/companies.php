<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    public  $table = 'companies';

    public $timestamps = false;

    protected $fillable = ['id','name','email','logo','website','del_flag'];
}
