<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function addToCartPage()
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        $cartItems = $cart->items()->with('pet')->get();

        return view('user.cart', compact('cartItems'));
    }

    public function addToCart($petId)
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        $cartItems = $cart->items;

        if ($cartItems->contains('pet_id', $petId)) {
            return redirect()->route('cart')->with('success', 'Pet is already in the cart.');
        } else {
            
            $cart->items()->create([
                'pet_id' => $petId,
                'quantity' => 1,
            ]);

            // Fetch the updated cart items
            $cartItems = $cart->items;

            return redirect()->route('cart')->with('success', 'Pet added to cart successfully.');
        }
    }
}
