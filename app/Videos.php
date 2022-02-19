<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = ['id','category','title','link','status','created_at'];

}
