@extends('layouts.layout')
@section('titulo', 'Nueva Obra')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Formulario de nueva obra</h1>

    </div>
    <!-- /.container-fluid -->

    @if (session("status"))
    <p id="mensaje">{{ session("status") }}</p>
    @endif
    <form class="user p-3" method="POST" action="{{ route('obra.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <input type="search" class="form-control form-control-user" id="address-input" name="algolia"
                   placeholder="Direccion..." value="{{ old("algolia") }}">
            <input type="text" id="city" name="city" value="{{ old("city") }}" placeholder="city" hidden>
            {!!   $errors->first('city','<small>:message</small>')!!}

            <input type="text" id="province" name="province" value="{{ old("province") }}" placeholder="province" hidden>
            {!!   $errors->first('province','<small>:message</small>')!!}

            <input type="text" id="postal_code" name="postal_code" value="{{ old("postal_code") }}" placeholder="postal_code" hidden>
            {!!   $errors->first('postal_code','<small>:message</small>')!!}

            <input type="text" id="street_name" name="street_name" value="{{ old("street_name") }}" placeholder="street_name" hidden>
            {!!   $errors->first('street_name','<small>:message</small>')!!}

            <input type="text" id="latitude" name="latitude" value="{{ old("latitude") }}" placeholder="latitude" hidden>
            {!!   $errors->first('latitude','<small>:message</small>')!!}

            <input type="text" id="longitude" name="longitude" value="{{ old("longitude") }}" placeholder="longitude" hidden>
            {!!   $errors->first('longitude','<small>:message</small>')!!}

        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="num"
                       placeholder="Numero" name="number" value="{{ old("number") }}">
                {!!   $errors->first('number','<small>:message</small>')!!}
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="piso"
                       placeholder="Piso" name="floor" value="{{old("floor")}}">
                {!!   $errors->first('floor','<small>:message</small>')!!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select required id="mano" class="form-select selector" name="door">
                    <option disabled selected>Seleccione una</option>
                    <option value="Izquierda">Izquierda</option>
                    <option value="Centro">Centro</option>
                    <option value="Derecha">Derecha</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="null">Ninguna de las anteriores</option>
                </select>
                {!!   $errors->first('door','<small>:message</small>')!!}
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                @empty($tiposEdificios)
                @else
                <select name="tipoEdificio" id="tipoEdificio" class="form-select selector">
                    <option selected disabled>Selecciona un tipo de edificio</option>
                    @foreach ($tiposEdificios as $i)
                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                </select>
                @endempty
                    {!!   $errors->first('tipoEdificio','<small>:message</small>')!!}
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0" class="form-select selector">
                @empty($tiposObras)
                @else
                <select name="tipoObra" id="tipoObra" class="form-select selector">
                    <option selected disabled>Selecciona un tipo de obra</option>
                    @foreach ($tiposObras as $i)
                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                </select>
                @endempty
                    {!!   $errors->first('tipoObra','<small>:message</small>')!!}

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="file" id="plano" name="blueprint" >
                {!!   $errors->first('blueprint','<small>:message</small>')!!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <textarea class="form-control" rows="5" style="resize: none;" name="description">{{old("description")}}</textarea>
                {!!   $errors->first('description','<small>:message</small>')!!}

            </div>
        </div>


        <button type="submit" class="btn btn-primary btn-user btn-block" id="registrar">
            Enviar obra
        </button>

        <hr>

        </div>
    </form>

@endsection
