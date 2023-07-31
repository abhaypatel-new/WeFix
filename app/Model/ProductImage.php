<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
 protected $fillable = [
        'pid',
        'images',
        

    ];

      public function Order()
    {
        return $this->hasMany(Order::class, 'order_id','pid');
    }
     protected $casts = [
         'created_at'  => 'date:D, F d, Y',
         'updated_at' => 'datetime:Y-m-d H:00 A',
     
       
    ];
}
