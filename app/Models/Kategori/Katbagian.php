<?php

namespace App\Models\Kategori;

use Illuminate\Database\Eloquent\Model;

class Katbagian extends Model
{
    protected $fillable =['name'];
    
     protected static function boot()
    {
        parent::boot();

       
    }

   
    public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}
