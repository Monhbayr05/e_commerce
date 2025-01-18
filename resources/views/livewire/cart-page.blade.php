<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                    <tr class="main-hading">
                        <th>PRODUCT</th>
                        <th>NAME</th>
                        <th class="text-center">UNIT PRICE</th>
                        <th class="text-center">QUANTITY</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="image" data-title="No"><img src="{{ $item['image_url'] ?? 'https://via.placeholder.com/100x100' }}" alt="#"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name">{{ $item['name'] }}</p>
                            </td>
                            <td class="price" data-title="Price"><span>${{ number_format($item['price'], 2) }}</span></td>
                            <td class="qty" data-title="Qty">
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" wire:click="updateQuantity({{ $item['id'] }}, 'decrease')">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[{{ $item['id'] }}]" class="input-number" value="{{ $item['quantity'] }}" readonly>
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" wire:click="updateQuantity({{ $item['id'] }}, 'increase')">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="total-amount" data-title="Total"><span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span></td>
                            <td class="action" data-title="Remove"><a href="#" wire:click.prevent="removeFromCart({{ $item['id'] }})"><i class="ti-trash remove-icon"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>${{ number_format($this->calculateSubtotal(), 2) }}</span></li>
                                    <li>Shipping<span>Free</span></li>
                                    <li class="last">You Pay<span>${{ number_format($this->calculateTotal(), 2) }}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="{{ route('checkout.index') }}" class="btn">Checkout</a>
                                    <a href="#" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
