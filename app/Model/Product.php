<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'thumbnail_image',
        'model_number',
        'serial_number',
        'category',
        'shop_id',
        'product_description',
        'roleid',
        'purchase_date',
        'brand',
         'qrcode',
        'status'

    ];
      public function Order()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
