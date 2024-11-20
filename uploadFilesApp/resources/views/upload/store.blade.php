<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>subido</title>
</head>
<body>
    <h1>Su archivo {{ $nombre_original }} se ha incluido con éxito.</h1>

    <a href="{{ url()->previous() }}">
        <button>Volver</button>
    </a>
</body>
</html>