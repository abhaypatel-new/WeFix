<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

      public function Order()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
