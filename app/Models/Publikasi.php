<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Publikasi extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katfile', 'judul', 'tanggal', 'file', 'slug', 'id_user', 'diunduh'
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
        return $this->where('slug', $slug)->with(['katfile', 'user'])->first();
    }

    public function katfile()
    {
        return $this->belongsTo('App\Models\Kategori\Katfile', 'id_katfile');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
