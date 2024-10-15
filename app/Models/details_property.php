<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_property extends Model
{
    use HasFactory;

    protected $table = 'details_property';

    protected $fillable = [
        'properties_id',
        'deskripsi',
        'luas_tanah',
        'luas_bangunan',
        'jumlah_kamar_tidur',
        'jumlah_kamar_mandi',
        'garasi',
        'harga',
    ];

    public function properties()
    {
        return $this->belongsTo(properties::class);
    }
}
