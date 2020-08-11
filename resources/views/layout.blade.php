<!-- Este es el layout general que sirve de base a todas las vistas -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="col-md-12 text-center align-middle py-5">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-secondary" href="{{ route('usuarios.create') }}">Create</a>
                <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Read</a>
                <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Update</a>
                <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Delete</a>
            </div>
        </div>
        @yield('contenido')
    </div>
</body>

</html>