<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'message', 'date_time', 'image'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

}
