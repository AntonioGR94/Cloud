@extends('layouts.app')

@section('title', 'Cloud')

@section('content')
    <h1>Lista de entregas de {{$user->name}}</h1>
    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
    <div class="container">
        <div class="row">
            @forelse($files as $file)
                <div class="card text-white bg-secondary col-3 offset-1 mb-5">
                    <div>
                        <img class="img-thumbnail mx-auto" src="{{ $file->archivo }}" alt="">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Asunto: {{ $file->name }}</h4>
                        <p class="card-text">Descripción: {{ $file->description }}</p>

                        @include('public.files.partials.buttons')

                        <a href="/files/{{ $file->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
                    </div>
                </div>


            @empty
                <p>No hay entregas</p>
            @endforelse
        </div>

    </div>
    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
@endsection