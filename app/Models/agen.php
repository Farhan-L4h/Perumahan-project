<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agen extends Model
{
    use HasFactory;

    protected $table = 'agens';

    protected $primaryKey = 'agen_id';

    protected $fillable = [
        'image',
        'name',
        'username',
        'contact',
        'company',  
        'alamat'
    ];

    public function properties()
    {
        return $this->hasMany(properties::class, 'agen_id');
    }

    // public function getImageUrlAttribute()
    // {
    //     return asset('storage/' . $this->image);
    // }
}
