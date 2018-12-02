@extends('layouts.master')

@section('title')
    Productos
@endsection

@section('content')

<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-4">
                <img class="img-fluid img-thumbnail" src="{{$product->getImage()}}" alt="">
        </div>
        <div class="col-sm-12 col-md-4 d-inline-flex flex-column justify-content-md-between">

            <h1>{{ucfirst($product->name)}}</h1>
            <h5>$ {{ $product->price }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            {{-- <button type="button" class="btn btn-secondary btn-sm mx-auto">Añadir al carrito</button> --}}
            <a href="{{ URL::previous() }}">Volver</a>
        </div>
    </div>

</div>

@endsection