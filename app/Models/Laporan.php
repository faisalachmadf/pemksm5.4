<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Laporan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katlaporan', 'judul', 'isi', 'tanggal', 'file', 'slug', 'id_user', 'diunduh'
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
        return $this->where('slug', $slug)->with(['katlaporan', 'user'])->first();
    }

    public function katlaporan()
    {
        return $this->belongsTo('App\Models\Kategori\Katlaporan', 'id_katlaporan');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function scopeGetDataByKat($query, $katSlug, $limit = null, $exclude = false)
    {
        return $query->whereHas('katlaporan', function($query) use ($katSlug, $exclude) {
                if ($exclude) {
                    $query->whereNotIn('slug', $katSlug);
                } else {
                    $query->whereIn('slug', $katSlug);
                }
            })
            ->with(['katlaporan', 'user'])
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }

    public function scopeGetPopular($query, $limit = null)
    {
        return $query->with(['katlaporan', 'user'])
            ->orderBy('diunduh', 'desc')
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }

    public function scopeGetData($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('katlaporan', function($query) use ($katSlug) {
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
            ->with(['katlaporan', 'user'])
            ->orderBy('tanggal', 'desc');
    }

    public function scopeDiunduh($query, $slug)
    {
        return $query->where('slug', $slug)->increment('diunduh');
    }

    public function scopeGetSearch($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('katlaporan', function($query) use ($katSlug) {
                if (empty($katSlug)) {
                    $query->where('slug', '<>', $katSlug);
                } else {
                    $query->where('slug', $katSlug);
                }
            })
            ->where(function($query) use ($slug) {
                $query->where('judul', 'like', '%'.$slug.'%');
            })
            ->with(['katlaporan', 'user'])
            ->orderBy('tanggal', 'desc');
    }
}
