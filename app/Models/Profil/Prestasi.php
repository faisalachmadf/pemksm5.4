<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'isi', 'slug', 'gambar'
    ];

    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
        
    }

     public function ScopeUrutan($query)
    {
        return $query->OrderBy('created_at','desc');

    }
}
