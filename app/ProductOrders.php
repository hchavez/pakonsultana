<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrders extends Model
{
    protected $fillable = ['user_id','total','order_receipt','status'];

   public function details()
        {
            return $this->hasMany( 'App\ProductOrdersDetails', 'order_id' );
        }

   public function user()
  {
    return $this->belongsTo('App\User', 'id');
  }

}
