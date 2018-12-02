@extends('layouts.master')

@section('title')
    Categorias
@endsection

@section('content')
<div class="container align-items-sm-center">
<h2>{{"Lista de categorias"}}</h2>

<div class="row mt-3 d-flex justify-content-center">
    <div class="col-12 table-responsive">

            <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cant de Productos</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $indexKey => $category)
                    <tr>
                        <th scope="row">{{$indexKey+1}}</th>

                        <td>
                            <a class="" href="/categories/{{ $category->id }}">{{ $category->name }}</a>
                        </td>
                        <td>
                            {{$category->amountProducts()}}
                        </td>   
                        <td>
                            @if ($category->status === 1)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <div class="">
                                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-primary mr-2">Editar</a>
                                </div>
                                <div class="">
                                    <form action="/categories/delete/{{ $category->id }}" method="post">
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
    </div>
</div>
</div>


@endsection