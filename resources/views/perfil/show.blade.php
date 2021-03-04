@extends('layouts.layout')

@section('content')

    <fieldset>
        <legend>Datos personales</legend>
        <label for="">Nombre: </label><input type="text" disabled value="{{ $user->name }}"><br>
        <label for="">Apellido: </label><input type="text" disabled value="{{ $user->surname }}"><br>
        <label for="">Email: </label><input type="text" disabled value="{{ $user->email }}"><br>
        <label for="">Telefono: </label><input type="text" disabled value="{{ $user->phone }}"><br>
        <label for="">Contraseña: </label><input type="text" disabled value="********">
    </fieldset>

    <fieldset>
        <legend>Direccion</legend>
        <label for="">Ciudad: </label><input type="text" disabled value="{{ $user->city }}"><br>
        <label for="">Provincia: </label><input type="text" disabled value="{{ $user->province }}"><br>
        <label for="">Codigo postal:</label><input type="text" disabled value="{{ $user->postal_code }}"><br>
        <label for="">Calle: </label><input type="text" disabled value="{{ $user->street_name }}"><br>
    </fieldset>

    <a href="{{ route("user.edit", $user) }}" class="btn btn-primary">Modificar Datos</a>
@endsection