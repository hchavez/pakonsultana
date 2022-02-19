<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayoutTransactions extends Model
{
    protected $fillable = ['user_id','amount','method','status'];

}
		