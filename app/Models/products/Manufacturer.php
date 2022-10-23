<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $fillable = [
        'id', 'ten', 'diaChi', 'soDienThoai', 'mauSac', 'created_at', 'updated_at'
    ];

    public function products() {
        return $this->hasMany(CandleProduct::class, 'nhaCungCap', 'id')->first();
    }
}

