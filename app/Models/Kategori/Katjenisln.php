<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katjenisln extends Model
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

    public function kerjasamaLns()
    {
        return $this->hasMany('App\Models\DataKerjasama\KerjasamaLn', 'id_katjenisln');
    }
}
