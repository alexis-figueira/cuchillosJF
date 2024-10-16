<?php
if($ROUTE_OPC == 'Listado_Vademecum_General'){
	$RETURN['COUNT'] = 0;
	$RETURN['TOTAL'] = 0;
	$RETURN['PAGINAS'] = 1;
	$RETURN['ROWS'] = [];
	if($PP['C'] != 1){EJE($RETURN);}
	$ARRAY_ORDER = array(1 => '`troquel` {METHOD}', 2 => '`laboratorio` {METHOD}', 3 => '`detalle` {METHOD}', 4 => '`precio` {METHOD}');
	$FORM = LISTADO_QUERY($ARRAY_ORDER);
	if($FORM['SEARCH'] != NULL){ $SEARCH = "WHERE `troquel` = '".$FORM['SEARCH']."' or `laboratorio` LIKE '%".$FORM['SEARCH']."%' or `detalle` LIKE '%".$FORM['SEARCH']."%'";}else{$SEARCH = '';}
	$Que = QuerySelect("SELECT `troquel`, `detalle`, `laboratorio`, `precio` FROM ".$DBT['V_FTDAS_GENERAL'].$SEARCH." ORDER BY ".$FORM['ORDENAR']." LIMIT ".$FORM['LIMIT']." ,".$FORM['ROWS']);
	while($Row = QueryFetch($Que)){
		$RETURN['COUNT']++;
		$TMP = [];
		$TMP['ID'] 						= $Row['troquel'];
		$TMP['DATA']['TROQUEL'] 		= $Row['troquel'];
		$TMP['DATA']['MEDICAMENTO'] 	= $Row['detalle'];
		$TMP['DATA']['LABORATORIO'] 	= $Row['laboratorio'];
		$TMP['DATA']['PRECIO'] 			= Numero_Formato($Row['precio']);	
		$TMP['DATA']['DAS'] 			= Numero_Formato($Row['precio']/2);
		array_push($RETURN['ROWS'], $TMP);
		unset($TMP);
	}
	$Que = QuerySelect("SELECT COUNT(*) AS 'total' FROM ".$DBT['V_FTDAS_GENERAL'].$SEARCH);
	while($Row = QueryFetch($Que)){	
		$RETURN['TOTAL'] = $Row['total'];
		$RETURN['PAGINAS'] = ceil($RETURN['TOTAL']/$FORM['ROWS']);
	}
	EJE($RETURN);
}
elseif($ROUTE_OPC == 'Listado_Vademecum_Mayores'){
	$RETURN['COUNT'] = 0;
	$RETURN['TOTAL'] = 0;
	$RETURN['PAGINAS'] = 1;
	$RETURN['ROWS'] = [];
	if($PP['C'] != 1){EJE($RETURN);}
	$ARRAY_ORDER = array(1 => '`troquel` {METHOD}', 2 => '`laboratorio` {METHOD}', 3 => '`detalle` {METHOD}', 4 => '`precio` {METHOD}');
	$FORM = LISTADO_QUERY($ARRAY_ORDER);
	if($FORM['SEARCH'] != NULL){ $SEARCH = "WHERE `troquel` = '".$FORM['SEARCH']."' or `laboratorio` LIKE '%".$FORM['SEARCH']."%' or `detalle` LIKE '%".$FORM['SEARCH']."%'";}else{$SEARCH = '';}
	$Que = QuerySelect("SELECT `troquel`, `detalle`, `laboratorio`, `precio` FROM ".$DBT['V_FTDAS_MAYORES'].$SEARCH." ORDER BY ".$FORM['ORDENAR']." LIMIT ".$FORM['LIMIT']." ,".$FORM['ROWS']);
	while($Row = QueryFetch($Que)){
		$RETURN['COUNT']++;
		$TMP = [];
		$TMP['ID'] 						= $Row['troquel'];
		$TMP['DATA']['TROQUEL'] 		= $Row['troquel'];
		$TMP['DATA']['MEDICAMENTO'] 	= $Row['detalle'];
		$TMP['DATA']['LABORATORIO'] 	= $Row['laboratorio'];
		$TMP['DATA']['PRECIO'] 			= Numero_Formato($Row['precio']);	
		$TMP['DATA']['DAS'] 			= Numero_Formato(0.00);
		array_push($RETURN['ROWS'], $TMP);
		unset($TMP);
	}
	$Que = QuerySelect("SELECT COUNT(*) AS 'total' FROM ".$DBT['V_FTDAS_MAYORES'].$SEARCH);
	while($Row = QueryFetch($Que)){	
		$RETURN['TOTAL'] = $Row['total'];
		$RETURN['PAGINAS'] = ceil($RETURN['TOTAL']/$FORM['ROWS']);
	}
	EJE($RETURN);
}
elseif($ROUTE_OPC == 'Listado_Precios_General'){
	$RETURN['COUNT'] = 0;
	$RETURN['TOTAL'] = 0;
	$RETURN['PAGINAS'] = 1;
	$RETURN['ROWS'] = [];	
	if($PP['C'] != 1){EJE($RETURN);}
	if(CIJE('CtU_ADVANCE') === TRUE){EJE($RETURN);}
	$ARRAY_ORDER = array(1 => '`fecha` {METHOD}', 2 => '`precio` {METHOD}');
	$FORM = LISTADO_QUERY($ARRAY_ORDER);
	if($FORM['SEARCH'] != NULL){ $SEARCH = " WHERE `troquel` = '".$sJ['CtU_ADVANCE']."' AND `fecha` = str_to_date('".str_replace("-","/",$FORM['SEARCH'])."', '%d/%m/%Y')";}else{$SEARCH =" WHERE `troquel` = '".$sJ['CtU_ADVANCE']."'";}
	$QueFT = QuerySelect("SELECT `troquel` FROM ".$DBT['V_FTDAS_GENERAL']." WHERE `troquel` ='".$sJ['CtU_ADVANCE']."'");
	if(QueryNumRows($QueFT) < 1){EJE($RETURN);}
	$Que = QuerySelect("SELECT `id_precio`,`precio`, `fecha` FROM ".$DBT['ALFABETA_PRECIOS'].$SEARCH." ORDER BY ".$FORM['ORDENAR']." LIMIT ".$FORM['LIMIT']." ,".$FORM['ROWS']);
	while($Row = QueryFetch($Que)){
		$RETURN['COUNT']++;
		$TMP = [];
		$TMP['ID'] 						= $Row['id_precio'];
		$TMP['DATA']['FECHA'] 			= Fecha_Formato($Row['fecha']);
		$TMP['DATA']['PRECIO'] 			= Numero_Formato($Row['precio']);
		$TMP['DATA']['DAS'] 			= Numero_Formato($Row['precio']/2);
		array_push($RETURN['ROWS'], $TMP);
		unset($TMP);
	}
	$Que = QuerySelect("SELECT COUNT(*) AS 'total' FROM ".$DBT['ALFABETA_PRECIOS'].$SEARCH);
	while($Row = QueryFetch($Que)){	
		$RETURN['TOTAL'] = $Row['total'];
		$RETURN['PAGINAS'] = ceil($RETURN['TOTAL']/$FORM['ROWS']);
	}
	EJE($RETURN);
}
elseif($ROUTE_OPC == 'Procesar_Vademecum_General'){	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 900);
	if($PP['A'] != 1){RJRE("PERMISOS INSUFICIENTES");}
	if(CIJE('CTS_ID_ARCHIVO') === TRUE){RJRE();};
	if(CFE($sJ['CTS_ID_ARCHIVO']) === FALSE){RJRE("No se pudo procesar el archivo");};
	$ARCHIVO = CFE($sJ['CTS_ID_ARCHIVO']);
	if(!in_array(Str_Lo($ARCHIVO['TYPE']),$CFG_UPLOADFILES['TYPE']['EXCEL'])){RJRE("Solo se admiten archivos XLS o XLSX");}
	
	try{
		if(RFE($ARCHIVO['TYPE']) == 'xls'){     
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}elseif(RFE($ARCHIVO['TYPE']) == 'csv'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		}else{     
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}		
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($ARCHIVO['FILE']);
	} catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
		RJRE("No se pudo leer el archivo");
	}
	
	$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
	
	$data = $sheet->toArray();
	
	if(count($data)<1){RJRE("No se pudo procesar el archivo");};
	
	$DB = array();
	$QueCurrent = QuerySelect("SELECT `troquel`, `reg_alta` FROM ".$DBT['FTDAS_GENERAL']);
	if(QueryNumRows($QueCurrent) > 0){
		while($RowCurrent = QueryFetch($QueCurrent)){
			array_push($DB,$RowCurrent['troquel']);
		}
	}	
	
	$CURRENT = array();	
	foreach(array_slice($data,1) as $LINEA){
		if(!array_key_exists(0,$LINEA)){RJRE("No se pueden procesar las columnas");}
		$TROQUEL = SANITIZE_NUM_ENT($LINEA[0], 0, 4294967295);
		
		if($TROQUEL == ''){continue;}
		array_push($CURRENT,$TROQUEL);
	}
	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT, $DB);
	$BAJAS = array_diff($DB, $CURRENT);
	
	$STRING = '';
	if(count($ALTAS) >0){
		foreach($ALTAS AS $KEY){
			if($STRING != ''){$STRING .= ',';}
			$STRING .= "('".$KEY."', NOW())";
		}
	}	
	if($STRING != ''){QueryInsert("INSERT INTO ".$DBT['FTDAS_GENERAL']." VALUES ".$STRING);}
	
	if(count($BAJAS) >0){foreach($BAJAS AS $KEY){QueryDelete("DELETE FROM ".$DBT['FTDAS_GENERAL']." WHERE `troquel` = '".$KEY."'");}}	
	RJRO();
}
elseif($ROUTE_OPC == 'Procesar_Vademecum_Mayores'){	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 900);
	if($PP['A'] != 1){RJRE("PERMISOS INSUFICIENTES");}
	if(CIJE('CTS_ID_ARCHIVO') === TRUE){RJRE();};
	if(CFE($sJ['CTS_ID_ARCHIVO']) === FALSE){RJRE("No se pudo procesar el archivo");};
	$ARCHIVO = CFE($sJ['CTS_ID_ARCHIVO']);
	if(!in_array(Str_Lo($ARCHIVO['TYPE']),$CFG_UPLOADFILES['TYPE']['EXCEL'])){RJRE("Solo se admiten archivos XLS o XLSX");}
	
	try{
		if(RFE($ARCHIVO['TYPE']) == 'xls'){     
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		}elseif(RFE($ARCHIVO['TYPE']) == 'csv'){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		}else{     
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}		
		$reader->setReadDataOnly(true);
		$spreadsheet = $reader->load($ARCHIVO['FILE']);
	} catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
		RJRE("No se pudo leer el archivo");
	}
	
	$sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
	
	$data = $sheet->toArray();
	
	if(count($data)<1){RJRE("No se pudo procesar el archivo");};
	
	$DB = array();
	$QueCurrent = QuerySelect("SELECT `troquel`, `reg_alta` FROM ".$DBT['FTDAS_MAYORES']);
	if(QueryNumRows($QueCurrent) > 0){
		while($RowCurrent = QueryFetch($QueCurrent)){
			array_push($DB,$RowCurrent['troquel']);
		}
	}	
	
	$CURRENT = array();	
	foreach(array_slice($data,1) as $LINEA){
		if(!array_key_exists(0,$LINEA)){RJRE("No se pueden procesar las columnas");}
		$TROQUEL = SANITIZE_NUM_ENT($LINEA[0], 0, 4294967295);
		
		if($TROQUEL == ''){continue;}
		array_push($CURRENT,$TROQUEL);
	}
	$CURRENT = array_unique($CURRENT);
	$ALTAS = array_diff($CURRENT, $DB);
	$BAJAS = array_diff($DB, $CURRENT);
	
	$STRING = '';
	if(count($ALTAS) >0){
		foreach($ALTAS AS $KEY){
			if($STRING != ''){$STRING .= ',';}
			$STRING .= "('".$KEY."', NOW())";
		}
	}	
	if($STRING != ''){QueryInsert("INSERT INTO ".$DBT['FTDAS_MAYORES']." VALUES ".$STRING);}
	
	if(count($BAJAS) >0){foreach($BAJAS AS $KEY){QueryDelete("DELETE FROM ".$DBT['FTDAS_MAYORES']." WHERE `troquel` = '".$KEY."'");}}	
	RJRO();
}
else{
	EE("NO_SE_PUEDE_PROCESAR_LA_SOLICITUD");
}
?>