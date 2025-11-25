@extends('layouts.app')

@push('styles')
@vite(['resources/css/docentes.css'])
@endpush

@section('content')
<section class="container-docentes">
    <h1>Editar Docente</h1>

    <form action="{{ route('docentes.update', $docente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grupo">
            <label>DNI:</label>
            <input type="text" value="{{ $docente->dni }}" disabled>
        </div>

        <div class="form-grupo">
            <label>Nombres:</label>
            <input type="text" name="nombres" value="{{ old('nombres', $docente->nombres) }}" required>
        </div>

        <div class="form-grupo">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="{{ old('apellidos', $docente->apellidos) }}" required>
        </div>

        <div class="form-grupo">
            <label>Correo:</label>
            <input type="email" name="correo" value="{{ old('correo', $docente->correo) }}">
        </div>

        <div class="form-grupo">
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono', $docente->telefono) }}">
        </div>

        <div class="form-grupo">
            <label>Curso que enseña:</label>
            <select name="curso_id" required>
                <option value="">Seleccione</option>
                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" {{ $curso->id == $docente->curso_id ? 'selected' : '' }}>
                    {{ $curso->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-grupo">
            <label>Foto actual:</label>
            <img src="{{ $docente->foto ? asset('storage/'.$docente->foto) : asset('img/app/foto-docente.png') }}" width="120">
        </div>

        <div class="form-grupo">
            <label>Nueva Foto (opcional):</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <div class="acciones-form">
            <button type="submit" class="btn-guardar">Actualizar</button>
            <a href="{{ route('docentes.index') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</section>
@endsection