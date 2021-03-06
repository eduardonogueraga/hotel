@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{trans('users.title.index')}}</h1>
        <p>
            <a href="{{route('users.create')}}" class="btn btn-primary">Nuevo usuario</a>
        </p>
    </div>

   @include('users._filters')

    @if ($users->isNotEmpty())

        <div class="table-responsive-lg">
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"># <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                    <th scope="col"><a href="{{ $sortable->url('nombre') }}" class="{{ $sortable->classes('nombre') }}">Nombre</a></th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col" class="text-right th-actions">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @each('users._row', $users, 'user')
                </tbody>
            </table>
            {{ $users->links("pagination::bootstrap-4") }}
        </div>
    @else
        <p>No hay usuarios para listar</p>
    @endif
@endsection


