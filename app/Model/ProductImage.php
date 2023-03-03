<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

      public function Order()
    {
        return $this->hasMany(Order::class, 'order_id','pid');
    }
}
