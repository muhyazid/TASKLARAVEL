<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
     protected $fillable = [
        'nama',
        'kategori_id',
        'deskripsi',
        'harga',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'kategori_id');
    }
    
}
