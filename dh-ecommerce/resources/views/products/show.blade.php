@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')

<div class="container">
    <h1>{{ucfirst($product->name)}}</h1>
    <h5>$ {{ $product->price }}</h5>
    <p class="card-text">{{ $product->description }}</p>
    <button type="button" class="btn btn-secondary btn-sm">Añadir al carrito</button>
    <a href="{{ URL::previous() }}">Volver</a>

</div>

@endsection