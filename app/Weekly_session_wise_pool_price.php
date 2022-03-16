<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekly_session_wise_pool_price extends Model
{
    protected $table = 'weekly_session_wise_pool_prices';
    protected $fillable = ['pool_id','weekly_session_id','date','price'];
<<<<<<< HEAD
=======
    public function pool(){
        return $this->belongsTo('App\Pool');
    }
    public function weekly_session_time_slot(){
        return $this->belongsTo('App\Weekly_session_timing','weekly_session_id');
    }
>>>>>>> 88e6af949433281688a5863a52939b899109cbdf
}
