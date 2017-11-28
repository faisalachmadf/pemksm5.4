<?php

namespace App\Models\DataKerjasama;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class KerjasamaLn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katln', 'id_katjenisln', 'tahun', 'nomor', 'judul', 'pihak', 'summary', 'tanggal_awal', 'tanggal_akhir', 'id_katopd', 'keterangan', 'gambar', 'slug', 'id_user'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            $user = Sentinel::getUser();

            if ($user) {
                $model->id_user = $user->id;
            }
        });
    }

    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->with(['katln', 'katjenisln', 'katopd', 'user'])->first();
    }

    public function katln()
    {
        return $this->belongsTo('App\Models\Kategori\Katln', 'id_katln');
    }

    public function katjenisln()
    {
        return $this->belongsTo('App\Models\Kategori\Katjenisln', 'id_katjenisln');
    }

    public function katopd()
    {
        return $this->belongsTo('App\Models\Kategori\Katopd', 'id_katopd');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
