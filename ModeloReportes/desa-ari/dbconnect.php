<?php
$DBT = array(
	"FILES"						=>	$ZXS['L'].".`sys__files`",
	"USERS"						=>	$ZXS['L'].".`sys__users`",
	"USERS_FIRMA"				=>	$ZXS['L'].".`sys__users_firmas`",
	"USERS_LOGS"				=>	$ZXS['L'].".`sys__users_logs`",
	"USERS_PERMISOS"			=>	$ZXS['L'].".`sys__users_permisos`",
	
	"VIANDAS_EMPLEADOS"			=>	$ZXS['V'].".`viandas__empleados`",
	"VIANDAS_MENU"				=>	$ZXS['V'].".`viandas__menu`",
	"VIANDAS_PEDIDOS"			=>	$ZXS['V'].".`viandas__pedidos`",
	"VIANDAS_RESUMEN"			=>	$ZXS['V'].".`viandas__resumen`",
	"VIANDAS_RESUMEN_SUB"		=>	$ZXS['V'].".`viandas__resumen_subtotales`",
	"VIANDAS_TIPOS"				=>	$ZXS['V'].".`viandas__tipo`",	
	"VIANDAS_VISTA"				=>	$ZXS['V'].".`v_viandas__pedidos`",
	
	"ALFABETA_ACCION"			=>	$ZXS['M'].".`alfabeta__accion`",
	"ALFABETA_FORMAS"			=>	$ZXS['M'].".`alfabeta__formas`",
	"ALFABETA_LABORATORIOS"		=>	$ZXS['M'].".`alfabeta__laboratorios`",
	"ALFABETA_MONODRO"			=>	$ZXS['M'].".`alfabeta__monodro`",	
	"ALFABETA_PRECIOS"			=>	$ZXS['M'].".`alfabeta__precios`",
	"ALFABETA_PROCESOS"			=>	$ZXS['M'].".`alfabeta__procesos`",
	"ALFABETA_SIZE"				=>	$ZXS['M'].".`alfabeta__size`",
	"ALFABETA_TOQUELES"			=>	$ZXS['M'].".`alfabeta__troqueles`",
	"ALFABETA_UPOTENCI"			=>	$ZXS['M'].".`alfabeta__upotenci`",
	"ALFABETA_VIAS"				=>	$ZXS['M'].".`alfabeta__vias`",
	
	"FTDAS_GENERAL"				=>	$ZXS['M'].".`ftdas__general`",
	"FTDAS_MAYORES"				=>	$ZXS['M'].".`ftdas__mayores`",
	
	"V_ALFABETA_TOQUELES"		=>	$ZXS['M'].".`v_alfabeta_troqueles`",
	"V_FTDAS_GENERAL"			=>	$ZXS['M'].".`v_ftdas__general`",
	"V_FTDAS_MAYORES"			=>	$ZXS['M'].".`v_ftdas__mayores`",
	
	"PADRON_SYNC"				=>	$ZXS['P'].".`padron__sync`",
);

