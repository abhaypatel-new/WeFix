<?php

namespace App\Model;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
   

    public function customer()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
     public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
     public function product_image()
    {
        return $this->belongsTo(ProductImage::class, 'order_id','pid');
    }
     
}
