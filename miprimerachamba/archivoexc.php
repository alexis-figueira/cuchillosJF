<?php
include("funciones.php"); 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Shared\Date;

$fIni = explode ("-", $_POST['fIni'], 3); //año mes dia
$fFin = explode ("-", $_POST['fFin'], 3); //año mes dia

session_start();

if(!file_exists("archivos")){ //si no existe..
    if(!mkdir("archivos",0777)){ /// si no lo crea
        echo "error al crear el directorio";
        exit();
    }
}
chmod("archivos",0777); //permisos del fichero
//movemos el archivo de un lugar a otro
if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
    // echo "se guardo bien en archivos";
}else{
    echo "error al guardar el archivo";
    exit();
};

// Verificar si el archivo ha sido subido correctamente

if(file_exists("archivos/".$_FILES['fichero']['name'])){
    // echo "encontre el archivo recien guardado";
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
        $arc["tic"][] = $sheet->getCell('D' . $row)->getValue();
        $arc["ev"][] = $sheet->getCell('E' . $row)->getValue();
        $arc["ag"][] = $sheet->getCell('F' . $row)->getValue();
        $excelTimestamp = $sheet->getCell('C' . $row)->getValue(); 
        $objetoDateTime = Date::excelToDateTimeObject($excelTimestamp);
        $arc["fec"][] = explode ("-", $objetoDateTime->format('Y-m-d'), 3);;

        if($row>=8 && $row<=27){
            $arc["emp"][] = $sheet->getCell('N' . $row)->getValue();
            if($row<=14){
                $arc["evar"][] = $sheet->getCell('P' . $row)->getValue(); 
            };
        };
    };
    // echo "fecha archivo:<br>";
    // print_r($arc["fec"]);
    // echo "<br>";
    // echo "fecha form inicial:<br>";
    // print_r($fIni);
    // echo "<br>";
    // echo "fecha form final:<br>";
    // print_r($fFin);


    // $excelTimestamp = $arc["fec"][0]; //valor recogido de la celda del archivo excel
    // $objetoDateTime = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelTimestamp);
    // echo $objetoDateTime->format('Y-m-d');
    // echo "<br>";

    if (v_registro($arc["ag"], $arc["emp"])){
        echo "Agentes validos<br>";
        if(v_ticket($arc["tic"])){
            echo "Tickes validos<br>";
            if(v_registro($arc["ev"], $arc["evar"])){
                echo "Evaluaciones validas<br>";
                $arrErr = err_ag($arc, $fIni, $fFin);
                $evals = eval_arch($arc["ev"],$arc["evar"]);
            };
        };
    };
    // Guardar el array en la sesión
    $_SESSION['errs'] = $arrErr;
    $_SESSION['evs'] = $evals;
    // Redirigir a archivoexcdesc.php
    header("Location: archivoexcdesc.php");
    exit();
}else {
    echo "no encontre el archivo guardado" ;
    exit();
};
?>