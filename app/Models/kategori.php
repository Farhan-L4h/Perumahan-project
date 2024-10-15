<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama_kategori'];

    public function properties()
    {
        return $this->hasMany(properties::class);
    }
}
