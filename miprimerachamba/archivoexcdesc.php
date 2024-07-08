<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

session_start();
// Obtener el array de la sesión
// $arrErr = $_SESSION['errs'];
$arrErr = isset($_SESSION['errs']) ? $_SESSION['errs'] : null;
$evals = isset($_SESSION['evs']) ? $_SESSION['evs'] : null;

if ($arrErr === null || $evals === null) {
    echo "No hay datos para procesar.";
    exit();
};

// Usar el array como necesites
// echo "voy a mostrar el array en descarga <br><br>";
// print_r($arrErr);  --> hacer un print_r rompe la descarga del archivo.

$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator("movi-das")->setTitle("Listado errores")->setDescription('Proceso de errores - CIP');
$nombreArchivo = "ListadoErrores.xlsx";

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$hojaActiva->setTitle("Reporte");

//Arrays estilos
$bordesAll=[
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => Color::COLOR_BLACK],
        ],
    ],
];
$fondoTit=[ 
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'argb' => '0092BC',
        ],
    ],
];
$fondoSec=[ 
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
            'argb' => '00516E', 
        ],
    ],
];

//Encabezado
$hojaActiva->setCellValue('A1', 'Agente');
$hojaActiva->setCellValue('B1', 'Errores');
$hojaActiva->setCellValue('D1', 'Evaluaciones');
$hojaActiva->setCellValue('E1', 'Cantidad');
$hojaActiva->getStyle('A1:B1')->applyFromArray($fondoTit);
$hojaActiva->getStyle('D1:E1')->applyFromArray($fondoTit);

//Estilo tabla
$hojaActiva->getColumnDimension('A')->setWidth(26); //ancho de columna
$hojaActiva->getColumnDimension('B')->setWidth(8); //ancho de columna
$hojaActiva->getColumnDimension('D')->setWidth(26); 
$hojaActiva->getColumnDimension('E')->setWidth(9); 
$hojaActiva->getStyle('A1:B'.count($arrErr["ags"])+2)->applyFromArray($bordesAll);
$hojaActiva->getStyle('D1:E'.count($evals)+1)->applyFromArray($bordesAll);

$hojaActiva->getStyle('A'.(count($arrErr["ags"])+2).':B'.(count($arrErr["ags"])+2))->applyFromArray($fondoSec);
$hojaActiva->getStyle('D'.(count($evals)+1).':E'.(count($evals)+1))->applyFromArray($fondoSec);

//Carga de datos
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
header('Content-Disposition: attachment;filename="'.$nombreArchivo.'"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi Excel.xlsx')


?>