@extends('layouts.app')

@push('styles')
@vite(['resources/css/cursos.css'])
@endpush

@section('content')
<section class="container-cursos">
    <h1>Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST" class="form-cursos">
        @csrf
        @method('PUT')

        <!-- Nombre del curso -->
        <label for="nombre">Nombre del curso</label>
        <input type="text" id="nombre" name="nombre" value="{{ $curso->nombre }}" required>

        <!-- Área -->
        <label for="area">Área</label>
        <select id="area" name="area" required>
            <option value="Matemáticas" {{ $curso->area == 'Matemáticas' ? 'selected' : '' }}>Matemáticas</option>
            <option value="Ciencias" {{ $curso->area == 'Ciencias' ? 'selected' : '' }}>Ciencias</option>
            <option value="Comunicación" {{ $curso->area == 'Comunicación' ? 'selected' : '' }}>Comunicación</option>
            <option value="Artes" {{ $curso->area == 'Artes' ? 'selected' : '' }}>Artes</option>
            <option value="Deportes" {{ $curso->area == 'Deportes' ? 'selected' : '' }}>Deportes</option>
        </select>

        <!-- Nivel -->
        <label for="nivel">Nivel</label>
        <select id="nivel" name="nivel_id" required>
            @foreach($niveles as $nivel)
                <option value="{{ $nivel->id }}" {{ $curso->nivel_id == $nivel->id ? 'selected' : '' }}>
                    {{ $nivel->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Grado -->
        <label for="grado">Grado</label>
        <select id="grado" name="grado_id" required>
            @foreach($grados as $grado)
                <option value="{{ $grado->id }}" {{ $curso->grado_id == $grado->id ? 'selected' : '' }}>
                    {{ $grado->nombre }}
                </option>
            @endforeach
        </select>

        <!-- Horas -->
        <label for="horas_semanales">Horas</label>
        <input type="number" id="horas_semanales" name="horas_semanales" value="{{ $curso->horas_semanales }}" required>

        <!-- Estado -->
        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="Activo" {{ $curso->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ $curso->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>

        <!-- Botón -->
        <button type="submit" class="btn-crear">Actualizar Curso</button>
    </form>
</section>
@endsection
