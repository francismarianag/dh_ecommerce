@extends('layouts.master')

@section('title')
    Categorias
@endsection

@section('content')


<div class="container">
    <div class="col-sm-12 col-lg-8 mx-auto">
        <h2>{{"Crear Categoria"}}</h2>
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
            <input type="text" class="form-control  {{ $errors->has('name') ? 'border-danger' : ''}}" name="name" value="{{old('name')}}">
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
    </div>
</div>

@endsection