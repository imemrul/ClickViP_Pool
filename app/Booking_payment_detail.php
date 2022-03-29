<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_payment_detail extends Model
{
    protected $fillable = ['booking_id', 'transaction_id','receipt_url', 'currency', 'amount', 'amount_captured', 'amount_refunded', 'paid_status'];

    public function  booking(){
        return $this->belongsTo(Booking::class);
    }
}
