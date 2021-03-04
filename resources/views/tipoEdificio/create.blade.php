@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session("status"))
            <p>{{ session("status") }}</p>
        @endif
        <Form method="POST" action="{{ route("tipoEdificio.store") }}">
            @csrf
            <label for="">Tipo edificio</label>
            <input type="text" name="tipoEdificio" value="{{ old("tipoEdificio") }}"><br>
            <input type="submit" value="Crear">
        </Form>
        @if ($errors->any())
            @foreach ($errors->all() as $e)
                {{ $e }}
            @endforeach
        @endif
    </div>


@endsection