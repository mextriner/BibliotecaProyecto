<?php
session_start();
include 'conexion.php';
if (!isset($_POST['oculto'])) {

    exit();
}
$usuario = $_POST['usuario'];
$mbd->exec("SET CHARACTER SET utf8");
$sql = $mbd->prepare("SELECT * FROM usuario");
$sql->execute();
  
  // Almacenar los resultados en una variable
  $resultados = $sql->fetchAll();
  $entrada = true;
  // Recorrer los resultados
  foreach ($resultados as $fila) {
    if($fila['idUsuario'] == $usuario){
        $entrada = false;
    }

  }
  if($entrada){
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];

    $fecha= $_POST['fechaNac'];
    $fecha = strtotime($fecha);
    $fecha = date('Y-m-d',$fecha);



    $mbd->exec("SET CHARACTER SET utf8");
    $sql = $mbd->prepare("INSERT INTO usuario(idUsuario,nombre,apellido,direccion,fechaNAc,clave) VALUES(?,?,?,?,?,?);");

    $resultado = $sql->execute([$usuario, $nombre, $apellido,$direccion, $fecha,$clave]);
    if ($resultado === TRUE) {
        
        $_SESSION['id'] = $usuario;


        header('Location: index.php');
    } else {
        echo "Error al insertar el registro";
    }
  }else{
    echo "Esta entrada ya existe";
  }
    
    
  



