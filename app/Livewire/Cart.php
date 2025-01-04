<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Cart extends Component
{
    public $cartItems = [];
    public $categories;

    public function mount($categories)
    {
        $this->categories = $categories;

        $this->cartItems = session()->get('cart', []);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if($product) {
            $existingItemIndex = collect($this->cartItems)->search(fn ($item) => $item['id'] === $product->id);

            if($existingItemIndex !== false) {
                $this->cartItems[$existingItemIndex]['quantity'] += 1;
            }
            else {
                $this->cartItems[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                ];
            }

            session()->put('cart', $this->cartItems);
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
