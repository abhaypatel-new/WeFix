<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_read',
    ];

    protected $casts = [
        'created_at' => "datetime:d M, Y h:i A",
    ];
}
