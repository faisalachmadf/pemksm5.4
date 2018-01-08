<?php

namespace App\Models\DataKerjasama;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class KerjasamaDn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katdn', 'id_katjenisdn', 'tahun', 'nomor', 'judul', 'pihak', 'summary', 'tanggal_awal', 'tanggal_akhir', 'id_katopd', 'keterangan', 'gambar', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['katdn', 'katjenisdn', 'katopd', 'user'])->first();
    }

    public function katdn()
    {
        return $this->belongsTo('App\Models\Kategori\Katdn', 'id_katdn');
    }

    public function katjenisdn()
    {
        return $this->belongsTo('App\Models\Kategori\Katjenisdn', 'id_katjenisdn');
    }

    public function katopd()
    {
        return $this->belongsTo('App\Models\Kategori\Katopd', 'id_katopd');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

     public function scopeGetNow($query, $limit = null)
    {
        return $query->with('katdn')
            ->whereDate('tanggal_awal', date('Y-m-d'))
            ->take($limit);
    }

     public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katdn', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc')
            ->take($limit);
    }


    public function scopeGetData($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('katdn', function($query) use ($katSlug) {
                if (empty($katSlug)) {
                    $query->where('slug', '<>', $katSlug);
                } else {
                    $query->where('slug', $katSlug);
                }
            })
            ->where(function($query) use ($slug) {
                if (empty($slug)) {
                    $query->where('slug', '<>', $slug);
                } else {
                    $query->where('slug', $slug);
                }
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }


    public function scopeGetSearch($query, $katSlug = '')
    {
        return $query->where(function($query) use ($katSlug) {
                $query->where('judul', 'like', '%'.$katSlug.'%')
                    ->orWhere('nomor', 'like', '%'.$katSlug.'%')
                    ->orWhere('summary', 'like', '%'.$katSlug.'%');
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }
}
