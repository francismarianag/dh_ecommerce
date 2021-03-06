@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    
<div class="container">

  <div class="row">

    <div class="col-lg-3 my-4 d-none d-lg-inline">
        <div class="card bg-light mb-3">
            <div class="card-header bg-primary text-white font-weight-bold"><i class="fa fa-list"></i>Categorias</div>
            <ul class="list-group category_block">
              
              @foreach($categories as $category)
              {{-- {{dd($category->products()->count())}} --}}

              {{-- {{dd($category->amountProducts())}} --}}
                  @if ($category->amountProducts() >= 1)
                      
                  <li class="list-group-item d-flex justify-content-between">
                  <a class="text-dark" href="/categories/{{ $category->id }}">{{ $category->name }}</a><span class="text-black-50">{{$category->amountProducts()}}</span>
                  </li>
                  @endif
                @endforeach
            </ul>
        </div>
    </div>


    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="https://lorempixel.com/900/350/?31897" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://lorempixel.com/900/350/?89763" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="https://lorempixel.com/900/350/?89775" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="row">
        @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
          <a href="/products/{{ $product->id }}"><img class="img-fluid card-img-top" src="{{$product->getImage()}}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
              </h4>
              <h5>$ {{ $product->price }}</h5>
              <p class="card-text">{{ $product->description }}</p>
            </div>
            <div class="card-car">
              <form action="/cart/{{ $product->id }}" method="POST">
                  {{-- <input type="numer" class="form-control" placeholder="cantidad"> --}}
                    {{ csrf_field() }}
                  <button type="submit" class="btn btn-primary btn-sm">Añadir al carrito</button>
                </form>
            </div>
            {{-- <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
            </div> --}}
          </div>
        </div>
        @endforeach

      </div>
      {{ $products->links() }}
      <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>

@endsection