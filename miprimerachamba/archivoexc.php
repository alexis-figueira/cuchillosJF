<?php
include("funciones.php"); 
include("echo.php");
require 'vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\IOFactory; 
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Shared\Date; 

$fIni = $_POST['fIni']; 
$fFin = $_POST['fFin']; 

session_start(); 

if(!file_exists("archivos")){ 
    if(!mkdir("archivos",0777)){ 
        echo "error al crear el directorio";
        exit();
    };
};
chmod("archivos",0777); 
if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
}else{
    echo "error al guardar el archivo";
    exit();
};

if(file_exists("archivos/".$_FILES['fichero']['name'])){ 
    $file = "archivos/".$_FILES['fichero']['name']; 
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx(); 
    $reader->setReadDataOnly(true); 
    $spreadsheet = $reader->load($file); 
    //$spreadsheet = IOFactory::load($file);
	$sheetReg = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
    $index = $spreadsheet->getSheetCount() - 2;
    $sheetEmpleados = $spreadsheet->getSheet($index);
    $index = $spreadsheet->getSheetCount() - 1;
    $sheetArea = $spreadsheet->getSheet($index);

    $dataEmpleados = $sheetEmpleados->toArray();
    $dataReg = $sheetReg->toArray();
    $dataArea= $sheetArea->toArray();

    echo "<pre>" ;
    print_r($dataReg);
    echo "</pre>" ;
    echo "<pre>" ;
    print_r($dataEmpleados);
    echo "</pre>" ;
    echo "<pre>" ;
    print_r($dataArea);
    echo "</pre>" ;


    $arc = array('fec'=>[],"tic"=>[],"ev"=>[],"ag"=>[],"emp"=>[],"evar"=>[]);
    $vacio = 0;
    $row = 4;
    die ;
    do{
        $excelTimestamp = $sheet->getCell('B'. $row)->getValue();
        $objetoDateTime = Date::excelToDateTimeObject($excelTimestamp);
        $arc["fec"][] = $objetoDateTime->format('Y-m-d');
        $arc["tic"][] = $sheet->getCell('C' . $row)->getValue(); //obtengo y guardo el valor de la celda
        $arc["ev"][] = $sheet->getCell('D' . $row)->getValue();
        $arc["ag"][] = $sheet->getCell('E' . $row)->getValue();
        
        if($row>=8 && $row<=27){
            $arc["emp"][] = $sheet->getCell('M' . $row)->getValue();
            if($row<=14){
                $arc["evar"][] = $sheet->getCell('O' . $row)->getValue(); 
            };
        };
        $lastIndex = count($arc["tic"]) - 1;
        if($arc["tic"][$lastIndex]==NULL){
            $vacio++;
            echo "registro vacio<br>";
        }else{
            $vacio=0;
        }
        $row++;

        echo "Vuelta del do while: ".count($arc["tic"])."<br>";
    }while($vacio<2&& count($arc["fec"]) < 600);
    
    echo_registros($arc,0,0);


    // for ($row = 4; $row <= 46; $row++) {
    //     $excelTimestamp = $sheet->getCell('B'. $row)->getValue();
    //     $objetoDateTime = Date::excelToDateTimeObject($excelTimestamp);
    //     $arc["fec"][] = $objetoDateTime->format('Y-m-d');
    //     $arc["tic"][] = $sheet->getCell('C' . $row)->getValue(); 
    //     $arc["ev"][] = $sheet->getCell('E' . $row)->getValue();
    //     $arc["ag"][] = $sheet->getCell('E' . $row)->getValue();
        
    //     if($row>=8 && $row<=27){
    //         $arc["emp"][] = $sheet->getCell('M' . $row)->getValue();
    //         if($row<=14){
    //             $arc["evar"][] = $sheet->getCell('O' . $row)->getValue(); 
    //         };
    //     };
    // };
    // echo_registros($arc,$fIni,$fFin);
    // echo_area($arc);

    if (v_registro($arc["ag"], $arc["emp"])){
        if(v_ticket($arc["tic"])){
            if(v_registro($arc["ev"], $arc["evar"])){
                $arrErr = err_ag($arc, $fIni, $fFin);
                $evals = eval_arch($arc, $fIni, $fFin);
            };
        };
    };

    // echo_erroresXag($arrErr);
    // echo_evaluaciones($evals);


    // Guardar el array en la sesión
    // $_SESSION['errs'] = $arrErr;
    // $_SESSION['evs'] = $evals;
    // // Redirigir a archivoexcdesc.php
    // header("Location: archivoexcdesc.php");
    // exit();
}else {
    echo "no encontre el archivo guardado" ;
    exit();
};
?>