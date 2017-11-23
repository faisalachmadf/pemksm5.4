<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katmitra extends Model
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

    public function mitradns()
    {
        return $this->hasMany('App\Models\Mitra\Mitradns', 'id_katgolongan');
    }

    public function mitralns()
    {
        return $this->hasMany('App\Models\Mitra\Mitralns', 'id_katgolongan');
    }
}
