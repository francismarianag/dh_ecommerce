@extends('layouts.master')

@section('title')
    Carrito
@endsection

@section('content')
<div class="container">
    <div class="col-12">
<h2>{{"Tu carrito"}}</h2>

<div class="row mt-3">
    <div class="col-12 table-responsive">
            <button id="buy" class="btn btn-warning m-3 float-right">Comprar</button>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Producto</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>

            <tbody>
            
                <?php 
                    $total = 0;
                    $indexKey = 0;
                ?>
                @if(session('cart'))
                @foreach(session('cart') as $id => $item)
                {{-- {{dd($user)}} --}}
                {{-- {{dd($id)}} --}}
                <?php $total += $item['price'] * $item['quantity'] ?>

                    <tr>
                        <th scope="row">{{$indexKey++}}</th>

                        <td>
                            {{ $item['name'] }}
                        </td>
                        <td>
                            {{$item['quantity']}}
                        </td>
                        <td>
                            {{$item['price']}}
                        </td>                        
                    </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i>Continuar comprando</a></td>
                    <td>
                   
                    
                    <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                </tr>

            </tfoot>
        </table>

    </div>
</div>
</div>
</div>

@endsection

