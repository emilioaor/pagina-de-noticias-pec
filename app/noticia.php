<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    protected $table = 'noticias';

    protected $fillable = ['autor','titulo','noticia','estatus'];

    public function user(){

    	return $this->belongsTo('App\user','autor');
    }
}
