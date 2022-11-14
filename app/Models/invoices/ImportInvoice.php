<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products\Product;

class ImportInvoice extends Model
{
    use HasFactory;
    protected $table = 'import_invoices';
    protected $fillable = [
        'id', 'tenDonHang', 'noiDung', 'tongTien', 'created_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'import_invoice_product', 'import_invoice_id', 'product_id')
                    ->withPivot('soLuong', 'donGia', 'tongTien')
                    ->withTimestamps();
    }

}
