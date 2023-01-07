<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPasswordReset extends Model
{
    use HasFactory;
    protected $table = 'customer_password_resets';

    protected $fillable = ['id', 'email', 'token', 'created_at', 'updated_ at'];
}
