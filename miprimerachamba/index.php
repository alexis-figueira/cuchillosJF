<?php 
// Archivos
include("valid.php");
include("erroresCip.php");


// registro de datos----------------------------------

$fecTicket = ["3/5/2024", "3/5/2024", "3/5/2024", "3/5/2024", "6/5/2024", "6/5/2024", "6/5/2024", "6/5/2024", "7/5/2024", "7/5/2024", "7/5/2024", "7/5/2024", "7/5/2024", "8/5/2024", "10/5/2024", "10/5/2024", "13/5/2024", "10/5/2024", "13/5/2024", "14/5/2024", "15/5/2024", "15/5/2024", "15/5/2024", "17/5/2024", "17/5/2024", "20/5/2024", "20/5/2024", "20/5/2024", "20/5/2024", "20/5/2024", "21/5/2024", "21/5/2024", "20/5/2024", "21/5/2024", "21/5/2024", "21/5/2024", "22/5/2024", "23/5/2024", "23/5/2024", "23/5/2024"];
//f del ticket 

$ticket = [418790, 418794, 419391, 419386, 419459, 419649, 419638, 417800, 420593, 420750, 420739, 420795, 420877, 420950, 422007, 421878, 422384, 422061, 422606, 422354, 423523, 423561, 422880, 425432, 424609, 425954, 425792, 425824, 426083, 426082, 425934, 426705, 426131, 426815, 426813, 426905, 427543, 427625, 428056, 428088];
//nro de ticket

$evTicket = ["DUPLICADO", "MAL CARGADO", "DUPLICADO", "DUPLICADO", "BIEN CARGADO", "FALTA INFORMACION", "MAL ENVIADO", "BIEN CARGADO", "DUPLICADO", "MAL CARGADO", "BIEN CARGADO", "DUPLICADO", "MAL CARGADO", "BIEN CARGADO", "DUPLICADO", "FALTA INFORMACION", "MAL ENVIADO", "DUPLICADO", "BIEN CARGADO", "BIEN CARGADO", "MAL ENVIADO", "MAL ENVIADO", "MAL CARGADO", "DUPLICADO", "DUPLICADO", "BIEN CARGADO", "MAL ENVIADO", "BIEN CARGADO", "DUPLICADO", "DUPLICADO", "BIEN CARGADO", "FALTA INFORMACION", "MAL ENVIADO", "DUPLICADO", "BIEN CARGADO", "MAL ENVIADO", "BIEN CARGADO", "MAL ENVIADO", "BIEN CARGADO", "FALTA INFORMACION"];
//evaluacion del ticket

$agente = ["MIEDAN EVELYN", "HRABAR IVAN", "MORAL CAMILA", "MORAL CAMILA", "HRABAR IVAN", "SCRAVAGLIERI DANTE", "MIEDAN EVELYN", "MANTEROLA LUCIA", "HRABAR IVAN", "LOVEY DENISE", "MORAL CAMILA", "IBAÑEZ JOHANNA", "LOVEY DENISE", "SCRAVAGLIERI DANTE", "LOVEY DENISE", "MASTROGIACOMO ARIANA", "LUNA VERONICA", "LOVEY DENISE", "LOVEY DENISE", "MANTEROLA LUCIA", "MORAL CAMILA", "MORAL CAMILA", "MORAL CAMILA", "MORAL CAMILA", "LUNA VERONICA", "SCRAVAGLIERI DANTE", "SCRAVAGLIERI DANTE", "SCRAVAGLIERI DANTE", "MORAL CAMILA", "MORAL CAMILA", "HRABAR IVAN", "IBAÑEZ JOHANNA", "LUNA VERONICA", "GUTIERREZ LAUTARO", "SANCHEZ MARINA", "LOVEY DENISE", "LOVEY DENISE", "MORA CRISTIAN", "LUNA VERONICA", "CAÑERO SOFIA"];
//agentes de la planilla de carga

$agRegistrados = ["BARRETTO JULIETA", "BEGER TOMAS", "CALAFELL SASHA", "CAÑERO SOFIA", "CORLETO TOMAS", "FONTAN LARA", "GUTIERREZ LAUTARO", "HRABAR IVAN", "IBAÑEZ JOHANNA", "LOVEY DENISE", "LUNA VERONICA", "MANTEROLA LUCIA", "MASTROGIACOMO ARIANA", "MIEDAN EVELYN", "MORA CRISTIAN", "MORAL CAMILA", "SANCHEZ MARINA", "SCRAVAGLIERI DANTE", "TICONA VICTORIA", "URBANEJA WALTER"];
    //$agRegistrados en el sector 


//muestro lista por pantalla -------------------------
// for($i=0;$i<count($agente);$i++){
//     echo ($i+1).")--- ".$fecTicket[$i]." / ".$ticket[$i]." / ".$evTicket[$i]." / ".$agente[$i]."<br>";
// };
// echo "<br><br><br>";

// //Validaciones ---------------------------------------
// $dev = v_agente($agente,$agRegistrados);
// echo "validacion de agentes: ".$dev."<br>" ;
// $dev = v_ticket($ticket);
// echo "validacion de ticket: ".$dev."<br>" ;
// $dev = v_evTicket($evTicket);
// echo "validacion de evaluacion: ".$dev."<br>" ;
// echo "<br><br><br>";



// echo "la longitud de registros es: ".count($agente)."<br>"."<br>"."<br>"."<br>" ;

// err_ag($agente, $agRegistrados, $evTicket, $ticket);


li_ev($evTicket);

?>













