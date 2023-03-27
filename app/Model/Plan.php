<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'price',
        'start_date',
        'end_date',
        'features',
        'description',
        'status'

    ];
}
