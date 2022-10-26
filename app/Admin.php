<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['name','email','password','confirm_password'];
    protected $hidden = ['password'];
    protected $table = 'admins';
}
