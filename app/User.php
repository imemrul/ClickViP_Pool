<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
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
        'full_name', 'email', 'password','phone','photo','address','roll_id','account_type','referrer_commission','branch_id','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
