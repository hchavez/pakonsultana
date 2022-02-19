<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    protected $fillable = ['user_id','type','file'];

}
