@extends('layouts.master')

@section('content')


<div class="container align-items-sm-center">
  <div class="col-6">
      <h2>{{"Categoria $category->name"}}</h2>
  <h4>{{"Productos asignados a esta categoria"}}</h4>
  <div class="col-8 offset-2">
      <hr>
      <ul class="text-secondary list-unstyled">
        {{-- {{dd($category->products)}} --}}
          @foreach($category->products as $product)
          <li class="col-12">
              <a class="" href="/products/{{ $product->id }}">{{ $product->name }}</a><span class="col-4"> - Producto: {{ $product->name }} - Fecha: {{ $product->created_at }}</span>
              {{-- @if(Auth::user()->role === 7) --}}
              {{-- <div class="row">
                  <div class="">
                      <a href="/categories/{{ $category->id }}/edit" class="btn btn-primary mr-2">Editar</a>
                  </div>
                  <div class="">
                      <form action="/categories/delete/{{ $category->id }}" method="post">
                        @csrf
                          {{ method_field('delete') }}
                          <input type="submit" class="btn btn-primary" name="delete" value="Eliminar">
                      </form>
                  </div>
              </div> --}}
              {{-- @endif --}}
          </li>
          <hr>
          @endforeach
        <a href="{{ URL::previous() }}">Volver</a>
      </ul>
  </div>
</div>
</div>

@endsection