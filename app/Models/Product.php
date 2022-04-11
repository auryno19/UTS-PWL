<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product extends Model
{   
    protected $table = 'products';
    protected $primaryKey='id';
    
    protected $fillable = [
        'kode',
        'nama',
        'merk',
        'kategori',
        'harga',
        'deskripsi',
        'photo',
    ];
}
