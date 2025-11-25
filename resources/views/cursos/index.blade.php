@extends('layouts.app')

@push('styles')
@vite(['resources/css/cursos.css'])
@endpush

@section('content')
<section class="container-cursos">
    <h1>Cursos</h1>

    <section class="herramientas-cursos">
        <section class="acciones">
            <a class="crear" href="{{ route('cursos.create') }}" style="color: white;">
                <!-- Icono de Crear -->
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6667 1.66669H6.66667C5.7475 1.66669 5 2.41419 5 3.33335V13.3334C5 14.2525 5.7475 15 6.66667 15H16.6667C17.5858 15 18.3333 14.2525 18.3333 13.3334V3.33335C18.3333 2.41419 17.5858 1.66669 16.6667 1.66669ZM6.66667 13.3334V3.33335H16.6667L16.6683 13.3334H6.66667Z" fill="white" />
                    <path d="M3.33341 6.66667H1.66675V16.6667C1.66675 17.5858 2.41425 18.3333 3.33341 18.3333H13.3334V16.6667H3.33341V6.66667ZM12.5001 5H10.8334V7.5H8.33341V9.16667H10.8334V11.6667H12.5001V9.16667H15.0001V7.5H12.5001V5Z" fill="white" />
                </svg>
                Crear
            </a>

            <a href="{{ route('cursos.index') }}">
                <!-- Icono de Listar -->
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33325 5H4.99992V6.66667H3.33325V5ZM3.33325 9.16667H4.99992V10.8333H3.33325V9.16667ZM3.33325 13.3333H4.99992V15H3.33325V13.3333ZM16.6666 6.66667V5H6.68575V6.66667H15.6666H16.6666ZM6.66659 9.16667H16.6666V10.8333H6.66659V9.16667ZM6.66659 13.3333H16.6666V15H6.66659V13.3333Z" fill="#6D6F8A" />
                </svg>
                Listar
            </a>

            <a href="">
                <!-- Icono de Reportes -->
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6666 6.66675L11.6666 1.66675H4.99992C4.55789 1.66675 4.13397 1.84234 3.82141 2.1549C3.50885 2.46746 3.33325 2.89139 3.33325 3.33341V16.6667C3.33325 17.1088 3.50885 17.5327 3.82141 17.8453C4.13397 18.1578 4.55789 18.3334 4.99992 18.3334H14.9999C15.4419 18.3334 15.8659 18.1578 16.1784 17.8453C16.491 17.5327 16.6666 17.1088 16.6666 16.6667V6.66675ZM7.49992 15.8334H5.83325V8.33341H7.49992V15.8334ZM10.8333 15.8334H9.16658V10.8334H10.8333V15.8334ZM14.1666 15.8334H12.4999V13.3334H14.1666V15.8334ZM11.6666 7.50008H10.8333V3.33341L14.9999 7.50008H11.6666Z" fill="#6D6F8A" />
                </svg>
                Reportes
            </a>
        </section>

        <input class="buscar" type="text" placeholder="Busque un curso">
    </section>

    <table class="registro-cursos">
        <thead>
            <tr>
                <th>Nombre del curso</th>
                <th>Área</th>
                <th>Nivel</th>
                <th>Grado</th>
                <th>Horas Semanales</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nombre }}</td>
                <td>{{ $curso->area }}</td>
                <td>{{ $curso->nivel->nombre }}</td>
                <td>{{ $curso->grado->nombre }}</td>
                <td>{{ $curso->horas_semanales }} horas</td>

                <td>
                    <div class="estado {{ $curso->estado == 'Activo' ? 'activo' : 'inactivo' }}">
                        <span class="dot {{ $curso->estado == 'Activo' ? 'dot-activo' : 'dot-inactivo' }}"></span>
                        {{ $curso->estado }}
                    </div>
                </td>

                <td class="acciones-tabla">
                    <a class="accion-editar" href="{{ route('cursos.edit', $curso->id) }}" class="btn-accion">
                        <!-- Icono Editar -->
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#55679C" />
                            <path d="M20.8709 11.1675C21.1859 10.8525 21.3592 10.4342 21.3592 9.98919C21.3592 9.54419 21.1859 9.12585 20.8709 8.81085L19.5492 7.48919C19.2342 7.17419 18.8159 7.00085 18.3709 7.00085C17.9259 7.00085 17.5075 7.17419 17.1934 7.48835L8.33337 16.3209V20H12.0109L20.8709 11.1675ZM18.3709 8.66752L19.6934 9.98835L18.3684 11.3084L17.0467 9.98752L18.3709 8.66752ZM10 18.3334V17.0125L15.8667 11.1642L17.1884 12.4859L11.3225 18.3334H10ZM8.33337 21.6667H21.6667V23.3334H8.33337V21.6667Z" fill="white" />
                        </svg>
                    </a>

                    <a class="accion-ver" href="{{ route('cursos.show', $curso->id) }}" class="btn-accion">
                        <!-- Icono Ver -->
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="30" height="30" rx="5" fill="#216FD5" />
                            <path d="M15 12.5C14.3383 12.5044 13.705 12.7692 13.2371 13.2371C12.7692 13.705 12.5044 14.3383 12.5 15C12.5 16.3683 13.6317 17.5 15 17.5C16.3675 17.5 17.5 16.3683 17.5 15C17.5 13.6325 16.3675 12.5 15 12.5Z" fill="white" />
                            <path d="M15 9.16669C8.6392 9.16669 6.72754 14.6809 6.71004 14.7367L6.6217 15L6.7092 15.2634C6.72754 15.3192 8.6392 20.8334 15 20.8334C21.3609 20.8334 23.2725 15.3192 23.29 15.2634L23.3784 15L23.2909 14.7367C23.2725 14.6809 21.3609 9.16669 15 9.16669ZM15 19.1667C10.5409 19.1667 8.81337 15.9617 8.39504 15C8.81504 14.035 10.5434 10.8334 15 10.8334C19.4592 10.8334 21.1867 14.0384 21.605 15C21.185 15.965 19.4567 19.1667 15 19.1667Z" fill="white" />
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
