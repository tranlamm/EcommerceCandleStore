<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\auth\Customer;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id', 'loaiSanPham', 'tenSanPham', 'muiHuong', 'loaiMuiHuong', 'nhaCungCap', 'trongLuong', 'moTa', 'image_path',
        'giaNhap', 'giaBan', 'daBan', 'conLai', 'luotDanhGia', 'diemDanhGia', 'created_at', 'updated_at'
    ];

    public function manufacturer() 
    {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id')->get();
    }

    public function fragrance()
    {
        return $this->belongsTo(Fragrance::class, 'loaiMuiHuong', 'id')->get();
    }

    public function productReview()
    {
        return $this->belongsToMany(Customer::class, 'customer_product_review', 'product_id', 'account_id')
                    ->withPivot('point')
                    ->withTimestamps();
    }

    public function productComment()
    {
        return $this->belongsToMany(Customer::class, 'customer_product_comment', 'product_id', 'account_id')
                    ->withPivot('comment', 'id')
                    ->withTimestamps();
    }
}
