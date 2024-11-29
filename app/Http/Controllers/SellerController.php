<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Subcat;

class SellerController extends Controller
{
    
    public function index(User $user){
        Gate::define('is_seller', function (User $user){
            return Auth::user()->is_seller;
        });

        if(Auth::guest()){
            return view('signin.login');
        }

        Gate::authorize('is_seller');

        $seller_id = Auth::user()->seller_id;

        $products = Product::where('seller_id', $seller_id)->get();

        return view('sell.dashboard', [
            'products' => $products
        ]);
    }

    public function edit(Product $product)
    {
        return view('sell.edit', ['product' => $product]);
    }

    public function create()
    {
        if(Auth::guest){
            return view('signin.login');
        }
        
        $subcat = Subcat::all();
        return view('sell.create', ['subcats' => $subcat]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $newImageName = $product->id.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('img'), $newImageName);
        
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->subcat_id = request('category');
        $product->seller_id = Auth::user()->seller_id;
        $product->discount_price = request('discount_price');
        $product->description = request('description');
        $product->image = $newImageName;
        $product->save();
    
       return redirect('/sell/edit/'.$product->id);
    }

    public function update(Request $request, Product $product)
    {
        if(Auth::guest()){
            return view('signin.login');
        }
        
        if($product->seller->isNot(Auth::user()->seller)){
            abort(403);
        }
        $request->validate([
            'image' => 'required'
        ]);

        $newImageName = $product->id.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('img'), $newImageName);

        $product->name = request('name');
        $product->price = request('price');
        $product->discount_price = request('discount_price');
        $product->description = request('description');
        $product->image = $newImageName;
        $product->save();
    
       return redirect('/sell/edit/'.$product->id);
    }
}