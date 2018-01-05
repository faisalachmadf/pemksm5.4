<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    protected $fillable =['judul', 'gambar'];

      public function ScopeUrutan($query)
    {
        return $query->OrderBy('created_at','desc');

    }
}

