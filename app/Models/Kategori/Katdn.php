<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katdn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];

   
    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function kerjasamaDns()
    {
        return $this->hasMany('App\Models\DataKerjasama\KerjasamaDn', 'id_katdn');
    }
}
