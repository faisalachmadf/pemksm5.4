<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katbagian extends Model
{
    protected $table='katbagians';
    protected $fillable =
    ['id_katbagian','name'];

    public function agenda() 
    {
    	return $this->hasMany('App\agenda', 'id_katbagian', 'id_agenda');
    }
}
