<?php
// require 'vendor/autoload.php';
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


function v_registro ($regArch, $regArea){ 
    $validado = false ;
    foreach($regArch as $nombre){
        $esta = false;
        foreach($regArea as $nombreAr){
            if(strtoupper(trim($nombre)) == strtoupper(trim($nombreAr))){
                $esta = true ;
            };
        };
        if(!$esta){
            unset($regArch);
            unset($regArea);
            return $validado;
        };
    };
    unset($regArch);
    unset($regArea);
    $validado = true ;
    return $validado ; 
}; //
//false agente incorrecto, true esta validado

function v_ticket ($ticket){
    foreach($ticket as $num){
        if(is_string($num)){
            return false;
        }
    };
    return true; 
}; //valida los ticket cargados --> false error, true validado

function err_ag($archivo){ //$agReg, $agArea, $eval, $tick
    $totErr = 0 ;
    $arr = array('ags'=>[],"err"=>[]);
    for ($i=0; $i<count($archivo["emp"]) ; $i++){
        $cont = 0;
        for($j=0 ; $j<count($archivo["ag"]) ; $j++){
            if($archivo["ag"][$j] == $archivo["emp"][$i] && $archivo["ev"][$j] != "BIEN CARGADO"){
                $cont++;
                $totErr++;
                echo "ERROR: ".$archivo["tic"][$j]." / ".$archivo["ev"][$j]." / ".$archivo["ag"][$j]."<br>";
            };
        };
        $arr["ags"][] = $archivo["emp"][$i];
        $arr["err"][] = $cont;
    };

    echo "<br><br><br>";

    for ($i=0; $i<count($arr["ags"]) ; $i++){
        echo "el agente ".$arr["ags"][$i]." tuvo ".$arr["err"][$i]." error/es.<br>" ;
    }
    echo "<br>Total de errores del área: ".$totErr;
    return $arr;
} // devuelve array de agente y errores

?>
<!-- 	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT &&  $DB);
	$BAJAS = array_diff($DB, $CURRENT); 
    -->