<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id', 'loaiSanPham', 'tenSanPham', 'muiHuong', 'loaiMuiHuong', 'nhaCungCap', 'trongLuong', 'moTa', 'image_path',
        'giaNhap', 'giaBan', 'daBan', 'conLai', 'created_at', 'updated_at'
    ];

    public function manufacturer() 
    {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id')->get();
    }

    public function fragrance()
    {
        return $this->belongsTo(Fragrance::class, 'loaiMuiHuong', 'id')->get();
    }
}
