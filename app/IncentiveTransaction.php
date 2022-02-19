<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncentiveTransaction extends Model
{
    protected $fillable = ['incentive_id','user_id','type','created_at','status'];

}
