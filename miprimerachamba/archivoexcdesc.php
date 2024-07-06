<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

session_start();
// Obtener el array de la sesión
// $arrErr = $_SESSION['errs'];
$arrErr = isset($_SESSION['errs']) ? $_SESSION['errs'] : null;
if ($arrErr === null) {
    echo "No hay datos para procesar.";
    exit();
}

// Usar el array como necesites
// echo "voy a mostrar el array en descarga <br><br>";
// print_r($arrErr);  --> hacer un print_r rompe la descarga del archivo.

$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator("movi-das")->setTitle("Listado errores");

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$hojaActiva->setCellValue('A1', 'Agente');
$hojaActiva->setCellValue('B1', 'Errores');

$row = 2;
for($i=0; $i<count($arrErr["ags"]);$i++){
    $hojaActiva->setCellValue('A'.$row, $arrErr["ags"][$i]);
    $hojaActiva->setCellValue('B'.$row, $arrErr["err"][$i]);
    $row++;
}

$hojaActiva->getColumnDimension('A')->setWidth(30); //ancho de columna
$hojaActiva->getColumnDimension('B')->setWidth(10); //ancho de columna

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mi Excel.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi Excel.xlsx')


?>