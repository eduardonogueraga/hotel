@extends('layout')

@section('title', 'Habitaciones')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{trans('rooms.title.index')}}</h1>

    </div>

    {{--    @includeWhen($view=='index','teams._filters')--}}

    @if ($rooms->isNotEmpty())

        <div class="table-responsive-lg">
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"># <span class="oi oi-caret-bottom"></span><span class="oi oi-caret-top"></span></th>
                    <th scope="col">Tipo Casa</th>
                    <th scope="col">Tipo habitacion</th>
                    <th scope="col">Camas</th>
                    <th scope="col">Baños</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="text-right th-actions">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @each('rooms._row', $rooms, 'room')
                </tbody>
            </table>
            {{ $rooms->links("pagination::bootstrap-4") }}
        </div>
    @else
        <p>No hay habitaciones para listar</p>
    @endif
@endsection


