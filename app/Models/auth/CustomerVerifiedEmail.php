<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVerifiedEmail extends Model
{
    use HasFactory;

    protected $table = 'customer_verified_emails';
    protected $fillable = ['id', 'email', 'token', 'created_at', 'updated_at'];
}
