<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcat;
use App\Models\Product;


class Cat extends Model
{
    use HasFactory;

    public function subcats(){
        return $this->hasMany(Subcat::class);
    }

    public function products(){
        return $this->hasManyThrough(Product::class, Subcat::class);
    }
}

