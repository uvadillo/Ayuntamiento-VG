@extends('layouts.layout')
@section('titulo', 'Nuevo trabajador')
@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Registro de nuevos trabajadores</h1>



    </div>
    <form class="user  p-3" method="POST" action="{{ route('register.trabajadores') }}">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="name" id="nombre"
                       placeholder="Nombre..." value="{{old("name")}}">
                {!!   $errors->first('name','<small>:message</small>')!!}

            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="apellido" name="surname"
                       placeholder="Apellido..." value="{{old("surname")}}">
                {!!   $errors->first('surname','<small>:message</small>')!!}

            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="dni" name="dni"
                       placeholder="DNI..." value="{{old("dni")}}">
                {!!   $errors->first('dni','<small>:message</small>')!!}

            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control form-control-user" id="email"
                       placeholder="Correo electronico" name="email" value="{{ old("email") }}">
                {!!   $errors->first('email','<small>:message</small>')!!}

            </div>




        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" id="password" name="password"
                       placeholder="Contraseña..." value="{{old("password")}}">
                {!!   $errors->first('password','<small>:message</small>')!!}

            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user"
                       id="password2" placeholder="Repetir contraseña" name="password_confirmation">
                {!!   $errors->first('password_confirmation','<small>:message</small>')!!}

            </div>
        </div>
        <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0 " id="seleccion">
                <select class="form-select col-sm-12" name="role" id="tipoUsuario">
                    <option disabled selected>Selecciona una opción...</option>
                    <option value="tecnico">Técnico</option>
                    <option value="coordinador">Coordinador</option>

                </select>
                {!!   $errors->first('role','<small>:message</small>')!!}


            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block" id="registrar">
                Crear trabajador
            </button>


            <hr>

        </div>
    </form>

@endsection
