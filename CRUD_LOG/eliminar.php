<?php
	if(!isset($_GET['id'])){
		exit();
		
		
	}
	$codigo = $_GET['id'];
	include 'conexion.php';
	$sql = $bd->prepare("DELETE FROM evaluaciones WHERE id_alumno = ?;");
	$resultado = $sql->execute([$codigo]);
	if($resultado === TRUE){
		header('Location: index.php');
	} else{
		echo "Error al intentar eliminar el registro";
	}

?>