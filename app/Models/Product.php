<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class Product extends Model
{   
    protected $table = 'products';
    protected $primaryKey='id';
    
    protected $fillable = [
        'kode',
        'nama',
        'merk',
        'category_id',
        'harga',
        'deskripsi',
        'photo',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
