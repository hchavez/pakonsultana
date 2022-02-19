<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
    protected $fillable = ['id','created_at','payment_method','amount','status'];

}
