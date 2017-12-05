<?php

namespace App\Models\Mitra;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Mitradn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katmira', 'judul', 'isi', 'gambar', 'id_user', 'slug'
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
        return $this->where('slug', $slug)->with(['katmitra', 'user'])->first();
    }

    public function katmitra()
    {
        return $this->belongsTo('App\Models\Kategori\Katmitra', 'id_katmitra');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
