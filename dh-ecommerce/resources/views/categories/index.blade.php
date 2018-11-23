@extends('layouts.master')

@section('content')
<div class="container align-items-sm-center">
    <div class="col-6 offset-3">
<h2>{{"Lista de categorias"}}</h2>

<div class="row">
    <div class="col-8 offset-2">
        <hr>
        <ul class="text-secondary list-unstyled">
          {{-- {{dd($categories)}} --}}
            @foreach($categories as $category)
            <li class="col-12">
                <a class="" href="/categories/{{ $category->id }}">{{ $category->name }}</a><span class="col-4"> - Nombre: {{ $category->name }} - Fecha: {{ $category->created_at }}</span>
                {{-- @if(Auth::user()->role === 7) --}}
                <div class="row">
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
                </div>
                {{-- @endif --}}
            </li>
            <hr>
            @endforeach
        </ul>
    </div>
</div>
</div>
</div>


@endsection