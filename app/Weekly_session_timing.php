<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekly_session_timing extends Model{
    protected $table = 'weekly_session_timings';
    protected $fillable = ['id', 'host_id', 'week_day', 'title', 'start_from', 'end_at'];
}