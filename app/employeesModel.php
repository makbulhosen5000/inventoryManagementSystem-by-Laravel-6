<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeesModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'address','nid_no', 'experience','salary', 'vacation', 'city','image',
    ];
}
