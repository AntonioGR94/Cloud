@extends('layouts.app')

@section('title', 'New file')


@section('content')
    <form action="/files" method="post" enctype="multipart/form-data" novalidate>

        @csrf

        @include('public.files.partials.form')

        <button type="submit" class="btn btn-dark">Subir entrega</button>
    </form>
@endsection