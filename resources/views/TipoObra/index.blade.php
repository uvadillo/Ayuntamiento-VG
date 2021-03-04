@extends('layouts.app')
@section('content')
    <div class="container">
        <p>Ver obras</p>
        <ul>
            @forelse ($tiposObras as $i)
                <li>{{ $i->name }}</li>
            @empty
                
            @endforelse
        </ul>
    </div>
@endsection
