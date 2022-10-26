<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['cat_id','brand_id','product_name','quantity','price','image'];
    protected $table = 'products';
    }
