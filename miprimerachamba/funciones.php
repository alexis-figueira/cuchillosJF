<?php
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
};//false registro incorrecto, true esta validado

function v_ticket ($ticket){
    foreach($ticket as $num){
        if(is_string($num)){
            return false;
        }
    };
    return true; 
};//valida los ticket cargados --> false error, true validado

function err_ag($archivo){ //$agReg, $agArea, $eval, $tick
    $arr = array('ags'=>[],"err"=>[], "tot" => 0);
    for ($i=0; $i<count($archivo["emp"]) ; $i++){
        $cont = 0;
        for($j=0 ; $j<count($archivo["ag"]) ; $j++){
            if($archivo["ag"][$j] == $archivo["emp"][$i] && $archivo["ev"][$j] != "BIEN CARGADO"){
                $cont++;
                $arr["tot"]++;
                // echo "ERROR: ".$archivo["tic"][$j]." / ".$archivo["ev"][$j]." / ".$archivo["ag"][$j]."<br>";
            };
        };
        $arr["ags"][] = $archivo["emp"][$i];
        $arr["err"][] = $cont;
    };
    for ($i=0; $i<count($arr["ags"]) ; $i++){
        // echo "el agente ".$arr["ags"][$i]." tuvo ".$arr["err"][$i]." error/es.<br>" ;
    }
    // echo "<br>Total de errores del área: ".$totErr;
    return $arr;
};// devuelve array de agente y errores

function eval_arch($evRegistro, $evArea){
    $dev = array('BIEN CARGADO' => 0,'DATOS INCORRECTOS' => 0,'DUPLICADO' => 0,'FALTA INFORMACION' => 0,'INFORMACION INCORRECTA' => 0,'MAL CARGADO' => 0,'MAL ENVIADO' => 0, 'TOTAL' => 0);
    foreach($evArea as $val){
        foreach($evRegistro as $valor){
            if($val == $valor){
                $dev[$val]++;
                $dev['TOTAL']++;
            }
        }
    }
    return $dev;
}

?>
<!-- 	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT &&  $DB);
	$BAJAS = array_diff($DB, $CURRENT); 
    -->