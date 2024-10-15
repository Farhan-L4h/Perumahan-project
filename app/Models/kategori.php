<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';  // Pastikan ini sesuai dengan tabel di database

    public function properties()
    {
        return $this->hasMany(properties::class);
    }
}
