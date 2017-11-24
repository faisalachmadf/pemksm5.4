<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
        return $this->where('name', $name)->with(['galeriLppds'])->first();
    }

    public function galeriLppds()
    {
        return $this->belongsToMany('App\Models\Lppd\GaleriLppd', 'galeri_lppd_tag', 'id_tag', 'id_galeri_lppd')->withTimestamps();
    }

    public static function getIdByName($tags)
    {
        $id = [];

        foreach ($tags as $tag) {
            $data = self::firstOrCreate(['name' => $tag]);
            $id[] = $data->id;
        }

        return $id;
    }
}
