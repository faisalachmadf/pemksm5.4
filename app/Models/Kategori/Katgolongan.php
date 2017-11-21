<?php

namespace App\Models\kategori;

use Illuminate\Database\Eloquent\Model;

class Katgolongan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','slug'
    ];

   
    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
