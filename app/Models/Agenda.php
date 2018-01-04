<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Agenda extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katbagian', 'judul', 'jam', 'tanggal', 'lokasi', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['katbagian', 'user'])->first();
    }

    public function katbagian()
    {
        return $this->belongsTo('App\Models\Kategori\Katbagian', 'id_katbagian');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

     public function scopeGetNow($query, $limit = null)
    {
        return $query->with('katbagian')
            ->whereDate('tanggal', date('Y-m-d'))
            ->take($limit);
    }

     public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katbagian', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katbagian', 'user'])
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }


    public function scopeGetData($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('katbagian', function($query) use ($katSlug) {
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
            ->with(['katbagian', 'user'])
            ->orderBy('tanggal', 'desc');
    }


    public function scopeGetSearch($query, $katSlug = '')
    {
        return $query->where(function($query) use ($katSlug) {
                $query->where('judul', 'like', '%'.$katSlug.'%')
                    ->orWhere('tanggal', 'like', '%'.$katSlug.'%');
            })
            ->with(['katbagian', 'user'])
            ->orderBy('tanggal', 'desc');
    }
}
