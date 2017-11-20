<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katjabatan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

       
    }

   
    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
