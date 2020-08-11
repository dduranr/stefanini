@extends('layout')

@section('contenido')
<div class="row">
    <div class="col-md-12 text-center">
        <h1>CREATE</h1>
    </div>

    <div class="col-md-12">
        {{-- El objeto $errors lo genera por default Laravel. Si hay errores de algún tipo (por ejemplo de validación), simplemente hay que buscarlos ahí  --}}
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('msg_success'))
        <div class="alert alert-success">
            {{ session('msg_success') }}
        </div>
        @endif
    </div>

    <div class="col-md-6 mx-auto">
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