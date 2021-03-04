@extends('layouts.layout')
@section('content')
<div class="col-sm-12"><p class="h1">Datos de la obra {{ $obra->id }}</p><hr>
    <p class="h3">Ubicación:</p>
    <div class=" col-sm-12 m-0 p-0">

        <div id="mapid"></div><br><br>

        <table class="table table-hover">

            <tbody>
                <tr>
                    <th scope="row">Solicitante:</th>
                    <td>{{ $obra->solicitante->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de edificio:</th>
                    <td>{{ $obra->tipo_edificio->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Tipo de construccion:</th>
                    <td>{{ $obra->tipo_obra->name }}</td>

                </tr>
                <tr>
                    <th scope="row">Técnico:</th>
                    <td>
                        @isset($obra->worker_id)
                        {{ $obra->trabajador->name }}
                        @else
                            @if (auth()->user()->role == "coordinador")
                            <form action="{{ route("obra.trabajador", $obra) }}" method="post">
                                @csrf
                                <select name="tecnico">
                                    <option selected disabled>Selecciona un tecnico</option>
                                @foreach ($trabajadores as $trabajador)
                                    <option value="{{ $trabajador->id }}">
                                        {{ $trabajador->name ." | ". $trabajador->obra_asignada_count . " obras"}}
                                    </option>
                                @endforeach
                                </select>
                                <input type="submit" value="Aceptar">
                            </form>
                            @endif
                            No hay técnico
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th scope="row">Calle:</th>
                    <td>{{ $obra->street_name }}</td>

                </tr>
                <tr>
                    <th scope="row">Número:</th>
                    <td>{{ $obra->number }}</td>

                </tr>
                <tr>
                    <th scope="row">Piso:</th>
                    <td>{{ $obra->floor }}</td>

                </tr>
                <tr>
                    <th scope="row">Mano:</th>
                    <td>{{ $obra->door }}</td>

                </tr>
                <tr>
                    <th scope="row">Codigo postal:</th>
                    <td>{{ $obra->postal_code }}</td>
                </tr>
                <tr>
                    <th scope="row">Ciudad:</th>
                    <td>{{ $obra->city }}</td>

                </tr>
                <tr>
                    <th scope="row">Provincia:</th>
                    <td>{{ $obra->province }}</td>

                </tr>
                <tr>
                    @if ($obra->state=="authorized" && !isset($obra->start_date))
                    <th scope="row">Fecha inicio:</th>
                        <td>
                            <form action="{{ route("obraFechas.update", $obra) }}" method="POST">
                                @csrf
                                <input type="date" name="start_date" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha fin:</th>
                        <td>
                            <input type="date" name="end_date" required>
                            <input type="submit" value="Aceptar">
                            </form>
                        </td>
                    </tr>
                    @else 
                    <tr>
                        <th scope="row">Fecha inicio:</th>
                        <td>{{ $obra->start_date }}</td>
    
                    </tr>
                    <tr>
                        <th scope="row">Fecha fin:</th>
                        <td>{{ $obra->end_date }}</td>
    
                    </tr>
                    @endif
                    

                </tr>
                <tr>
                    <th scope="row">Estado</th>
                    @if (($obra->state == ("pending")) && auth()->user()->role=="tecnico")
                    <td>
                        <form action="{{ route("obra.update", $obra) }}" method="POST">
                            @csrf
                            <select name="state" required>
                                <option selected disabled>Choose One</option>
                                <option value="authorized">Authorized</option>
                                <option value="denied">Denied</option>
                            </select>
                            <input type="submit" value="Aceptar">
                        </form>
                    </td>
                    @else 
                    <td>{{ $obra->state }}</td>
                    @endif
                </tr>
                <tr>
                    <th>Creada hace</th>
                    <td>{{ $obra->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th scope="row">Fecha actualizacion:</th>
                    <td>{{ $obra->updated_at->diffForHumans() }}</td>

                </tr>
                <tr>
                    <th scope="row">Descripción:</th>
                    <td id="desc">{{ $obra->description }}</td>

                </tr>
                <tr>
                    <td scope="row">Ver plano:</td>
                    <td><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" target="_blank" >Ver Plano</a></td>

                </tr>
                <tr>
                    <th scope="row">Descargar plano:</th>
                    <td><a href="{{ asset("storage/blueprints/".$obra->blueprint) }}" download >Descargar Plano</a></td>
                </tr>
                </tr>
            </tbody>
        </table>
        <hr><br>
        @if (auth()->user()->role=="tecnico")
        <form action="{{ route("comentario.store", $obra) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Escribe aqui tu comentario </label>
            <textarea name="text" class="form-control" rows="3"></textarea><br>
            <input type="file" name="photo"><br><br>
            <button type="submit" class="btn btn-secondary">Enviar</button>
        </form>
        @endif

            <p id="lat" hidden>{{ $obra->latitude  }}</p>
            <p id="lng" hidden> {{ $obra->longitude  }}</p>
        <hr>
        <h4>Comentarios</h4>
        @forelse ($obra->comentarios as $comentario)
        <div class="card comentario">
            <p>{{ $comentario->text }}</p>
            @isset($comentario->photo)
                <img src="{{ asset('/storage/imagenes/comentarios/'.$comentario->photo)}}">
            @endisset
            <p class="creator">{{ $comentario->trabajador->name. " - " . $comentario->created_at->diffForHumans()}}</p>
        </div>
        @empty
            <p>No hay comentarios</p>
        @endforelse

    </div>
@endsection