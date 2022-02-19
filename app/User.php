<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','username','email', 'password','birthdate','contact','address','package_option','payment_option','travel_agency_name','referral_id','role','incentive_option','receipt','pre_package','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function referrer()
        {
            return $this->belongsTo( 'App\User', 'referral_id' );
        }

    public function referrals()
        {
            return $this->hasMany( 'App\User', 'referral_id' );
        }


}
