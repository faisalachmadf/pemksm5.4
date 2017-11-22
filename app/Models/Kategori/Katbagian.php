<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katbagian extends Model
{
    protected $fillable =['name','slug'];
    
    
   
    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function pegawais()
    {
        return $this->hasMany('App\Models\Profil\Pegawai', 'id_katbagian');
    }
    
    public function kelembagaans()
    {
        return $this->hasMany('App\Models\Kelembagaan\Kelembagaan', 'id_katbagian');
    }
}
