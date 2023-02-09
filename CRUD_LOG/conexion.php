<?php
$contrasena = '1234';
$usuario = 'root';
$nombreBD = 'liceo';

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
