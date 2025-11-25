@extends('layouts.app')

@section('content')
<section class="container-docentes">
    <h1>Detalle del Docente</h1>

    <div class="detalle-docente">
        <img src="{{ $docente->foto ? asset('storage/'.$docente->foto) : asset('img/app/foto-docente.png') }}" width="150">

        <p><strong>DNI:</strong> {{ $docente->dni }}</p>
        <p><strong>Nombre:</strong> {{ $docente->nombres }} {{ $docente->apellidos }}</p>
        <p><strong>Correo:</strong> {{ $docente->correo }}</p>
        <p><strong>Teléfono:</strong> {{ $docente->telefono }}</p>
        <p><strong>Curso que enseña:</strong> {{ $docente->curso->nombre }}</p>

        <a class="btn-guardar" href="{{ route('docentes.edit', $docente) }}">Editar</a>
        <a class="btn-cancelar" href="{{ route('docentes.index') }}">Volver</a>
    </div>
</section>
@endsection
