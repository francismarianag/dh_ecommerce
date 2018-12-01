@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('content')


<div class="container align-items-sm-center">
  <div class="col-6 offset-3">
      <h2>{{"Editar Categoria"}}</h2>

<form method="post" action="/categories/{{$category->id}}/edit">
    @csrf
    {{ method_field('PATCH') }}
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
    @if(isset($errors->all()[0]))
            <div class="alert alert-danger mt-2">
            {{$errors->all()[0]}}
            </div>
    @endif
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Estado</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1" checked>
          <label class="form-check-label" for="gridRadios1">
            Activo
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
          <label class="form-check-label" for="gridRadios2">
            Inactivo
          </label>
        </div>
      </div>
    </div>
  </fieldset>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </div>
</form>
<a href="{{ URL::previous() }}">Volver</a>

</div>
</div>

@endsection