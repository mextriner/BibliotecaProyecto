<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('img/bibliLogoW.png', 10, 4, 23);
        // Arial bold 15
        $this->SetFont('Times', 'B', 15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(80, 10, 'USUARIOS', 1, 0, 'C');
        // Salto de línea
        $this->Ln(60);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Times', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}


//CONEXIÓN A LA BDD
include 'conexion.php';
$consulta = "SELECT * FROM usuario;";
$sql = $mbd->prepare($consulta);
$sql->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, "USUARIO", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "NOMBRE", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "APELLIDO", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "EDAD", 0, 0, 'C', 0);
$pdf->Cell(30, 5, utf8_decode("DIRECCIÓN"), 0, 1, 'C', 0);

$hoy = date('Y-m-d');
$hoy = strtotime($hoy);

foreach ($resultado as $usuario) {
    $nac = strtotime($usuario['fechaNac']);

    $edad = round(((((abs($hoy - $nac)) / 60) / 60) / 24) / 365, 0);

    $pdf->Cell(30, 5, utf8_decode($usuario['idUsuario']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($usuario['nombre']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($usuario['apellido']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode(($edad)." años"), 1, 0, 'L', 0);
    $pdf->Cell(55, 5, utf8_decode($usuario['direccion']), 1, 1, 'L', 0);
}
$pdf->Ln(10);

$pdf->Output();
$pdf->close();
?>