<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Seller;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function carts(){
        return $this->hasOne(Cart::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function sellerProducts(){
        return $this->hasManyThrough(Product::class, Seller::class);
    }

    public function cartProducts(){
        return $this->hasManyThrough(Product::class, Cart::class);
    }

    public function orderProducts(){
        return $this->hasManyThrough(Product::class, Order::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
