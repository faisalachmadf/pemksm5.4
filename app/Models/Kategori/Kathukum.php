<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Kathukum extends Model
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

    public function produkHukums()
    {
        return $this->hasMany('App\Models\ProdukHukum', 'id_kathukum');
    }
}
