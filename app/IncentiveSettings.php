<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncentiveSettings extends Model
{
    protected $fillable = ['site_name','limit_withdraw','min_withdraw','premium_package','vip_package','premium_referral','vip_referral'];

}
