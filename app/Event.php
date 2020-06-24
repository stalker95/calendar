<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title', 'user_id', 'push_event', 'start_data', 'end_data', 'description'
    ];

    public function getStartYearAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->start_data)->year;
    }

    public function getStartMonthAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->start_data)->month;
    }

    public function getStartDayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->start_data)->day;
    }



    public function getEndYearAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->end_data)->year;
    }

    public function getEndMonthAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->end_data)->month;
    }

    public function getEndDayAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->end_data)->day;
    }
}
