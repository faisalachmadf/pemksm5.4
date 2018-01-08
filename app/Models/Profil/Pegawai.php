<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katbagian', 'id_katgolongan', 'id_katjabatan', 'nip', 'nama', 'jabatan','mulaijabat', 'pendidikan', 'riwayatkerja', 'gambar'
    ];

    public function getDataByNip($nip)
    {
        return $this->where('nip', $nip)->with(['katbagian', 'katjabatan', 'katgolongan'])->first();
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function katbagian()
    {
        return $this->belongsTo('App\Models\Kategori\Katbagian', 'id_katbagian');
    }

    public function katjabatan()
    {
        return $this->belongsTo('App\Models\Kategori\Katjabatan', 'id_katjabatan');
    }

    public function katgolongan()
    {
        return $this->belongsTo('App\Models\Kategori\Katgolongan', 'id_katgolongan');
    }

    public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katjabatan', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katjabatan', 'user'])
            ->orderBy('created_at', 'desc')
            ->take($limit);
    }
}
