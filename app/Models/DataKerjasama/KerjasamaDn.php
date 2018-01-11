<?php

namespace App\Models\DataKerjasama;

use Illuminate\Database\Eloquent\Model;
use Sentinel;
use Carbon\Carbon;

class KerjasamaDn extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_katdn', 'id_katjenisdn', 'tahun', 'nomor', 'judul', 'pihak', 'summary', 'tanggal_awal', 'tanggal_akhir', 'id_katopd', 'keterangan', 'gambar', 'slug', 'id_user'
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
        return $this->where('slug', $slug)->with(['katdn', 'katjenisdn', 'katopd', 'user'])->first();
    }

    public function katdn()
    {
        return $this->belongsTo('App\Models\Kategori\Katdn', 'id_katdn');
    }

    public function katjenisdn()
    {
        return $this->belongsTo('App\Models\Kategori\Katjenisdn', 'id_katjenisdn');
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
        return $query->with('katdn')
            ->whereDate('tanggal_awal', date('Y-m-d'))
            ->take($limit);
    }

     public function scopeGetDataByKat($query, $katSlug, $limit = null)
    {
        return $query->whereHas('katdn', function($query) use ($katSlug) {
                $query->where('slug', $katSlug);
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc')
            ->take($limit);
    }


    public function scopeGetData($query, $katSlug = '', $slug = '', $timeout = '', $overdue = 0)
    {
        return $query->whereHas('katdn', function($query) use ($katSlug, $timeout) {
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

                if ($timeout == 'hampir') {
                    $query->where('tanggal_akhir', '>=', $now->endOfDay()->toDateString())
                        ->where('tanggal_akhir', '<=', $then->toDateString());
                } else if ($timeout == 'sudah') {
                    $query->where('tanggal_akhir', '<', $now->toDateString());
                }
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }


    public function scopeGetSearch($query, $katSlug = '')
    {
        return $query->where(function($query) use ($katSlug) {
                $query->where('judul', 'like', '%'.$katSlug.'%')
                    ->orWhere('nomor', 'like', '%'.$katSlug.'%')
                    ->orWhere('summary', 'like', '%'.$katSlug.'%');
            })
            ->with(['katdn', 'user'])
            ->orderBy('tanggal_awal', 'desc');
    }
}
