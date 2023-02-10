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
        $this->Cell(80, 10, 'LISTADO DE LIBROS', 1, 0, 'C');
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
$consulta2 = "SELECT * FROM libro;";
$sql2 = $mbd->prepare($consulta2);
$sql2->execute();
$resultado2 = $sql2->fetchALL(PDO::FETCH_ASSOC);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, "ISBN", 0, 0, 'C', 0);
$pdf->Cell(50, 5, utf8_decode("TÍTULO"), 0, 0, 'C', 0);
$pdf->Cell(30, 5, utf8_decode("PUBLICACIÓN"), 0, 0, 'C', 0);
$pdf->Cell(30, 5, "EDITORIAL", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "UNIDADES", 0, 1, 'C', 0);

foreach ($resultado2 as $libro) {

    $stmt = $mbd->prepare("SELECT * FROM editorial WHERE idEditorial = ?;");
    $stmt->execute([$libro['Editorial_idEditorial']]);
    $editorial = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt2 = $mbd->prepare("SELECT COUNT(*) FROM unidad WHERE unidad.Libro_ISBN = ?;");
    $stmt2->execute([$libro['ISBN']]);
    $unidades = $stmt2->fetchColumn();

    $pdf->Cell(30, 5, utf8_decode($libro['ISBN']), 1, 0, 'L', 0);
    $pdf->Cell(50, 5, utf8_decode($libro['titulo']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($libro['fechaPublicacion']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($editorial['nombre']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, $unidades, 1, 1, 'L', 0);
}
$pdf->Ln(10);

$pdf->Output();
$pdf->close();
?>