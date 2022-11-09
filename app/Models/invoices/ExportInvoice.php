<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportInvoice extends Model
{
    use HasFactory;
    protected $table = 'export_invoices';
    protected $fillable = [
        'id', 'tenDonHang', 'noiDung', 'hinhThuc', 'tenKhachHang', 'soDienThoai', 'diaChi', 'username',
        'loaiHang', 'tenSanPham', 'soLuong', 'donGia', 'tongTien', 'created_at', 'trangThai',
    ];
}
