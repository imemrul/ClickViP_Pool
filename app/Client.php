<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['created_by','agent_id','name','address','contact_no','age','disease_type'];
    public function invoices(){
        return $this->hasMany('App\Invoice','member_id');
    }

    public function creator(){
        return $this->belongsTo('App\User','created_by');
    }
    public function agent(){
        return $this->belongsTo('App\User','agent_id');
    }
    public function prescriptions(){
        return $this->hasMany('App\Prescription', 'client_id');
    }
    public function medicine_requisition(){
        return $this->hasMany('App\Client_medicine_requisition');
    }

}
