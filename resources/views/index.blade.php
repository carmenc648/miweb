@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Permisos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('permisos.create') }}" class="btn btn-primary mb-3">Nuevo Permiso</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Tipo de permiso</th>
                <th>Motivo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permisos as $permiso)
                <tr>
                    <td>{{ $permiso->id }}</td>
                    <td>{{ $permiso->empleado->nombre_completo ?? 'Sin empleado' }}</td>
                    <td>{{ $permiso->fecha }}</td>
                    <td>{{ $permiso->tipo_permiso }}</td>
                    <td>{{ $permiso->motivo }}</td>
                    <td>{{ $permiso->estado }}</td>
                    <td>
                        <a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('permisos.destroy', $permiso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection