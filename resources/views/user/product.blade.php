@extends('layouts.user')

@section('content')
    <div class="container py-5">
        @foreach ($categories as $category)
            <div class="category-section mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="category-title">{{ $category->name }}</h2>
                </div>
                <div class="row">
                    @foreach ($category->products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="card product-card h-100 shadow-sm border-0">
                                <div class="position-relative">
                                    <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                                    @if ($product->is_new)
                                        <span class="badge badge-success new-badge">New</span>
                                    @endif
                                    @if ($product->discount > 0)
                                        <span class="badge badge-danger discount-badge">-{{ $product->sale_percent }}</span>
                                    @endif
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-muted">
                                        <span class="text-primary">₮{{ $product->price }}</span>
                                    </p>
                                    <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
