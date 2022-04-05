<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title','descOne','descTwo','btnUrl','activeTo','slide_image'];
}
