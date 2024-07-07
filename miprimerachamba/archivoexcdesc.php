<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

session_start();
// Obtener el array de la sesión
// $arrErr = $_SESSION['errs'];
$arrErr = isset($_SESSION['errs']) ? $_SESSION['errs'] : null;
$evals = isset($_SESSION['evs']) ? $_SESSION['evs'] : null;

if ($arrErr === null || $evals === null) {
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

//Encabezado
$hojaActiva->setCellValue('A1', 'Agente');
$hojaActiva->setCellValue('B1', 'Errores');
$hojaActiva->setCellValue('D1', 'Evaluaciones');
$hojaActiva->setCellValue('E1', 'Cantidad');
$hojaActiva->getColumnDimension('A')->setWidth(26); //ancho de columna
$hojaActiva->getColumnDimension('B')->setWidth(9); //ancho de columna
$hojaActiva->getColumnDimension('D')->setWidth(26); 
$hojaActiva->getColumnDimension('E')->setWidth(9); 

$row = 2;
for($i=0; $i<count($arrErr["ags"]);$i++){
    $hojaActiva->setCellValue('A'.$row, $arrErr["ags"][$i]);
    $hojaActiva->setCellValue('B'.$row, $arrErr["err"][$i]);
    $row++;
};
$hojaActiva->setCellValue('A'.$row, 'TOTAL');
$hojaActiva->setCellValue('B'.$row, $arrErr['tot']);

$row = 2;
foreach($evals as $clave => $valor){
    $hojaActiva->setCellValue('D'.$row, $clave);
    $hojaActiva->setCellValue('E'.$row, $valor);
    $row++;
};

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ListadoErrores.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi Excel.xlsx')


?>