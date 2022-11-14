<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $fillable = [
        'id', 'ten', 'diaChi', 'soDienThoai', 'image_path', 'created_at', 'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'nhaCungCap', 'id');
    }
}

