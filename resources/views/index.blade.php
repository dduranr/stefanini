@extends('layout')

@section('contenido')
<div class="row">
    <div class="col-md-12 text-center mb-5">
        <h1>Read + Update + Delete</h1>
    </div>
    <div class="col-md-12 text-center mb-5">
        @if(session('msg_success'))
        <div class="alert alert-success">
            {{ session('msg_success') }}
        </div>
        @endif
    </div>

    <div class="col-md-12">
        <table class="table table-sm">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ACCIONES</th>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('usuarios.show', $usuario->id) }}">Mostrar</a>
                            <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection