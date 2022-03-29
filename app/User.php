<?php

namespace App;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use MustVerifyEmail, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password','phone','photo','address','roll_id','account_type','referrer_commission','branch_id','status','is_email_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function members(){
        return $this->hasMany('App\Client','executive_id','id');
    }
    public function member_of_collectors(){
        return $this->hasMany('App\Client','collector_id','id');
    }
    public function activities(){
        return $this->hasMany('App\Activity','executive_id');
    }
    public function activities_of_this_month(){
        return $this->hasMany('App\Activity','executive_id')->whereBetween('start_time',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()]);
    }


}
