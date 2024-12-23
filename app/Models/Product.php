<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Subcat;
use App\Models\Seller;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_id',
        'quantity',
        'description',
        'stripe_id',
        'cat_id',
        'seller_id',
        'price',
        'discount_price',
        'image',
    ];

    public function subcat(){
        return $this->belongsTo(Subcat::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function cart(){
        return $this->belongsToMany(Cart::class);
    }
}
