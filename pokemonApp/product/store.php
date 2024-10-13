<?php

// 1º Habilito la visualización de errores (solo en desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Compruebo si el usuario está logueado
session_start();
if(!isset($_SESSION['user'])) {
    header('Location:.'); // redireccion
    exit; //detengo la ejecución
}

// Conexión a la base de datos
try {
    $connection = new \PDO(
      'mysql:host=localhost;dbname=productdatabase',
      'productuser',
      'productpassword',
      array(
        PDO::ATTR_PERSISTENT => true,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
    );
} catch(PDOException $e) {
    header('Location: create.php?op=errorconnection&result=0');
    exit;
}

$resultado = 0;
$url = 'create.php?op=insertproduct&result=' . $resultado;

// Compruebo que los datos obligatorios: nombre y precio
if(isset($_POST['name']) && isset($_POST['price'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $ok = true;
    $name = trim($name);
    // Verifica que el nombre tenga entre 2 y 100 caracteres
    if(strlen($name) < 2 || strlen($name) > 100) { 
        $ok = false;
    }
    // Verifica que el precio sea un número entre 0 y 1,000,000
    if(!(is_numeric($price) && $price >= 0 && $price <= 1000000)) { 
        $ok = false;
    }

    if($ok) {
        // Prepara la consulta SQL para insertar un producto
        $sql = 'insert into product (name, price) values (:name, :price)'; 
        $sentence = $connection->prepare($sql); 
        // Define los parámetros para la consulta
        $parameters = ['name' => $name, 'price' => $price]; 
        foreach($parameters as $nombreParametro => $valorParametro) { 
            $sentence->bindValue($nombreParametro, $valorParametro); 
        }

        try {
            $sentence->execute(); 
            $resultado = $connection->lastInsertId(); 
            $url = 'index.php?op=insertproduct&result=' . $resultado; 
        } catch(PDOException $e) {
            
        }
    }
}
if($resultado == 0) {
    $_SESSION['old']['name'] = $name; // Guarda el nombre en la sesión en caso de error
    $_SESSION['old']['price'] = $price; // Guarda el precio en la sesión en caso de error
}

// El método header() redirecciona a la URL indicada
header('Location: ' . $url);