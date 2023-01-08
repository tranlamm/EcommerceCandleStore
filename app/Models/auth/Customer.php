<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\invoices\OnlineInvoice;
use App\Models\products\Product;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'id', 'username', 'password', 'role', 'fullname', 'address', 'phoneNumber', 'email', 'isVerified'
    ];

    protected $hidden = [
        'password',
    ];

    public function getRole() {
        return $this->belongsTo(Roles::class, 'role', 'id');
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function hasRole($role) {
        return $this->getRole()->first()->role === $role;
    }

    public function onlineInvoice()
    {
        return $this->hasMany(OnlineInvoice::class, 'account_id', 'id');
    }

    public function productReview()
    {
        return $this->belongsToMany(Product::class, 'customer_product_review', 'account_id', 'product_id')
                    ->withPivot('point')
                    ->withTimestamps();
    }

    public function productComment()
    {
        return $this->belongsToMany(Product::class, 'customer_product_comment', 'account_id', 'product_id')
                    ->withPivot('comment', 'id')
                    ->withTimestamps();
    }
}
