<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('bibliLogoW.png', 10, 4, 23);
        // Arial bold 15
        $this->SetFont('ZapfDingbats ', 'B', 15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(80, 10, 'Relacion Notas de alumnos', 1, 0, 'C');
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
$conexion = mysqli_connect("localhost", "root", "1234", "liceo");
$sql = ("SELECT * FROM evaluaciones;");
$resultado = mysqli_query($conexion, $sql);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, "ID_ALUMNO", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "APELLIDO 1", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "APELLIDO 2", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "NOMBRE", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "PARCIAL", 0, 0, 'C', 0);
$pdf->Cell(30, 5, "FINAL", 0, 1, 'C', 0);
$ii = 0;
$media = 0;
while ($fila = $resultado->fetch_assoc()) {

    $pdf->Cell(30, 5, 'Alumno: ' . ($fila['id_alumno']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($fila['primer_apellido']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($fila['segundo_apellido']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, utf8_decode($fila['nombre']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, ($fila['examen_parcial']), 1, 0, 'L', 0);
    $pdf->Cell(30, 5, ($fila['examen_final']), 1, 1, 'L', 0);
}
$pdf->Ln(10);

$pdf->Output();
$pdf->close();
