@extends('layouts.app')

@section('title', 'Cloud')

@section('content')
    <h1>Files List</h1>
    @forelse($files as $file)
        <div class="book-card card mb-2">
            <div class="card-header">
                {{ $file->name }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        {{ $file->description }}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No hay libros</p>
    @endforelse
@endsection