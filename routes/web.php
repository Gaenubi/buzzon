<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cat;

Route::get('/', function () {
    $products = Cat::with('products')->get();

    return view('welcome' ,[
        'products' => $products
    ]);
});
