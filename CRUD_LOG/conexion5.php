<?php
$contrasena = '';
$usuario = 'root';
$nombreBD = 'alumnos';

try{
    $bd = new PDO('mysql:host=localhost;
		dbname='.$nombreBD,
		$usuario,
		$contrasena
		);
    


} catch(Exception $e){
    echo "Error: " . $e->getMessage();


}




?>