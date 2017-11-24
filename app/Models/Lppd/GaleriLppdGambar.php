<?php

namespace App\Models\Lppd;

use Illuminate\Database\Eloquent\Model;

class GaleriLppdGambar extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_galeri_lppd', 'gambar'
    ];

    public function galeriLppd()
    {
        return $this->belongsTo('App\Models\Lppd\GaleriLppd', 'id_galeri_lppd');
    }
}
