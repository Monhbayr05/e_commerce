@extends('layouts.user')

@section('content')
    @livewire('cart', ['categories' => $categories])
@endsection
