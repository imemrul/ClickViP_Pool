<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['client_id', 'prescription_date', 'name_of_doctor', 'speciality', 'phone', 'description', 'attachment'];
}
