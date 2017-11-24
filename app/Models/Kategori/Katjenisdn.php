<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katjenisdn extends Model
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

    public function kerjasamadns()
    {
        return $this->hasMany('App\Models\Kerjasama\Kerjasamadns', 'id_katdn');
    }
}
