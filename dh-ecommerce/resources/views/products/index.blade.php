@extends('layouts.master')

@section('title')
    Productos
@endsection

@section('content')
<div class="container">
    <div class="col-12">
<h2>{{"Lista de productos"}}</h2>

<div class="row mt-3">
    <div class="col-12 table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $indexKey => $product)
                    <tr>
                        <th scope="row">{{$indexKey+1}}</th>

                        <td>
                            <a class="" href="/products/{{ $product->id }}">{{ $product->name }}</a>
                        </td>
                        <td>
                            {{$product->description}}
                        </td>
                        <td>
                            {{$product->price}}
                        </td>
                        <td>
                            @if ($product->status === 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="">
                                    <a href="/products/{{ $product->id }}/edit" class="btn btn-primary mr-2">Editar</a>
                                </div>
                                <div class="">
                                    <form action="/products/delete/{{ $product->id }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <input type="submit" class="btn btn-primary" name="delete" value="Eliminar">
                                    </form>
                                </div>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}

    </div>
</div>
</div>
</div>


@endsection