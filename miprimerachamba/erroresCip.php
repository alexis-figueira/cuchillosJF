<?php
function err_ag($ag, $agReg, $eval, $tick){
    $totErr = 0 ;
    $errores = [];
    for ($i=0; $i<count($agReg) ; $i++){
        $cont = 0;
        for($j=0 ; $j<count($ag) ; $j++){
            if($ag[$j] == $agReg[$i] && $eval[$j] != "BIEN CARGADO"){
                $cont++;
                $totErr++;
                echo "ERROR: ".$tick[$j]." / ".$eval[$j]." / ".$ag[$j]."<br>";
            };
        };
        array_push($errores, $cont);
    };

    echo "<br><br><br>";

    for ($i=0; $i<count($agReg) ; $i++){
        echo "el agente ".$agReg[$i]." tuvo ".$errores[$i]." error/es.<br>" ;
    }
    echo "Total de errores: ".$totErr;
}







// $pila = array("naranja", "plátano");
// array_push($pila, "manzana", "arándano");
// print_r($pila);





?>