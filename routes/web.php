<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\Subcat;
use App\Models\Product;

Route::get('/sell/create', [SellerController::class, 'create']);
Route::post('/sell', [SellerController::class, 'store']);
Route::get('/sell/edit/{product}', [SellerController::Class, 'edit'])->middleware(['auth', 'can:edit-product,product']);
Route::patch('/sell/edit/{product}', [SellerController::class, 'update']);
Route::get('/sell', [SellerController::class, 'index']);

Route::get('/test', function(){
   Illuminate\Support\Facades\Mail::to('owonub.e@gmail.com')->send(
        new App\Mail\OrderPlaced()
   );
   return 'done';
});

Route::post('/buy', [UserController::class, 'checkout']);


Route::get('/view/cart', [UserController::class, 'cart'])->middleware('auth');
Route::get('/cart/{id}', [UserController::class, 'cartdrop'])->middleware('auth');
Route::get('/register', [UserController::Class, 'create']);
Route::get('/login', [UserController::Class, 'create'])->name('login');
Route::post('/login', [UserController::Class, 'login']);
Route::post('/register', [UserController::Class, 'store']);

Route::post('/webhook', [UserController::class, 'webhook']);
Route::get('/success', [UserController::Class, 'success'])->name('checkout.success');
Route::get('/cancel', [UserController::Class, 'cancel'])->name('checkout.success');


Route::get('/view/{sub}', function (Subcat $sub) {
    $products = $sub->products;

    return view('product', [
        'products' => $products
    ]);
});


Route::get('/', function () {
    $cats = Cat::with('subcats')->get();
    $products = Subcat::with('product')->get();

    return view('welcome' ,[
        'products' => $products,
        'cat' => $cats
    ]);
});