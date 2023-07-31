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
     public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
     public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

     protected $casts = [
        'date'  => 'date:yy-m-d',
        'updated_at' => 'datetime:Y-m-d H:00 A',
        'generated_date' => 'datetime:l jS \of F Y h:i A'
    
      
   ];
     
}
