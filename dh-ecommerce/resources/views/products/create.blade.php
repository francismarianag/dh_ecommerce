@extends('layouts.master')

@section('content')


<div class="container align-items-sm-center">
  <div class="col-6 offset-3">
      <h2>{{"Añadir Producto"}}</h2>
      @if(count($errors) > 0)
        <ul clasS="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
<form method="post">
    @csrf
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="name" value="{{old('name')}}">
    </div>
  </div>

  <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Descripción</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="description" value="{{old('description')}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Categoria</label>
        <div class="col-sm-10">
            <select class="form-control" name="category_id">
                <option value="" disabled selected>Seleccione categoria</option>
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
        <input type="text" class="form-control" name="price" value="{{old('price')}}">
        </div>
      </div>
      <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="status" value="1">
          </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="user_id" value="1">
            </div>
          </div>
      {{-- <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Imagen</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="image" value="{{old('image')}}">
          @if(isset($errors->all()[4]))
                  <div class="alert alert-danger mt-2">
                  {{$errors->all()[4]}}
                  </div>
          @endif
          </div>
        </div> --}}

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
</div>
</div>

@endsection