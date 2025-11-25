@extends('layouts.app')

@push('styles')
@vite(['resources/css/docentes.css'])
@endpush

@section('content')
<section class="container-docentes">
    <h1>Registrar Docente</h1>

    <form action="{{ route('docentes.store') }}" method="POST" enctype="multipart/form-data" class="form-docente">
        @csrf

        <div class="form-grupo">
            <label>DNI:</label>
            <input type="text" name="dni" maxlength="8" value="{{ old('dni') }}" required>
            @error('dni') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-grupo">
            <label>Nombres:</label>
            <input type="text" name="nombres" value="{{ old('nombres') }}" required>
            @error('nombres') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-grupo">
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="{{ old('apellidos') }}" required>
            @error('apellidos') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-grupo">
            <label>Correo:</label>
            <input type="email" name="correo" value="{{ old('correo') }}">
            @error('correo') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-grupo">
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}">
        </div>

        {{-- NUEVO: Seleccionar curso --}}
        <div class="form-grupo">
            <label>Curso que enseñará:</label>
            <select name="curso_id" required>
                <option value="">Seleccione un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
            @error('curso_id') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-grupo">
            <label>Foto:</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <div class="acciones-form">
            <button type="submit" class="btn-guardar">Guardar</button>
            <a href="{{ route('docentes.index') }}" class="btn-cancelar">Cancelar</a>
        </div>

    </form>
</section>
@endsection


