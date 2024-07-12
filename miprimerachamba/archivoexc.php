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
    $registros = $sheetReg->toArray();
    $index = $spreadsheet->getSheetCount() - 1;
    $sheetArea = $spreadsheet->getSheet($index);
    $area= $sheetArea->toArray();

    $empleados = array();
    $errores = array();
    foreach($area as $valor){
        $empleados[] = $valor[0] ;
        if($valor[1]==null){continue;};
        $errores[] = $valor[1];
    };
    
    $array = array('manzana', 'banana', 'naranja', 'pera');
    $valor_a_buscar = 'MIEDAN EVELYN';

    $indice = array_search($valor_a_buscar, $empleados);

    if ($indice !== false) {
        echo "El valor '$valor_a_buscar' se encuentra en el índice $indice.";
    } else {
        echo "El valor '$valor_a_buscar' no se encuentra en el array.";
    }

    die;



    $regMalCargado = array();
    foreach(array_slice($registros,2) as $KEY => $VALUE){
        $objetoDateTime = Date::excelToDateTimeObject($VALUE[1]);
        $registros[$KEY][1] = $objetoDateTime->format('Y-m-d');
        if(new DateTime($registros[$KEY][1]) <= new DateTime($fIni)){unset($registros[$KEY]);continue;}
        if(new DateTime($registros[$KEY][1]) >= new DateTime($fFin)){unset($registros[$KEY]);continue;}
        if(!in_array($VALUE[4],$empleado)){$regMalCargado[]=$VALUE[1]; unset($registros[$KEY]); continue;};
        if(!in_array($VALUE[3],$errores)){$regMalCargado[]=$VALUE[1]; unset($registros[$KEY]);continue;};

        

        if (v_registro($arc["ag"], $arc["emp"])){
            if(v_ticket($arc["tic"])){
                if(v_registro($arc["ev"], $arc["evar"])){
                    $arrErr = err_ag($arc, $fIni, $fFin);
                    $evals = eval_arch($arc, $fIni, $fFin);
                };
            };
        };
    };

    


    die ;


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