@extends('layout')

@section('contenido')
<!-- Esta vsita se encarga de mostrar la info del usuario seleccionado -->
<div class="row">
    <div class="col-md-12 text-center">
        <h1>Visualizando usuario {{ $usuario->id }}</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12 mb-5">
        <h3>Nombre:</h3>{{ $usuario->name }}
    </div>
    <div class="col-md-12">
        <h3>Email:</h3>{{ $usuario->email }}
    </div>
</div>
@endsection