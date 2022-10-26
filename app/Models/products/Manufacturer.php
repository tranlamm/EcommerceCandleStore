<?php

namespace App\Models\products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $fillable = [
        'id', 'ten', 'diaChi', 'soDienThoai', 'created_at', 'updated_at'
    ];

    public function candleProducts() {
        return $this->hasMany(CandleProduct::class, 'nhaCungCap', 'id');
    }

    public function essentialOilProducts() {
        return $this->hasMany(EssentialOilProduct::class, 'nhaCungCap', 'id');
    }
}

