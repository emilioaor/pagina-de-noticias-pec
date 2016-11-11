<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{
    
    protected $table = 'contacto';

    protected $fillable = ['name','email','message'];
}
