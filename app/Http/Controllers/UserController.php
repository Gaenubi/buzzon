<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;

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
        $user = User::where('id', $id)->with('cartProducts')->get();

        return view('cart', [
            'posts' => $user
        ]);
    }
}
