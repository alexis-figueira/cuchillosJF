<?php
function v_agente ($agente, $agRegistrados){ 
    
    $err = 0 ;
    foreach($agente as $nombre){
        $esta = 0;
        foreach($agRegistrados as $nombreR){
            if($nombre == $nombreR){
                $esta = 1 ;
            };
        };
        if($esta == 0){
            $err ++ ;
            return $err;
        };
    };
    return $err ; // 0 hay un agente incorrecto, 1 ok
};
function v_ticket ($ticket){
    foreach($ticket as $num){
        if(is_string($num)){
            return 0;
        }
    };
    return 1; // 0 hay dato incorrecto, 1 ok
};
function v_evTicket ($evaluacion){
    foreach($evaluacion as $ev){
        if($ev != "BIEN CARGADO" && $ev != "DATOS INCORRECTOS" && $ev != "DUPLICADO" && $ev != "FALTA INFORMACION" && $ev != "INFORMACION INCORRECTA" && $ev != "MAL CARGADO" && $ev != "MAL ENVIADO"){
            return 0;
        }
    }
    return 1 ; // 0 hay dato incorrecto, 1 ok
}





?>



<!-- 	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT &&  $DB);
	$BAJAS = array_diff($DB, $CURRENT); 
    -->