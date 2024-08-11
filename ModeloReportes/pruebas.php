<?php
    include("funciones.php"); 
    require 'vendor/autoload.php';
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Shared\Date;
    
    $fIni = $_POST['fIni']; //año mes dia
    $fFin = $_POST['fFin']; //año mes dia

    echo "fecha inicial form: ";
    print_r($fIni);
    echo "<br>";
    echo "fecha final form: ";
    print_r($fFin);
    echo "<br><br>";

    if(!file_exists("archivos")){ //si no existe..
        if(!mkdir("archivos",0777)){ /// si no lo crea
            echo "error al crear el directorio";
            exit();
        }
    };
    chmod("archivos",0777); //permisos del fichero
    //movemos el archivo de un lugar a otro
    if(move_uploaded_file($_FILES['fichero']['tmp_name'],"archivos/".$_FILES['fichero']['name'])){
        // echo "se guardo bien en archivos";
    }else{
        echo "error al guardar el archivo";
        exit();
    };

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
    
    // Guardo valores de las celdas
    for ($row = 7; $row <= 46; $row++) {
        $excelTimestamp = $sheet->getCell('C' . $row)->getValue();
        $objetoDateTime = Date::excelToDateTimeObject($excelTimestamp);
        $arc["fec"][] = $objetoDateTime->format('Y-m-d');
        $arc["tic"][] = $sheet->getCell('D' . $row)->getValue();
        $arc["ev"][] = $sheet->getCell('E' . $row)->getValue();
        $arc["ag"][] = $sheet->getCell('F' . $row)->getValue();
        
        if($row>=8 && $row<=27){
            $arc["emp"][] = $sheet->getCell('N' . $row)->getValue();
            if($row<=14){
                $arc["evar"][] = $sheet->getCell('P' . $row)->getValue(); 
            };
        };
    };

}else {
    echo "no encontre el archivo guardado" ;
    exit();
};

/// funcion para dia y fecha  segun gpt
/// ya pase a arrays pero esta funcion lo hace con strings. (tengo que vovler atras la conversion del array para enviarlo como strings cada fecha)

// Función para convertir array a string de fecha
// function arrayToDateString($dateArray) {
//     return sprintf('%04d-%02d-%02d', $dateArray[0], $dateArray[1], $dateArray[2]);
// }
// // Función personalizada para validar la fecha
// function isDateInRange($fReg, $fIn, $fFn) {
//     // Convertir arrays a strings de fecha
//     $dateReg = arrayToDateString($fReg);
//     $dateIn = arrayToDateString($fIn);
//     $dateFn = arrayToDateString($fFn);

//     // Convertir strings a objetos DateTime
//     $dateReg = new DateTime($dateReg);
//     $dateIn = new DateTime($dateIn);
//     $dateFn = new DateTime($dateFn);

//     // Comparar fechas
//     return $dateReg >= $dateIn && $dateReg <= $dateFn;
// }

// // Fechas de ejemplo
// $fReg = [2023, 7, 15]; // Fecha a validar
// $fIn = [2023, 7, 1];   // Fecha inicial permitida
// $fFn = [2023, 7, 31];  // Fecha final permitida

// // Verificar si la fecha está en el rango
// if (isDateInRange($fReg, $fIn, $fFn)) {
//     echo "La fecha está dentro del rango.";
// } else {
//     echo "La fecha no está dentro del rango.";
// }

// Explicación del código:
// arrayToDateString: Esta función convierte un array con año, mes y día en una cadena de texto en formato YYYY-MM-DD.

// isDateInRange: Esta función personalizada toma las tres fechas como parámetros, las convierte a objetos DateTime, y luego compara si la fecha de registro ($fReg) está dentro del rango definido por la fecha inicial ($fIn) y la fecha final ($fFn).

// Uso de la función: Se definen tres arrays que representan las fechas, y se llama a la función isDateInRange para verificar si la fecha de registro está en el rango especificado. Finalmente, se imprime un mensaje indicando si la fecha está dentro del rango o no.

// Si necesitas más ayuda o tienes alguna otra pregunta, no dudes en decírmelo.

    // $excelTimestamp = $arc["fec"][0]; //valor recogido de la celda del archivo excel
    // $objetoDateTime = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($excelTimestamp);
    // echo $objetoDateTime->format('Y-m-d');
    // echo "<br>";

?>