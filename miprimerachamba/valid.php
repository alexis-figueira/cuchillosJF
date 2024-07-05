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

function v_evTicket ($eval){
    $contEval = array('BIEN CARGADO' => '0','DATOS INCORRECTOS' => '0','DUPLICADO' => '0','FALTA INFORMACION' => '0','INFORMACION INCORRECTA' => '0','MAL CARGADO' => '0','MAL ENVIADO' => '0');
    foreach($eval as $ev){
        if(array_key_exists($ev, $contEval)){
            return 0;
        }
    }
    return 1 ; // 0 hay dato incorrecto, 1 ok
}

function li_ev($eval){
    $contEval2 = array('BIEN CARGADO' => '0','DATOS INCORRECTOS' => '0','DUPLICADO' => '0','FALTA INFORMACION' => '0','INFORMACION INCORRECTA' => '0','MAL CARGADO' => '0','MAL ENVIADO' => '0');
    foreach($eval as $ev){
        if(array_key_exists($ev, $contEval2)){
            $contEval2[$ev]++;
        }
    }

    echo '<pre>';
        print_r($contEval2);
    echo '</pre>';die;
    
};



?>



<!-- 	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT &&  $DB);
	$BAJAS = array_diff($DB, $CURRENT); 
    -->