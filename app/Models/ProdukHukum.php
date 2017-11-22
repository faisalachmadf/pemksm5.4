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
}
