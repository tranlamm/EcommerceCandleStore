<?php

namespace App\Models\invoices;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products\Product;
use App\Models\auth\Customer;

class OnlineInvoice extends Model
{
    use HasFactory;
    protected $table = 'online_invoices';
    protected $fillable = [
        'id', 'account_id', 'tongTien', 'trangThai', 'created_at', 'updated_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'online_invoice_product', 'online_invoice_id', 'product_id')
                    ->withPivot('soLuong')
                    ->withTimestamps();
    }

    public function account()
    {
        return $this->belongsTo(Customer::class, 'account_id', 'id');
    }
}
