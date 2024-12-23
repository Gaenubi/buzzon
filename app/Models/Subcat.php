<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cat;
use App\Models\Product;


class Subcat extends Model
{
    use HasFactory;

    public function Cat(){
        return $this->belongsTo(Cat::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function product(){
        return $this->products()->one()->ofMany();
    }
}
