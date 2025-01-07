<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class CartPage extends Component
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

        if ($product) {
            $existingItemIndex = collect($this->cartItems)->search(fn($item) => $item['id'] === $product->id);

            if ($existingItemIndex !== false) {
                $this->cartItems[$existingItemIndex]['quantity'] += 1;
            } else {
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

    public function updateQuantity($productId, $action)
    {
        foreach ($this->cartItems as &$item) {
            if ($item['id'] === $productId) {
                if ($action === 'increase') {
                    $item['quantity']++;
                } elseif ($action === 'decrease' && $item['quantity'] > 1) {
                    $item['quantity']--;
                }
            }
        }

        session()->put('cart', $this->cartItems);
    }

    public function removeFromCart($productId)
    {
        $this->cartItems = array_filter($this->cartItems, fn($item) => $item['id'] !== $productId);
        session()->put('cart', $this->cartItems);
    }

    public function calculateSubtotal()
    {
        return array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $this->cartItems));
    }

    public function calculateTotal()
    {
        return $this->calculateSubtotal();
    }



    public function render()
    {
        return view('livewire.cart-page');
    }
}
