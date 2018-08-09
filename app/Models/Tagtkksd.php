<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagtkksd extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function getDataByName($name)
    {
        return $this->where('name', $name)->with(['galeriTkksds'])->first();
    }

    public function galeriTkksds()
    {
        return $this->belongsToMany('App\Models\Tkksd\GaleriTkksd', 'galeri_tkksd_tag', 'id_tag', 'id_galeri_tkksd')->withTimestamps();
    }

    public static function getIdName($tagtkksds)
    {
        $id = [];

        foreach ($tagtkksds as $tag) {
            $data = self::firstOrCreate(['name' => $tag]);
            $id[] = $data->id;
        }

        return $id;
    }
}
