<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showCheckoutForm(){
        $categories = Category::all();
        $cartItems = session()->get('cart', []);
        return view('user.checkout', compact('categories', 'cartItems'));
    }

    public function placeOrder(Request $request){
        $validatedData = $request->validate([
           'firstname' => 'required',
           'lastname' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'address' => 'required',
           'city' => 'required',
           'postal_code' => 'required',
            'state' => 'required',
        ]);

        $user = auth()->check() ? auth()->user()->id : null;

        $order = Order::create([
            'user_id' => $user,
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'postal_code' => $validatedData['postal_code'],
            'total' => $this->calculateTotal(),
        ]);




        $cartItems = session()->get('cart', []);

        foreach ($cartItems as $Item) {
            OrderItem::create([
               'order_id' => $order->id,
               'product_id' => $Item['id'],
               'quantity' => $Item['quantity'],
               'price' => $Item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect('/')->with('success', 'Your order has been placed!');
    }

    public function calculateTotal(){
        $cartItems = session()->get('cart', []);
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cartItems));
    }
}
