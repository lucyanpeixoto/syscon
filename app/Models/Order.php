<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\Seller;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    public $with = ['products'];

    public $hidden = [
        'created_at',
        'updated_at',
        'seller_id',
        'client_id'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id')->withPivot('quantity');
    }
}
