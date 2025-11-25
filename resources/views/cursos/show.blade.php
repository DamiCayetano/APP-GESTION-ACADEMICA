@extends('layouts.app')

@section('content')
<section class="container-cursos">
    <h1>Detalles del Curso</h1>

    <p><strong>Nombre:</strong> {{ $curso->nombre }}</p>
    <p><strong>Área:</strong> {{ $curso->area }}</p>
    <p><strong>Nivel:</strong> {{ $curso->nivel->nombre }}</p>
    <p><strong>Grado:</strong> {{ $curso->grado->nombre }}</p>
    <p><strong>Horas:</strong> {{ $curso->horas_semanales }} horas</p>
    <p><strong>Estado:</strong> {{ $curso->estado }}</p>

    <a href="{{ route('cursos.index') }}">Volver a la lista</a>
</section>
@endsection
