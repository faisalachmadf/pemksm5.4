<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukHukum extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kathukum', 'nama', 'file', 'diunduh', 'slug'
    ];

    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->with('kathukum')->first();
    }

    public function kathukum()
    {
        return $this->belongsTo('App\Models\Kategori\Kathukum', 'id_kathukum');
    }
}