try{
	$GLOBALS['QWE'] = new PDO("mysql:host=" . $ZXSD['HOST'] . ";charset=utf8mb4", $ZXSD['USER'], $ZXSD['PASS'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}catch(PDOException $e){
	echo "Sitio en mantenimiento.";exit;
}

function QueryDelete($QUERY, $CON = 'QWE'){
	$folder = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL'].date("Y-m")."/";
	if(!file_exists($folder)){mkdir($folder);}
	if(!array_key_exists('NAME',$GLOBALS['C_USER'])){$GLOBALS['C_USER']['NAME'] = '';}
	$file = array_column(debug_backtrace(),'file')[0];
	$function = array_column(debug_backtrace(),'function')[0];
	$args = array_column(debug_backtrace(),'args')[0][0];

	$Escribir = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".$function." -> ".$args.PHP_EOL;
	file_put_contents($folder."/".basename($file).".txt", $Escribir, FILE_APPEND);
	
	$QUERY = str_ireplace(array('Drop','Insert','Select','Show','Truncate','Union','Update',';'),"",$QUERY);
	try{
		return $QUERY = $GLOBALS[$CON]->Query($QUERY);
	}catch(PDOException $e){
		$folder_error = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL']."/";
		$Escribir_error = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".basename($file)." -> ".$function." -> ".$args." -> ".$e->getMessage().PHP_EOL;
		file_put_contents($folder."/Errores.txt", $Escribir_error, FILE_APPEND);
		echo "No se pudo ejecutar la consulta";exit;
	}	
}
function QueryInsert($QUERY, $CON = 'QWE'){
	$folder = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL'].date("Y-m")."/";
	if(!file_exists($folder)){mkdir($folder);}
	if(!array_key_exists('NAME',$GLOBALS['C_USER'])){$GLOBALS['C_USER']['NAME'] = '';}
	$file = array_column(debug_backtrace(),'file')[0];
	$function = array_column(debug_backtrace(),'function')[0];
	$args = array_column(debug_backtrace(),'args')[0][0];

	$Escribir = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".$function." -> ".$args.PHP_EOL;
	file_put_contents($folder."/".basename($file).".txt", $Escribir, FILE_APPEND);

	$QUERY = str_ireplace(array('Delete','Drop','Select','Show ','Truncate','Union','Update',';'),"",$QUERY);
	try{
		return $QUERY = $GLOBALS[$CON]->Query($QUERY);
	}catch(PDOException $e){
		$folder_error = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL']."/";
		$Escribir_error = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".basename($file)." -> ".$function." -> ".$args." -> ".$e->getMessage().PHP_EOL;
		file_put_contents($folder."/Errores.txt", $Escribir_error, FILE_APPEND);
		echo "No se pudo ejecutar la consulta";exit;
	}	
}
function QuerySelect($QUERY, $CON = 'QWE'){
	$folder = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL'].date("Y-m")."/";
	if(!file_exists($folder)){mkdir($folder);}
	if(!array_key_exists('NAME',$GLOBALS['C_USER'])){$GLOBALS['C_USER']['NAME'] = '';}
	$file = array_column(debug_backtrace(),'file')[0];
	$function = array_column(debug_backtrace(),'function')[0];
	$args = array_column(debug_backtrace(),'args')[0][0];

	$Escribir = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".$function." -> ".$args.PHP_EOL;
	file_put_contents($folder."/".basename($file).".txt", $Escribir, FILE_APPEND);

	$QUERY = str_ireplace(array('Delete','Drop','Insert','Show ','Truncate','Union','Update',';'),"",$QUERY);
	try{
		return $QUERY = $GLOBALS[$CON]->Query($QUERY);
	}catch(PDOException $e){
		$folder_error = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL']."/";
		$Escribir_error = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".basename($file)." -> ".$function." -> ".$args." -> ".$e->getMessage().PHP_EOL;
		file_put_contents($folder."/Errores.txt", $Escribir_error, FILE_APPEND);
		echo "No se pudo ejecutar la consulta";exit;
	}	
}
function QueryUpdate($QUERY, $CON = 'QWE'){
	$folder = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL'].date("Y-m")."/";
	if(!file_exists($folder)){mkdir($folder);}
	if(!array_key_exists('NAME',$GLOBALS['C_USER'])){$GLOBALS['C_USER']['NAME'] = '';}
	$file = array_column(debug_backtrace(),'file')[0];
	$function = array_column(debug_backtrace(),'function')[0];
	$args = array_column(debug_backtrace(),'args')[0][0];

	$Escribir = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".$function." -> ".$args.PHP_EOL;
	file_put_contents($folder."/".basename($file).".txt", $Escribir, FILE_APPEND);
	
	$QUERY = str_ireplace(array('Delete','Drop','Insert','Show ','Truncate','Union',';'),"",$QUERY);
	try{
		return $QUERY = $GLOBALS[$CON]->Query($QUERY);
	}catch(PDOException $e){
		$folder_error = $GLOBALS['sH']['DOCUMENT_ROOT'].$GLOBALS['SYS_FOLDER']['SQL']."/";
		$Escribir_error = date("Y-m-d H:i:s"). " -> ".ClientIP()." -> ".$GLOBALS['C_USER']['NAME']." -> ".basename($file)." -> ".$function." -> ".$args." -> ".$e->getMessage().PHP_EOL;
		file_put_contents($folder."/Errores.txt", $Escribir_error, FILE_APPEND);
		echo "No se pudo ejecutar la consulta";exit;
	}	
}
function QueryFetch($Query){
	if($Query){ return $Query->fetch();}
}
function QueryFetchAll($Query){
	return $Query->fetchAll();
}
function QueryLastId($CON = 'QWE'){
	return $GLOBALS[$CON]->lastInsertId();
}
function QueryNumRows($Query){
	return $Query->rowCount();
}
?>