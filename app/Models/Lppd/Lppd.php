<?php

namespace App\Models\Lppd;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Lppd extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'isi', 'tanggal', 'file', 'slug', 'id_user', 'diunduh'
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
        return $this->where('slug', $slug)->with(['user'])->first();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

      public function ScopeUrutan($query)
    {
        return $query->OrderBy('created_at','desc');

    }

     public function scopeDiunduh($query, $slug)
    {
        return $query->where('slug', $slug)->increment('diunduh');
    }
}

