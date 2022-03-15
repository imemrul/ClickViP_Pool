<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_medicine_requisition extends Model
{
    protected $fillable = ['client_id', 'date_of_requisition', 'remarks','created_by'];

    public function requisition_details(){
        return $this->hasMany('App\Client_medicine_requisition_detail','client_medicine_requisition_id');
    }
}
