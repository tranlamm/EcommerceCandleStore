<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssentialOilProduct extends Model
{
    use HasFactory;
    protected $table = 'essential_oil_products';
    protected $fillable = [
        'id', 'tenSanPham', 'muiHuong', 'theTich', 'nhaCungCap', 'moTa', 
        'giaNhap', 'giaBan', 'conLai', 'daBan', 'created_at', 'updated_at'
    ];

    public function manufacturer() {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id')->first();
    }
}
