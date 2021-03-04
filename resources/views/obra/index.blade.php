@extends('layouts.layout')

@section('titulo','Obra')

@section('content')
    <div class="col-sm-12"><p class="h1">Lista de obras</p><hr>
        <form action="{{ route("obra.index") }}" method="get">
            <label for="state"><p class="h5">Filtrar por estado:</p></label>
            <select class="custom-select" name="state" id="state">
                @foreach ($states as $state)
                    @if ($state == $selState)
                        <option  value="{{ $state }}" selected>{{ ucfirst($state) }}</option>
                    @else
                        <option value="{{ $state }}">{{ ucfirst($state) }}</option>
                    @endif
                @endforeach
            </select>
            <br><br>
            <label for="orderBy"><p class="h5">Ordenar por fecha de:</p></label>
            <select class="custom-select" name="order" id="orderBy">
                @foreach ($orderBy as $order)
                    @if ($order == $selOrder)
                        <option value="{{ $order }}" selected>{{ ucfirst($order) }}</option>
                    @else
                        <option value="{{ $order }}">{{ ucfirst($order) }}</option>
                    @endif
                @endforeach
            </select>
            <br><br>
            <label for="des">Descent: </label>
            <input type="checkbox" id="des" name="desc">
            <input type="submit" class="btn btn-primary float-right" value="Filtrar">
        </form>
        <div class="card-body">
            <div id="table-responsive">
            <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th scope="row">Id</th>
                        <th scope="row">Solicitante</th>
                        <th class="d-none d-lg-table-cell" scope="row">Tipo de edificio</th>
                        <th class="d-none d-lg-table-cell" scope="row">Tipo de obra</th>
                        <th class="d-none d-xl-table-cell" scope="row">Direccion</th>
                        <th class="d-none d-sm-table-cell" scope="row">Estado</th>
                        <th class="d-none d-xl-table-cell" scope="row" >Trabajador asignado</th>
                        <th class="d-none d-lg-table-cell" scope="row">Creada</th>
                        <th class="d-none d-lg-table-cell" scope="row">Actualizada</th>
                        <th class="d-none d-xl-table-cell" scope="row">Comentarios</th>
                        <th scope="row">Ver</th>
                    </tr>

                </thead>
                    @forelse ($obras as $obra)
                    <tbody>
                        <tr>
                            <td>{{ $obra->id }}</td>
                            <td>{{ $obra->solicitante->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $obra->tipo_edificio->name }}</td>
                            <td class="d-none d-lg-table-cell">{{ $obra->tipo_obra->name }}</td>
                            <td class="d-none d-xl-table-cell">{{ $obra->street_name }}</td>
                            <td class="d-none d-sm-table-cell">{{ $obra->state }}</td>
                            @isset($obra->trabajador)
                            <td class="d-none d-xl-table-cell">{{ $obra->trabajador->name }}</td>
                            @else 
                            <td class="d-none d-xl-table-cell">Sin trabrajador</td>
                            @endisset
                            <td class="d-none d-lg-table-cell">{{ $obra->created_at->diffForHumans() }}</td>
                            <td class="d-none d-lg-table-cell">{{ $obra->updated_at->diffForHumans() }}</td>
                            <td class="d-none d-xl-table-cell">{{ $obra->comentarios_count }}</td>
                            <td><a href="{{ route("obra.show", $obra) }}">Ver obra</a></td>
                        </tr>
                        @empty
                        <p>No hay obras</p>
                    @endforelse
                    </tbody>
    
               
            </table>
            <hr><br>
        </table>
        <p>{{ $obras->links("pagination::bootstrap-4") }}</p>
            </div>
    </div>

@endsection

