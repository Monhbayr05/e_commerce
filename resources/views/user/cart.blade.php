@extends('layouts.user')

@section('content')
    @livewire('cart-page', ['categories' => $categories])
@endsection
