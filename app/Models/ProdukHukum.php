<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class ProdukHukum extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kathukum', 'nama', 'file', 'diunduh', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['kathukum', 'user'])->first();
    }

    public function kathukum()
    {
        return $this->belongsTo('App\Models\Kategori\Kathukum', 'id_kathukum');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function scopeGetData($query, $katSlug = '', $slug = '')
    {
        return $query->whereHas('kathukum', function($query) use ($katSlug) {
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
            ->with(['kathukum', 'user'])
            ->orderBy('tanggal', 'desc');
    }

    public function scopeDiunduh($query, $slug)
    {
        return $query->where('slug', $slug)->increment('diunduh');
    }

    public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('kathukum', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['kathukum', 'user'])
            ->orderBy('created_at', 'desc')
            ->take($limit);
    }
}
