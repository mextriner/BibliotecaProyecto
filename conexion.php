<?PHP

//VOY LAS VARIABLES PARA GURADR LOS PARAMETROS DE LA CONEXIÓN
    $contrasena = '1234';
    $usuario = 'root';
    $bd ='biblioteca';

    try{
        // montar la conexion a la base de datos
        $mbd = new PDO('mysql:host=localhost;dbname='.$bd,$usuario,$contrasena);
        $mbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch(Exception $e){
        echo "Error de conexión" . $e->getMessage();
    }
?>