@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
<div class="container align-items-sm-center">
    <div class="col-6 offset-3">
<h2>{{"Lista de productos"}}</h2>

<div class="row">
    <div class="col-8 offset-2">
        <hr>
        <ul class="text-secondary list-unstyled">
          {{-- {{dd($categories)}} --}}
            @foreach($products as $product)
            <li class="col-12">
                <a class="" href="/products/{{ $product->id }}">{{ $product->name }}</a><span class="col-4"> - Precio: {{ $product->price }} - Fecha: {{ $product->created_at }}</span>
            <p>{{$product->description}}</p>
                {{-- @if(Auth::user()->role === 7) --}}
                <div class="row">
                    <div class="">
                        <a href="/products/{{ $product->id }}/edit" class="btn btn-primary mr-2">Editar</a>
                    </div>
                    <div class="">
                        <form action="/products/delete/{{ $product->id }}" method="post">
                          @csrf
                            {{ method_field('delete') }}
                            <input type="submit" class="btn btn-primary" name="delete" value="Eliminar">
                        </form>
                    </div>
                </div>
                {{-- @endif --}}
            </li>
            <hr>
            @endforeach
        </ul>
        {{ $products->links() }}

    </div>
</div>
</div>
</div>


@endsection