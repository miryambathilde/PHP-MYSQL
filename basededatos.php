<?php

//definimos la variable $limit
$limit = 3;
try{
$basededatos = new PDO("mysql:host=localhost;dbname=marketpro", "miryambathilde", "12345678");
//METODOS PDO:
$basededatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$basededatos->exec("SET NAMES utf-8");
}catch(Exception $e){
    var_dump($e);
    echo "Conexion no disponible";
    exit;
}
//query
try {
    $resultado = $basededatos->query("SELECT nombre, img, precio FROM ofertas ORDER BY sku ASC LIMIT $limit");
} catch (Exception $e) {
    echo "No OK";
    exit;
}

//PARA OBTENER SOLO UN PRODUCTO DE LA BBDD o CUANDO QUIERO ESTABLECER UNA CONDICION
/*try {
    $resultado = $basededatos->query("SELECT nombre, img, precio FROM ofertas WHERE sku = 2");
} catch (Exception $e) {
    echo "No OK";
    exit;
}*/
echo "<pre>";
var_dump($resultado->fetchAll(PDO::FETCH_ASSOC));

?>