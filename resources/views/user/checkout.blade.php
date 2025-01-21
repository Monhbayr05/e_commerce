@extends('layouts.user')

@section('content')
    <section class="shop checkout section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-form">
                        <h2>Make Your Checkout Here</h2>
                        <p>Please fill in your details to place your order</p>

                        <!-- Form -->
                        <form class="form" method="POST" action="{{ route('checkout.placeOrder') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>First Name<span>*</span></label>
                                        <input type="text" name="firstname" value="{{ old('firstname') }}" required>
                                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Last Name<span>*</span></label>
                                        <input type="text" name="lastname" value="{{ old('lastname') }}" required>
                                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Email Address<span>*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Phone Number<span>*</span></label>
                                        <input type="number" name="phone" value="{{ old('phone') }}" required>
                                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address<span>*</span></label>
                                        <input type="text" name="address" value="{{ old('address') }}" required>
                                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>City<span>*</span></label>
                                        <input type="text" name="city" value="{{ old('city') }}" required>
                                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>State<span>*</span></label>
                                        <input type="text" name="state" value="{{ old('state') }}" required>
                                        @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Postal Code<span>*</span></label>
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                                        @error('postal_code') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Place Order</button>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="order-details">
                        <div class="single-widget">
                            <h2>CART TOTALS</h2>
                            <div class="content">
                                <ul>
                                    <li>Sub Total<span>${{ number_format($total = 0, 2) }}</span></li>
                                    <li>(+) Shipping<span>$10.00</span></li>
                                    <li class="last">Total<span>${{ number_format($total + 10, 2) }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-widget">
                            <h2>Payments</h2>
                            <div class="content">
                                <label for="payment_method">
                                    <input type="radio" name="payment_method" value="cash_on_delivery" checked> Cash On Delivery
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
