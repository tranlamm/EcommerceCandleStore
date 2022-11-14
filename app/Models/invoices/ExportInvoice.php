<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products\Product;

class ExportInvoice extends Model
{
    use HasFactory;
    protected $table = 'export_invoices';
    protected $fillable = [
        'id', 'tenDonHang', 'noiDung', 'hinhThucMua', 'username', 'tenKhachHang', 'soDienThoai', 'diaChi', 
        'tongTien', 'trangThai', 'created_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'export_invoice_product', 'export_invoice_id', 'product_id')
                    ->withPivot('soLuong', 'donGia', 'tongTien')
                    ->withTimestamps();
    }
}
