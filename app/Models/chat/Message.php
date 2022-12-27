<?php

namespace App\Models\chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\auth\Customer;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['content', 'sender', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(Customer::class, 'sender', 'id');
    }
}
