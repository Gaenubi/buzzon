<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

class UserController extends Controller
{
    public function create()
    {
        return view('signin.login');
    }

    public function store(Request $request)
    {
        $verified = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($verified);

        Auth::login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6)]
        ]);

        if(auth()->attempt(request()->only(['email', 'password']))){
            return redirect('/');
        }
        return redirect()->back()->withErrors(['email' => 'invalid Credentials']);
    }

    public function cart()
    {
        $user = Cart::where('user_id', Auth::id())->with('products')->get();

        return view('cart', [
            'cart' => $user
        ]);
    }

    public function cartdrop($id){
        
       $UserCart = Cart::firstOrCreate(['user_id' => Auth::id()]);

       $UserCart->products()->attach($id);

       return redirect()->back();
    }

    public function checkout(Request $request)
    { 
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $products = Product::whereNot('stripe_id', NULL)->where('price_id', NULL)->get();

        foreach ($products as $product){

            $new = $stripe->products->retrieve($product->stripe_id);

            $product->price_id = $new->default_price;

        }

        $lineitems = [];

        $order = Order::create([
            'user_id' => Auth::id(),
        ]);

        foreach($request->cart as $id){

            if (array_key_exists('product', $id)) {
                $item = ['price_id' => Product::find($id['product'])-value('price_id'), 'quantity' => $id['quantity']];
                $order->products()->attach($id, ['quantity' => $id['quantity']]);
                array_push($lineitems, $item);
            }
            else{
                echo('no');
            } 
        }
        

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => $lineitems,
        'mode' => 'payment',
        'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('checkout.cancel'),
        ]);
    
            
    }

    public function success(){
        $sessionId = $request->get('session_id');

        $order = Order::where('sesson_id', $session)->where('status', 'unpaid')->get();
        if($order){
            $order->status = 'paid';

            Mail::to($order->user)->queue(new OrderPlaced($order));

            return view('order.success', ['order' => $order]);
        }
        abort(404);
        
    }

    public function cancel(){
        return view('order.cancel');
    }
}
