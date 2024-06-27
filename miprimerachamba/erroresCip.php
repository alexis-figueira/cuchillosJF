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

function li_ev($eval){
    $cont = array_fill(0,7,0);
    $tEv = ["BIEN CARGADO", "DATOS INCORRECTOS", "DUPLICADO", "FALTA INFORMACION", "INFORMACION INCORRECTA", "MAL CARGADO", "MAL ENVIADO"];
    foreach($eval as $ev){
        if($ev == "BIEN CARGADO"){
            $cont[0]++;
            // echo $cont[0]." TICKETS ".$tEv[0]."<br>"; 
            continue; 
        }else if($ev == "DATOS INCORRECTOS"){
            $cont[1]++;
            // echo $cont[1]." TICKETS ".$tEv[1]."<br>"; 
            continue; 

        }else if($ev == "DUPLICADO"){
            $cont[2]++;
            // echo $cont[2]." TICKETS ".$tEv[2]."<br>"; 
            continue; 

        }else if($ev == "FALTA INFORMACION"){
            $cont[3]++;
            // echo $cont[3]." TICKETS ".$tEv[3]."<br>"; 
            continue; 

        }else if($ev == "INFORMACION INCORRECTA"){
            $cont[4]++;
            // echo $cont[4]." TICKETS ".$tEv[4]."<br>"; 
            continue; 

        }else if($ev == "MAL CARGADO"){
            $cont[5]++;
            // echo $cont[5]." TICKETS ".$tEv[5]."<br>"; 
            continue; 

        }else if($ev == "MAL ENVIADO"){
            $cont[6]++;
            // echo $cont[6]." TICKETS ".$tEv[6]."<br>"; 
            continue; 
        };
    };
    $x=0;
    foreach($tEv as $eva){
        echo $eva.": ".$cont[$x]."<br>";
        $x++;
    }
};





// $pila = array("naranja", "plátano");
// array_push($pila, "manzana", "arándano");
// print_r($pila);





?>