<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['product_name','product_code','category_id','supplier_id','product_garage','product_route','buying_date','expire_date','buying_price','selling_price','product_image'];
}
