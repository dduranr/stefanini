@extends('layout')

@section('contenido')
<!-- Esta vista corresponde con el formulario para editar al usuario seleccionado -->
<div class="row">
    <div class="col-md-12 text-center">
        <h1>UPDATE</h1>
        <h3>Editando registro {{ $usuario->id }}</h3>
    </div>

    <div class="col-md-12">
        <!-- Esto se encarga de mostrar errores de validación -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Esto se encarga de mostrar el mensaje de éxito en caso que se haya generado correctamente el usuario -->
        @if(session('msg_success'))
        <div class="alert alert-success">
            {{ session('msg_success') }}
        </div>
        @endif
    </div>

    <div class="col-md-6 mx-auto">
        <!-- Aquí va el formulario propiamente, el cual apunta a la ruta encargada de actualizar al usuario en cuestión. Cada campo tiene como value el dato proveniente de la base de datos -->
        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="name" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" value="{{ $usuario->name }}" />
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <br />

            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" disabled />
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <br />

            <input type="submit" value="Actualizar" class="form-control" />
        </form>
    </div>
</div>
@endsection