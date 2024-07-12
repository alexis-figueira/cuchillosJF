<?php
function echo_registros($archivo,$fIni, $fFin){
    if($fIni==0){
        for($i=0; $i<count($archivo["fec"]);$i++){
            echo "Reg: ".($i+1)." / ".$archivo["fec"][$i]." / ".$archivo["tic"][$i]." / ".$archivo["ev"][$i]." / ".$archivo["ag"][$i]."<br>";
        };
    }else{
        for($i=0; $i<count($archivo["fec"]);$i++){
            if (val_fecha($archivo["fec"][$i], $fIni, $fFin)){
                echo "Reg: ".($i+1)." / ".$archivo["fec"][$i]." / ".$archivo["tic"][$i]." / ".$archivo["ev"][$i]." / ".$archivo["ag"][$i]."<br>";
            };
        };
    };
    echo count($archivo["fec"])." registros.<br>";
};

function echo_area($archivo){
    echo "Agentes: ";
    for($i=0; $i<count($archivo["emp"]);$i++){
        echo $archivo["emp"][$i]." / " ;
    };
    echo "<br>Hay ".count($archivo["emp"])." agentes";
    echo "<br>Evs posibles: ";
    for($i=0; $i<count($archivo["evar"]);$i++){
        echo $archivo["evar"][$i]." / " ;
    };
    echo "<br>Hay ".count($archivo["evar"])." evaluaciones";
}

function echo_erroresXag($arr){
    for($i=0 ; $i<count($arr["ags"]); $i++){
        echo $arr["ags"][$i].": ".$arr["err"][$i]."<br>";
    }
    echo "total: ".$arr["tot"]."<br><br>";
}

function echo_evaluaciones($arr){
    foreach($arr as $clave => $valor){
        echo $clave." ".$valor."<br>";
    }
    echo "<br>";
}

function echo_fecha_busqueda($fIni, $fFin){
    echo "Fecha inicial: ".$fIni."<br>";
    echo "Fecha final: ".$fFin."<br>";
}


// if(!in_array($VALUE[4],$empleado)){$regMalCargado[]=$VALUE[1]; unset($registros[$KEY]); continue;};
// if(!in_array($VALUE[3],$errores)){$regMalCargado[]=$VALUE[1]; unset($registros[$KEY]);continue;};


// $array = array('manzana', 'banana', 'naranja', 'pera');
// $valor_a_buscar = 'naranja';

// $indice = array_search($valor_a_buscar, $array);

// if ($indice !== false) {
//     echo "El valor '$valor_a_buscar' se encuentra en el índice $indice.";
// } else {
//     echo "El valor '$valor_a_buscar' no se encuentra en el array.";
// }


?>