@extends('layouts.app')
@push('styles')
@vite(['resources/css/cursos.css'])
@endpush
@section('content')
<section class="crear-cursos">
    <h1>Registrar nuevo curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST" class="form-cursos">
        @csrf

        <!-- Nombre del curso -->
        <label for="nombre">Nombre del curso</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del curso" required>

        <!-- Área -->
        <label for="area">Área</label>
        <select id="area" name="area" required>
            <option value="">Seleccione un área</option>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Ciencias">Ciencias</option>
            <option value="Comunicación">Comunicación</option>
            <option value="Artes">Artes</option>
            <option value="Deportes">Deportes</option>
        </select>

        <!-- Nivel -->
        <label for="nivel">Nivel</label>
        <select id="nivel" name="nivel_id" required>
            <option value="">Seleccione un nivel</option>
            @foreach($niveles as $nivel)
                <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
            @endforeach
        </select>

        <!-- Grado -->
        <label for="grado">Grado</label>
        <select id="grado" name="grado_id" required>
            <option value="">Seleccione un grado</option>
            @foreach($grados as $grado)
                <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
            @endforeach
        </select>

        <!-- Horas -->
        <label for="horas">Horas</label>
        <input type="number" id="horas_semanales" name="horas_semanales" placeholder="Cantidad de horas" required>

        <!-- Estado -->
        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="">Seleccione</option>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <!-- Botón -->
        <button type="submit" class="btn-crear">Crear</button>
    </form>
</section>
@endsection
