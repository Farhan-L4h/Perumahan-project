<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $primaryKey = 'properties_id';

    protected $fillable = [
        'agen_id',
        'kategori_id',
        'image',
        'nama',
        'harga',
        'deskripsi',
        'status',
        'luas_bangunan',
        'luas_tanah',
        'fasilitas',
        'alamat',
        'kamar_tidur',
        'kamar_mandi',
    ];

    public function agen()
    {
        return $this->belongsTo(agen::class, 'agen_id');
    }

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }

    public function details()
    {
        return $this->hasOne(details_property::class, 'properties_id');
    }
}
