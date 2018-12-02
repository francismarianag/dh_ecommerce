@extends('layouts.master')

@section('title')
    Productos
@endsection

@section('content')

<div class="container">
    <div class="col-sm-12 col-lg-8 mx-auto">
        <h2>{{"Editar Producto"}}</h2>
        <div class="text-center">
            <img class="mb-3 " width="50%" src="{{$product->getImage()}}" alt="">
        </div>
        
        @if(count($errors) > 0)
            <ul clasS="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="/products/{{$product->id}}/edit" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : ''}}" name="name" value="{{ $product->name }}">
                </div>
            </div>
        
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                <input type="text" class="form-control {{ $errors->has('description') ? 'border-danger' : ''}}" name="description" value="{{ $product->description }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-control {{ $errors->has('category_id') ? 'border-danger' : ''}}" name="category_id">
                        <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                        @foreach($categories as $category)
                        @if ($category->id == old("category_id"))
                        <option value="{{ $category->id }}" selected>
                        {{ $category->name }}
                        </option>
                    @else
                        <option value="{{ $category->id }}">
                        {{ $category->name }}
                        </option>
                    @endif
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Precio</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control {{ $errors->has('price') ? 'border-danger' : ''}}" name="price" value="{{ $product->price }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="status" value="{{ $product->status }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_id" value="{{ $product->user_id }}">
                </div>
            </div>
            
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="image" lang="es">
                <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    {{-- <a href="{{ URL::previous() }}">Volver</a> --}}
    
    </div>
</div>

@endsection