<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

      protected $fillable = [
        'name',
        'images',
        'price',
        'model_no',
        'stock',
        'qty',
        'description',
        'user_id',
        'action',
        'status'

    ];
}
