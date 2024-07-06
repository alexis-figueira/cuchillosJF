<?php
 session_start();

 // Definir el array en index.php
 $miArray = array('af', 'datoasd2', 'datosadsa3');
 
 // Guardar el array en la sesión
 $_SESSION['miArray'] = $miArray;
 
 // Redirigir a direccion.php
 header("Location: pruebas.php");
 exit;
?>