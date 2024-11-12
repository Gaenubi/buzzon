<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcat;

class Product extends Model
{
    use HasFactory;

    public function Subcat(){
        return $this->belongsTo(Subcat::class);
    }
}
