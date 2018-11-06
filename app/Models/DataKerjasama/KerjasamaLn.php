<?php

namespace App\Models\DataKerjasama;

use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class KerjasamaLn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katln', 'id_katjenisln', 'tahun', 'nomor', 'judul', 'pihak', 'summary', 'tanggal_awal', 'tanggal_akhir', 'id_katopd', 'keterangan', 'gambar', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['katln', 'katjenisln', 'katopd', 'user'])->first();
    }

    public function katln()
    {
        return $this->belongsTo('App\Models\Kategori\Katln', 'id_katln');
    }

    public function katjenisln()
    {
        return $this->belongsTo('App\Models\Kategori\Katjenisln', 'id_katjenisln');
    }

    public function katopd()
    {
        return $this->belongsTo('App\Models\Kategori\Katopd', 'id_katopd');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

     public function scopeGetNow($query, $limit = null)
    {
        return $query->with('katln')
            ->whereDate('tanggal_awal', date('Y-m-d'))
            ->take($limit);
    }

     public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katln', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katln', 'user'])
            ->orderBy('tanggal_awal', 'desc')
            ->take($limit);
    }


    public function scopeGetData($query, $katSlug = '', $slug = '', $timeout = '', $overdue = 0)
    {
        return $query->whereHas('katln', function($query) use ($katSlug, $timeout) {
                if (empty($katSlug) || !empty($timeout)) {
                    $query->where('slug', '<>', $katSlug);
                } else {
                    $query->where('slug', $katSlug);
                }
            })
            ->where(function($query) use ($slug, $timeout, $overdue) {
                $now = Carbon::now();
                $then = $now->copy()->addDays($overdue)->endOfDay();

                if (empty($slug)) {
                    $query->where('slug', '<>', $slug);
                } else {
                    $query->where('slug', $slug);
                }

                if ($timeout == 'masih') {
                    $query->where('tanggal_akhir', '>', $now->endOfDay()->toDateString());
                } else if ($timeout == 'hampir') {
                    $query->where('tanggal_akhir', '>=', $now->endOfDay()->toDateString())
                        ->where('tanggal_akhir', '<=', $then->toDateString());
                } else if ($timeout == 'sudah') {
                    $query->where('tanggal_akhir', '<', $now->toDateString());
                }
            })
            ->with(['katln', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }


    public function scopeGetSearch($query, $katSlug = '')
    {
        return $query->where(function($query) use ($katSlug) {
                $query->where('judul', 'like', '%'.$katSlug.'%')
                    ->orWhere('nomor', 'like', '%'.$katSlug.'%')
                    ->orWhere('summary', 'like', '%'.$katSlug.'%');
            })
            ->with(['katln', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }
}
