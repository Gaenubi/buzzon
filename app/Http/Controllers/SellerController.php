<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
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
        if(Auth::guest()){
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

        $stripe = new \Stripe\StripeClient('sk_test_51QQSdCIxnJH43pQ4zTuulVLZ5LzGysSMF8dGINEZRv0kVOpG4oA9wSO53GzRzNjJxz3ToZ7zv9vXihY4NNSj70a700znjfyXDD');

        $products = Product::where('stripe_id', NULL)->get();

        foreach ($products as $product){

            $new = $stripe->products->create(['name' => $product->name,
                                        'description' => $product->description,
                                        'default_price_data' => ['currency' => 'usd',
                                                                 'unit_amount' => $product->price * 100]]);

            $product->stripe_id = $new->id;
            $product->save();

        }
        $new = $stripe->products->create(['name' => $request->name,
                                    'description' => $request->description,
                                    'default_price_data' => ['currency' => 'usd',
                                                                'unit_amount' => $request->price * 100]]);


        $newImageName = $product->id.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('img'), $newImageName);
       

        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->subcat_id = request('category');
        $product->seller_id = Auth::user()->seller_id;
        $product->stripe_id = $new->id;
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