<?php
$clave = '';
$usuario = 'root';
$nombreBD = 'aplicacion';

try{
    $conexion = new PDO('mysql:host=localhost;dbname='.$nombreBD,$usuario,$clave);
    


} catch(Exception $e){
    echo "Error: " . $e->getMessage();


}




?>