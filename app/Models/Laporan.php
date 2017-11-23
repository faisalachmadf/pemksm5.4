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
}
