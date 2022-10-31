<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScentedWaxProduct extends Model
{
    use HasFactory;
    protected $table = 'scented_wax_products';
    protected $fillable = [
        'id', 'tenSanPham', 'muiHuong', 'trongLuong', 'nhaCungCap', 'moTa', 'image_path',
        'giaNhap', 'giaBan', 'conLai', 'daBan', 'created_at', 'updated_at'
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id');
    }
}
