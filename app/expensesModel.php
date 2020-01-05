<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expensesModel extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'details','amount', 'month', 'date','year',
    ];
}
