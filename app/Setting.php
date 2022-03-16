<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name', 'url', 'image', 'username', 'password', 'senderid', 'peid', 'app', 'message', 'mobile', 'whatsapp', 'instamojo', 'facebook', 'email', 'tc', 'about', 'privacy', 'normal_charges', 'minimum_amount', 'express_charges', 'express_delivery', 'slots', 'normal_message', 'express_message', 'min_time', 'store_timings', 'version', 'razorpaykey'];
}
