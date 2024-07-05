<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$fecha = "mayo";
    
$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator("movi-das")->setTitle("Listado Calidad ".$fecha);

$spreadsheet->setActiveSheetIndex(0);
$hojaActiva = $spreadsheet->getActiveSheet();

$hojaActiva->setCellValue('A1','Códigos de programacion');
$hojaActiva->setCellValue('B1',123456);

$hojaActiva->setCellValue('C1',"Alexis Figueira")->setCellValue('D1','CDP');

$hojaActiva->getColumnDimension('A')->setWidth(30); //ancho de columna

// $writer = new Xlsx ($spreadsheet); 
// $writer->save("Mi excel.xlsx"); //Estas lineas son para crear y guardar el archivo--> utilizando el factory de mas abajo es para descargarlo desde el navegador (y aparece en descargas del nav)

#1) Este codigo lo buscamos en la doc de phpspreadsheet --> buscamos header/ http headers 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Mi excel.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
#1



?>