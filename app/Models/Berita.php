<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Berita extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katberita', 'judul', 'isi', 'tanggal', 'gambar', 'id_user', 'slug', 'dibaca'
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
        return $this->where('slug', $slug)->with(['katberita', 'user'])->first();
    }

    public function katberita()
    {
        return $this->belongsTo('App\Models\Kategori\Katberita', 'id_katberita');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katberita', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katberita', 'user'])
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }

    public function scopeGetPopular($query, $limit = null)
    {
        return $query->with(['katberita', 'user'])
            ->orderBy('dibaca', 'desc')
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }

    public function scopeGetData($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('katberita', function($query) use ($katSlug) {
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
            ->with(['katberita', 'user'])
            ->orderBy('tanggal', 'desc');
    }

    public function scopeDibaca($query, $slug)
    {
        return $query->where('slug', $slug)->increment('dibaca');
    }
}
