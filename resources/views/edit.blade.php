@extends('layout')

@section('contenido')
<div class="row">
    <div class="col-md-12 text-center">
        <h1>UPDATE</h1>
        <h3>Editando registro {{ $usuario->id }}</h3>
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