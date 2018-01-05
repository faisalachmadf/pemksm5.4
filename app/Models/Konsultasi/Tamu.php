<?php

namespace App\Models\Konsultasi;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Tamu extends Model
{

     protected $fillable =[
     	'nama', 'dari', 'email', 'isi', 'slug'
     	];

     	 public function getDataBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }


     public function ScopeUrutan($query)
    {
        return $query->OrderBy('created_at','desc');

    }

}
