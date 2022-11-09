<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'id', 'username', 'password', 'role'
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
}
