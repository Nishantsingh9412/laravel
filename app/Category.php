<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Fillable means which fields we want to allow to be inserted into database
    protected $fillable = ['category_name'];
    // Guarded means which fields we do not want to allow to be inserted into database
    // protected $guarded = ['name'];

}
