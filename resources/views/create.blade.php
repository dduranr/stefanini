@extends('layout')

@section('contenido')
<!-- Esta vista muestra el formulario para crear usuarios -->
<div class="row">
    <div class="col-md-12 text-center">
        <h1>CREATE</h1>
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
        <!-- Aquí va el formulario propiamente, el cual apunta a la ruta encargada de crear al usuario en cuestión. Cada campo tiene como value el valor que el usuario haya puesto antes (si valida mal, entonces se le pone por defecto el valor que puso, así no se pierde y el usuario no tiene que volver a ponerlo) -->
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            @method('POST')

            <input type="text" name="name" placeholder="Nombre" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <br />

            <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" />
            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <br />

            <input type="password" name="password" placeholder="Contraseña" class="form-control" value="{{ old('password') }}" />
            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
            <br />

            <input type="submit" value="Crear" class="form-control" />
        </form>

    </div>
</div>
@endsection