<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imágenes</title>
</head>
<style>
    img {
        width: 200px;
    }
</style>
<body>
    <img src="{{carpeta/faces.png}}" alt="0"> <!-- cogiendo la imagen de public> -->
    <br>
    <img src="{{url('storage/carpeta/faces.png')}}" alt="1"> <!-- cogiendo la imagen de public/storage -->
    <br>
    <img src="{{url('storage/carpeta/patata.png')}}" alt="2"> <!-- cogiendo la imagen de storage/public -->
    <br>
    <img src="" alt="3">  <!-- cogiendo la imagen de storage/private. La unica forma de ver eso es programandolo, no funciona a través de una ruta -->
</body>
</html>