<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Model;

class Selayang extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'isi', 'aktif', 'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function($model) {
            if (self::count() == 0) {
                $model->aktif = true;
            }
        });
    }

    public static function setNotActive($exclude = 0)
    {
        self::where('id', '<>', $exclude)->update(['aktif' => false]);
    }

    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    public function scopeGetAktif()
    {
        return $this->where('aktif', true);
    }
}
