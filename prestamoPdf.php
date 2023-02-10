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
$consulta3 = "SELECT * FROM usuario_has_unidad;";
$sql3 = $mbd->prepare($consulta3);
$sql3->execute();
$resultado3 = $sql3->fetchALL(PDO::FETCH_ASSOC);



// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, "USUARIO", 0, 0, 'C', 0);
$pdf->Cell(50, 5, "LIBRO", 0, 0, 'C', 0);
$pdf->Cell(50, 5, utf8_decode("FECHA PRÉSTAMO"), 0, 0, 'C', 0);
$pdf->Cell(50, 5, "FECHA ENTREGA", 0, 1, 'C', 0);

foreach ($resultado3 as $prestamo) {

    $devol = date("Y-m-d H:i:s",strtotime($prestamo['Fecha']."+2 week"));

    $stmt3 = $mbd->prepare("SELECT * FROM unidad WHERE idUnidad = ?;");
    $stmt3->execute([$prestamo['Unidad_idUnidad']]);
    $un = $stmt3->fetch(PDO::FETCH_ASSOC);

    $stmt4 = $mbd->prepare("SELECT * FROM libro WHERE ISBN = ?;");
    $stmt4->execute([$un['Libro_ISBN']]);
    $l = $stmt4->fetch(PDO::FETCH_ASSOC);

    $stmt5 = $mbd->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
    $stmt5->execute([$prestamo['Usuario_idUsuario']]);
    $us = $stmt5->fetch(PDO::FETCH_ASSOC);

    $pdf->Cell(30, 5, utf8_decode($us['idUsuario']), 1, 0, 'L', 0);
    $pdf->Cell(50, 5, utf8_decode($l['titulo']), 1, 0, 'L', 0);
    $pdf->Cell(50, 5, utf8_decode($prestamo['Fecha']), 1, 0, 'L', 0);
    $pdf->Cell(50, 5, $devol, 1, 1, 'L', 0);
}
$pdf->Ln(10);

$pdf->Output();
$pdf->close();
?>