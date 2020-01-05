<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','att_date', 'att_year', 'edit_date','attendance', 'month'
    ];
}
