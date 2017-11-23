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
}
