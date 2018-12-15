@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('content')
<div class="container">
    <div class="col-12">
<h2>{{"Lista de Usuarios"}}</h2>

<div class="row mt-3">
    <div class="col-12 table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                @if(Auth::check() && auth()->user()->role_id == 1)
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
                @endif
                </tr>
            </thead>

            <tbody>

                @foreach($users as $indexKey => $user)
                {{-- {{dd($user)}} --}}
                    <tr>
                        <th scope="row">{{$indexKey+1}}</th>

                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        @if(Auth::check() && auth()->user()->role_id == 1)
                        <td>
                            {{$user->getStatus()}}
                        </td>
                        <td>
                            <div class="row">
                                @if($user->getStatus() == 'Inactivo')
                                    <div class="">
                                        <a href="/users/restore/{{ $user->id }}" class="btn btn-primary mr-2">Restaurar</a>
                                    </div>  
                                @else
                                    <div class="">
                                        <form action="/users/delete/{{ $user->id }}" method="post">
                                            @csrf
                                            @method('delete')

                                            <input type="submit" class="btn btn-primary" name="delete" value="Eliminar">
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $users->links() }} --}}

    </div>
</div>
</div>
</div>


@endsection