<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrderDetails extends Model
{
    protected $fillable = ['order_id','product_id','quantity','price'];

}