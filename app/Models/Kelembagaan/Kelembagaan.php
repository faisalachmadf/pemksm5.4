<?php

namespace App\Models\Kelembagaan;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Kelembagaan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katbagian', 'judul','isi','tanggal','gambar', 'id_user'
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

    public function getDataByjudul($judul)
    {
        return $this->where('judul', $judul)->with(['katbagian', 'user'])->first();
    }

    public function katbagian()
    {
        return $this->belongsTo('App\Models\Kategori\Katbagian', 'id_katbagian');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function scopeGetDataByKat($query, $katid_katbagian, $limit = null, $exclude = false)
    {
        return $query->whereHas('katbagian', function($query) use ($katid_katbagian, $exclude) {
                if ($exclude) {
                    $query->whereNotIn('id_katbagian', $katid_katbagian);
                } else {
                    $query->whereIn('id_katbagian', $katid_katbagian);
                }
            })
            ->with(['katbagian', 'user'])
            ->orderBy('tanggal', 'desc')
            ->take($limit);
    }

    public function scopeGetData($query, $katid_katbagian = '', $id_katbagian = '')
    {
        return $query->whereHas('katbagian', function($query) use ($katid_katbagian) {
                if (empty($katid_katbagian)) {
                    $query->where('id_katbagian', '<>', $katid_katbagian);
                } else {
                    $query->where('id_katbagian', $katid_katbagian);
                }
            })
            ->where(function($query) use ($id_katbagian) {
                if (empty($id_katbagian)) {
                    $query->where('id_katbagian', '<>', $id_katbagian);
                } else {
                    $query->where('id_katbagian', $id_katbagian);
                }
            })
            ->with(['katbagian', 'user'])
            ->orderBy('tanggal', 'desc');
    }

}
