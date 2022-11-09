<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products\manufacturer;

class ImportInvoice extends Model
{
    use HasFactory;
    protected $table = 'import_invoices';
    protected $fillable = [
        'id', 'tenDonHang', 'noiDung', 'nhaCungCap', 'loaiHang', 'tenSanPham', 'soLuong', 'donGia', 'tongTien', 'created_at'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'nhaCungCap', 'id');
    }

}
