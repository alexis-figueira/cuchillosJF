<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; //uso de librería
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; // sin uso (este descarga el archivo en la ubicacion del código)
use PhpOffice\PhpSpreadsheet\IOFactory; // para descarga de arhivo con heades (guarda en descargas de pc)
use PhpOffice\PhpSpreadsheet\Style\Border; // estilo celda -> tipo borde
use PhpOffice\PhpSpreadsheet\Style\Color; // estilo celda -> color borde
use PhpOffice\PhpSpreadsheet\Style\Fill; // estilo celda -> fondo

session_start(); // abre sesion para poder mandar una var guardada
$arrErr = isset($_SESSION['errs']) ? $_SESSION['errs'] : null; // guardo var guardada en session 
$evals = isset($_SESSION['evs']) ? $_SESSION['evs'] : null;

if ($arrErr === null || $evals === null) {
    echo "No hay datos para procesar.";
    exit();
}; // verifico que no exista

// print_r($arrErr);  --> hacer un print_r rompe la descarga del archivo.

$spreadsheet = new Spreadsheet(); // creo objeto tipo spreadsheet
$spreadsheet->getProperties()->setCreator("movi-das")->setTitle("Listado errores")->setDescription('Proceso de errores - CIP');//aplico propiedades al objeto
$nombreArchivo = "ListadoErrores.xlsx";

$spreadsheet->setActiveSheetIndex(0); // indico en hoja pararse para trabajar
$hojaActiva = $spreadsheet->getActiveSheet(); //guardo en que hoja vamos a trabajar

$hojaActiva->setTitle("Reporte");

//guardo Arrays de estilos para luego aplicar
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
$hojaActiva->setCellValue('A1', 'Agente'); // doy valor a celda
$hojaActiva->setCellValue('B1', 'Errores');
$hojaActiva->setCellValue('D1', 'Evaluaciones');
$hojaActiva->setCellValue('E1', 'Cantidad');
$hojaActiva->getStyle('A1:B1')->applyFromArray($fondoTit); //aplico estilos guardados
$hojaActiva->getStyle('D1:E1')->applyFromArray($fondoTit);

//Estilo tabla
$hojaActiva->getColumnDimension('A')->setWidth(26); //ancho de columna
$hojaActiva->getColumnDimension('B')->setWidth(8); //ancho de columna
$hojaActiva->getColumnDimension('D')->setWidth(26); 
$hojaActiva->getColumnDimension('E')->setWidth(9); 
$hojaActiva->getStyle('A1:B'.count($arrErr["ags"])+2)->applyFromArray($bordesAll); 
$hojaActiva->getStyle('D1:E'.count($evals)+1)->applyFromArray($bordesAll);

$hojaActiva->getStyle('A'.(count($arrErr["ags"])+2).':B'.(count($arrErr["ags"])+2))->applyFromArray($fondoSec); //aplico estilos a una seleccion de celdas
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

//creo el excel enviando por headers la información (para que se descargue del navegador en el escritorio de la pc)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nombreArchivo.'"');
header('Cache-Control: max-age=0');
//NOTA: al realizar un header, hay que tener en cuenta que no haya nada mostrado por pantalla, ni print_r ni echo ya que modifica los datos enviadso.


$writer = IOFactory::createWriter($spreadsheet, 'Xlsx'); // -> uso de la librería IOFactory
$writer->save('php://output');

// $writer = new Xlsx($spreadsheet);
// $writer->save('Mi Excel.xlsx')


?>