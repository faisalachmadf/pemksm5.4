<?php

namespace App\Models\Lppd;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class GaleriLppd extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'gambar', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['gambars', 'tags', 'user'])->first();
    }

    public function gambars()
    {
        return $this->hasMany('App\Models\Lppd\GaleriLppdGambar', 'id_galeri_lppd');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'galeri_lppd_tag', 'id_galeri_lppd', 'id_tag')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
