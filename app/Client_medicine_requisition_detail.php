<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_medicine_requisition_detail extends Model
{
    protected $fillable = ['client_medicine_requisition_id', 'medicine_name', 'day','evening','night','order_qty','total_amount','after_discount','next_purchase_date','is_acknowledged'];
}
