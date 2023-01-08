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
    
    // id == 1 => admin
    // id == 2 => client

    public function admin() {
        return $this->hasMany(Admin::class, 'role', 'id');
    }
}
