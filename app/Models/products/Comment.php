<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\auth\Customer;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'customer_product_comment';
    protected $fillable = [
        'id', 'account_id', 'product_id', 'comment', 'created_at', 'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id')->get();
    }

    public function account()
    {
        return $this->belongsTo(Customer::class, 'account_id', 'id')->get();
    }
}
