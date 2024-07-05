<?php
include("funciones.php"); 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if(!file_exists("archivos")){ //si no existe..
    if(!mkdir("archivos",0777)){ /// si no lo crea
        echo "error al crear el directorio";
        exit();
    }
}
chmod("archivos",0777); //permisos del fichero
//movemos el archivo de un lugar a otro
if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
}else{
    echo "error al guardar el archivo";
};


// Verificar si el archivo ha sido subido correctamente

if(file_exists("archivos/".$_FILES['fichero']['name'])){
    $file = "archivos/".$_FILES['fichero']['name'];
    
    // Cargar el archivo Excel
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($file);
    //$spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();

    // Inicializar arrays para las columnas C, D , E y F
    $arc = array('fec'=>[],"tic"=>[],"ev"=>[],"ag"=>[],"emp"=>[],"evar"=>[]);
    
    // Recorrer las filas 6 a 30
    for ($row = 7; $row <= 46; $row++) {
        $arc["fec"][] = $sheet->getCell('C' . $row)->getValue();
        $arc["tic"][] = $sheet->getCell('D' . $row)->getValue();
        $arc["ev"][] = $sheet->getCell('E' . $row)->getValue();
        $arc["ag"][] = $sheet->getCell('F' . $row)->getValue();        
    }

    for ($row = 8; $row <= 27; $row++) {
        $arc["emp"][] = $sheet->getCell('N' . $row)->getValue();
    }
    for ($row = 8; $row <= 14; $row++) {
        $arc["evar"][] = $sheet->getCell('P' . $row)->getValue();
    }

    $excelTimestamp = $arc["fec"][0]; //valor recogido de la celda del archivo excel
    $objetoDateTime = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelTimestamp);

    echo $objetoDateTime->format('Y-m-d');
    echo "<br>";

    #Imprimir los arrays para verificar
    // echo 'Columna C: ';
    // print_r($arc["fec"]);
    // echo '<br><br>Columna D: ' ;
    // print_r($arc["tic"]);
    // echo '<br><br>Columna E: ' ;
    // print_r($arc["ev"]);
    // echo '<br><br>Columna F: ';
    // print_r($arc["ag"]);
    // echo "<br><br>Agentes del área: " ;
    // print_r($arc["emp"]);
    // echo "<br><br>Evaluaciones del área: " ;
    // print_r($arc["evar"]);

    // echo "<br><br><br>Voy a hacer las validaciones:<br>";
    if (v_registro($arc["ag"], $arc["emp"])){
        echo "Agentes validos<br>";
        if(v_ticket($arc["tic"])){
            echo "Tickes validos<br>";
            if(v_registro($arc["ev"], $arc["evar"])){
                echo "Evaluaciones validas<br>";
                $arrErr = err_ag($arc);
            };
        };
    };
};

// dev_arc($agReg, $agArea, $eval, $tick, $errores, $totErr);
// function dev_arc($agenReg, $agenArea, $evaluac, $tickets, $arrErr, $errTot){
//     $fecha = "mayo";

//     $spreadsheet2 = new Spreadsheet();
//     $spreadsheet2->getProperties()->setCreator("movi-das")->setTitle("Listado errores".$fecha);

//     $spreadsheet2->setActiveSheetIndex(0);
//     $hojaActiva = $spreadsheet2->getActiveSheet();

//     $hojaActiva->setCellValue('A1','Agente');
//     $hojaActiva->setCellValue('B1','Errores');
//     // $hojaActiva->setCellValue('C1',"Alexis Figueira")->setCellValue('D1','CDP');

//     $hojaActiva->getColumnDimension('A')->setWidth(30); //ancho de columna

//     //write errores x agente
//     for($i=0 ; $i<count($agenArea);$i++){
//         $row = 2;
//         $hojaActiva->setCellValue('A'.$row, $agenArea[$i]);
//         $hojaActiva->setCellValue('B'.$row, $arrErr[$i]);
//         $row++;
//     }




//     // $writer = new Xlsx ($spreadsheet); 
//     // $writer->save("Mi excel.xlsx"); //Estas lineas son para crear y guardar el archivo--> utilizando el factory de mas abajo es para descargarlo desde el navegador (y aparece en descargas del nav)
//     #1) Este codigo lo buscamos en la doc de phpspreadsheet --> buscamos header/ http headers 
//     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//     header('Content-Disposition: attachment;filename="Errores CIP.xlsx"');
//     header('Cache-Control: max-age=0');

//     $writer = IOFactory::createWriter($spreadsheet2, 'Xlsx');
//     $writer->save('php://output');
//     #1
// }




?>