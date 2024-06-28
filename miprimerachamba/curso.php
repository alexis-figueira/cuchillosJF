<?php
$pdo = new PDO("mysql:host=localhost;dbname=cuchillos_jf","root","");

$pdo->query("INSERT INTO `productos`(`nombre`, `tipo_id`, `descripcion`, `img`, `estado`) VALUES ('Pro agregad','id del tipo','su descripcion','lnk imagen','1')");

?>