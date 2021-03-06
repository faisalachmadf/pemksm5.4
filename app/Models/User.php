<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

use DB;
use Sentinel;

class User extends SentinelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'first_name', 'last_name', 'role', 'username'
    ];

    protected $hidden = [
        'password'
    ];

    public function produkHukums()
    {
        return $this->hasMany('App\Models\ProdukHukum', 'id_user');
    }
    
    public function kelembagaans()
    {
        return $this->hasMany('App\Models\Kelembagaan\Kelembagaan', 'id_user');
    }
    
    public function beritas()
    {
        return $this->hasMany('App\Models\Berita', 'id_user');
    }
    
    public function laporans()
    {
        return $this->hasMany('App\Models\Laporan', 'id_user');
    }

    public function layanans()
    {
        return $this->hasMany('App\Models\Layanan', 'id_user');
    }
    
    public function galeriLppds()
    {
        return $this->hasMany('App\Models\Lppd\GaleriLppd', 'id_user');
    }

     public function lppds()
    {
        return $this->hasMany('App\Models\Lppd\Lppd', 'id_user');
    }

     public function tkksds()
    {
        return $this->hasMany('App\Models\Tkksd\Tkksd', 'id_user');
    }

     public function galeriTkksds()
    {
        return $this->hasMany('App\Models\Tkksd\GaleriTkksd', 'id_user');
    }

    public function publikasis()
    {
        return $this->hasMany('App\Models\Publikasi', 'id_user');
    }

    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda', 'id_user');
    }

    public function kerjasamaDns()
    {
        return $this->hasMany('App\Models\DataKerjasama\KerjasamaDn', 'id_user');
    }

    public function kerjasamaLns()
    {
        return $this->hasMany('App\Models\DataKerjasama\KerjasamaLn', 'id_user');
    }

    public function mitradns()
    {
        return $this->hasMany('App\Models\Mitra\Mitradn', 'id_user');
    }

     public function mitralns()
    {
        return $this->hasMany('App\Models\Mitra\Mitraln', 'id_user');
    }


    public function scopeExclude($query)
    {
        $select = array_merge(['id'], array_diff($this->fillable, $this->hidden));

        return $query->select($select);
    }

    public function findWithCredentials($credentials)
    {
        return $this->where(DB::raw('lower(email)'), strtolower($credentials['email']))
            ->orWhere(DB::raw('lower(username)'), strtolower($credentials['username']))->first();
    }

    public function register($credentials)
    {
        Sentinel::register($credentials);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->exclude()->first();
    }

    public function updateUser($credentials, $id)
    {
        $hasher = Sentinel::getHasher();
        $oldPassword = $credentials['password_lama'];
        $user = Sentinel::findById($id);

        if (! $hasher->check($oldPassword, $user->password) && ! empty($credentials['password_lama'])) {
            return false;
        }

        if (empty($credentials['password_lama'])) {
            unset($credentials['password']);
        }

        unset($credentials['password_lama']);
        Sentinel::update($user, $credentials);

        return true;
    }
}
