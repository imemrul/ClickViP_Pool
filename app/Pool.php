<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = 'pools';
    protected $fillable = ['pool_id','host_id','title','occupancy','emirates', 'address','latitude','longitude', 'host_on_premise','rules_at_premise','pool_description','barbecue_per_booking','towel_price_per_person','allow_instant_booking','status','popularity_status'];
    public function session_wise_price(){
        return $this->hasMany('App\Weekly_session_wise_pool_price');
    }
    public function images(){
        return $this->hasMany('App\Pool_image');
    }
    public function facilities(){
        return $this->hasMany('App\Pool_facility');
    }
    public function location(){
<<<<<<< HEAD
        return $this->belongsTo('App\Location');
    }
=======
        return $this->belongsTo('App\Location','emirates');
    }

>>>>>>> 88e6af949433281688a5863a52939b899109cbdf
}
