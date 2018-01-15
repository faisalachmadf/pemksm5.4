<?php

namespace App\Models\Mitra;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Mitraln extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katmitraln', 'judul', 'isi', 'gambar', 'id_user', 'slug'
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
        return $this->where('slug', $slug)->with(['katmitraln', 'user'])->first();
    }

    public function katmitraln()
    {
        return $this->belongsTo('App\Models\Kategori\Katmitraln', 'id_katmitraln');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katmitraln', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katmitraln', 'user'])
            ->orderBy('created_at', 'desc')
            ->take($limit);
    }
}
