<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'id', 'role'
    ];
    
    public function admin() {
        return $this->hasMany(Admin::class, 'role', 'id');
    }
}
