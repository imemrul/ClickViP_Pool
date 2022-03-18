<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [

        'pool_id','guest_id','session_wise_pool_id','adult_qty','children_qty','infants_qty',
        'barbeque_qty','towels_qty','barbeque_price', 'towel_price',
        'servicecharge','vat','total','booking_status','payment_status'
    ];
    public function host(){
        return $this->belongsTo('App\User','host_id');
    }
    public function guest(){
        return $this->belongsTo('App\User','guest_id');
    }
    public function pool(){
        return $this->belongsTo('App\Pool','pool_id');
    }
    public function facilities(){
        return $this->hasMany('App\Pool_facility');
    }
    public function payment_details(){
        return $this->hasOne('App\Booking_payment_detail');
    }
}
