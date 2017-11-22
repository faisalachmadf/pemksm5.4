<?php

namespace App\Models\Kelembagaan;

use Illuminate\Database\Eloquent\Model;

class Kelembagaan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katbagian', 'judul','isi','tanggal','gambar'
    ];

    public function getDataByjudul($judul)
    {
        return $this->where('judul', $judul)->with(['katbagian'])->first();
    }

    public function katbagian()
    {
        return $this->belongsTo('App\Models\Kategori\Katbagian', 'id_katbagian');
    }

}
