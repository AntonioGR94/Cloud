@extends('layouts.app')

@section('title', 'Edit file')


@section('content')
    <h1>Editar Entrega</h1>
    <form action="/files/{{ $file->id }}" method="post" enctype="multipart/form-data" novalidate>

        @csrf
        @method('patch')

        @include('public.files.partials.form')

        <button type="submit" class="btn btn-primary">Editar Entrega</button>
    </form>
@endsection