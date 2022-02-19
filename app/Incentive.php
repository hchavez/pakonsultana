<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incentive extends Model
{
    protected $fillable = ['title','type','drp','expiry','image','status'];

}
