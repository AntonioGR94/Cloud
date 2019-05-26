@extends('layouts.app')

@section('title', 'Cloud')

@section('content')

    <div class="container">
        <div class="row">
                <div class="card text-white bg-secondary col-3 offset-1 mb-5">
                    <div>
                        <img class="img-thumbnail mx-auto" src="{{ $file->archivo }}" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Usuario: {{ $file->user->name }}</h3>
                        <h4 class="card-title">Asunto: {{ $file->name }}</h4>
                        <p class="card-text">Descripción: {{ $file->description }}</p>
                    </div>
                </div>
@endsection