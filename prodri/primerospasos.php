<?php
require("bdtconnect");


$input = $_POST ;
unset($_POST);
/*echo '<pre>';
print_r($input);
echo '</pre>';
*/
/*if(array_key_exists('nombre',$input) && $input['nombre'] != null && $input['nombre'] != ''){
	echo ($input['nombre']);
}else {
	echo("No completaste el nombre mi rey");
}

if(array_key_exists('jerarquia',$input) && $input['jerarquia'] != null && $input['jerarquia'] != ''){
	echo ($input['jerarquia']);
}else {
	echo("No completaste el nombre mi rey");
}
*/


$Que = querySelect('SELECT * FROM `org__sectores` WHERE 1');
while ($row = $Que->fetch(PDO::FETCH_ASSOC)){
	/*echo '<pre>';
	print_r ($row);
	echo '</pre>';*/
	echo ("Sector: ".$row['nombre']." es una ".$row['jerarquia']."<br><br>");
}

?>