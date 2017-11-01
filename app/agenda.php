<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    // table yang digunakan
    public $table='agendas';
    //ambil data dari kategori bagian
    public function katbagian() {
    	return $this->belongsTo('App\katbagian', 'id_agenda', 'id_katbagian');
    }
}
