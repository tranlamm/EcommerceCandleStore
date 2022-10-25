<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandleProduct extends Model
{
    use HasFactory;
    protected $table = 'candle_products';
    protected $fillable = [
        'id', 'tenSanPham', 'soBac', 'muiHuong', 'mauSac', 'trongLuong', 'nhaCungCap', 'moTa', 'image_path',
        'giaNhap', 'giaBan', 'conLai', 'daBan', 'created_at', 'updated_at'
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id');
    }
}
