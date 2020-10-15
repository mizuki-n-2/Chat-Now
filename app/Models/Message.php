<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'message'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

    protected $casts = [
        'created_at' => 'datetime:m/j(D) g:i A',
    ];
}
