<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplierModel extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'address','nid_no','type','shop_name','account_holder', 'account_no','bank_name','branch_name', 'city','image',
    ];
}
