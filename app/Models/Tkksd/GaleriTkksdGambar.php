<?php

namespace App\Models\Tkksd;

use Illuminate\Database\Eloquent\Model;

class GaleriTkksdGambar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_galeri_tkksd', 'gambar'
    ];

    public function galeriTkksd()
    {
        return $this->belongsTo('App\Models\Tkksd\GaleriTkksd', 'id_galeri_tkksd');
    }
}
