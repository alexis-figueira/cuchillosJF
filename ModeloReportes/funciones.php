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
        if(is_numeric($num)){
            return true;
        }
    };
    return false; 
};//valida los ticket cargados --> false error, true validado

function err_ag($archivo, $fIni, $fFin){ 
    $dev = array('ags'=>[],"err"=>[], "tot" => 0);    

    for ($i=0; $i<count($archivo["emp"]) ; $i++){
        $cont = 0;
            for($j=0 ; $j<count($archivo["ag"]) ; $j++){
                if (val_fecha($archivo["fec"][$j], $fIni, $fFin)){
                    if($archivo["ag"][$j] == $archivo["emp"][$i] && $archivo["ev"][$j] != "BIEN CARGADO"){
                        $cont++;
                        $dev["tot"]++;
                        // echo "ERROR: ".$archivo["tic"][$j]." / ".$archivo["ev"][$j]." / ".$archivo["ag"][$j]."<br>";
                    };
                };
            };
        $dev["ags"][] = $archivo["emp"][$i];
        $dev["err"][] = $cont;
    };
    // for ($i=0; $i<count($dev["ags"]) ; $i++){
        // echo "el agente ".$dev["ags"][$i]." tuvo ".$dev["err"][$i]." error/es.<br>" ;
    // }
    // echo "<br>Total de errores del área: ".$totErr;
    return $dev;
};// devuelve array de agente y errores

function eval_arch($archivo, $fIn, $fFn){
    $dev = array('BIEN CARGADO' => 0,'DATOS INCORRECTOS' => 0,'DUPLICADO' => 0,'FALTA INFORMACION' => 0,'INFORMACION INCORRECTA' => 0,'MAL CARGADO' => 0,'MAL ENVIADO' => 0, 'TOTAL' => 0);
    for($i=0; $i<count($archivo["ev"]);$i++){
        if (val_fecha($archivo["fec"][$i], $fIn, $fFn)){
            if(array_key_exists($archivo["ev"][$i],$dev)){
                $dev[$archivo["ev"][$i]]++;
                $dev["TOTAL"]++;
            };
        };
        //echo "Fecha: ".$archivo["fec"][$i]." / evaluacion: ".$archivo["ev"][$i]." / total: ".$dev["TOTAL"]."<br>";
    }; 
    return $dev;
} // devuelve array clave => valor contador de evaluaciones

function val_fecha($fReg, $fIn, $fFn){
    $fReg = new DateTime($fReg);
    $fIn = new DateTime($fIn);
    $fFn = new DateTime($fFn);
    return $fReg>= $fIn && $fReg <= $fFn;
}; //true esta dentro del rango, false no esta dentro del rango
?>
<!-- 	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT &&  $DB);
	$BAJAS = array_diff($DB, $CURRENT); 
    -->