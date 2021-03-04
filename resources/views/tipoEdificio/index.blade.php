@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Ver edificios</p>
        <ul>
            @forelse ($tiposEdificios as $i)
                <li>{{ $i->name }}</li>
            @empty
                
            @endforelse
        </ul>
    </div>
@endsection