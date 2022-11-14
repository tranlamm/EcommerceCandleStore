<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fragrance extends Model
{
    use HasFactory;
    protected $table = 'fragrances';
    protected $fillable = [
        'id', 'theLoai', 'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'loaiMuiHuong', 'id');
    }
}
