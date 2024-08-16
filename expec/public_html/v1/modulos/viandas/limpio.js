function Display_A_Principal(){
	FormErrorReset("A_PRINCIPAL_FORM");
	FormReset("A_PRINCIPAL_FORM");
	$("#A_PRINCIPAL_FORM #ARCHIVO").removeClass("d-none").prop("required", true);
		
//if($PP['M'] == '1'){			
	if($("#Table_A_row").val() >= 1){
		$.ajax({url: "'.$LINK_BACK.'/Ver_Reportes/",data: JSON.stringify({"CES_ID":$("#Table_A_row").val()})}).done(function (response){
			$("#A_PRINCIPAL_FORM #ID_REPORTE").val(response.ID_REPORTE);
			$("#A_PRINCIPAL_FORM #ID_ARCHIVO").val(response.ID_ARCHIVO);
			$("#A_PRINCIPAL_FORM #DESCRIPCION").val(response.DESCRIPCION);
			$("#A_PRINCIPAL_FORM #ARCHIVO").addClass("d-none").prop("required", false);
			$("#A_PRINCIPAL_FORM #FECHA_INICIAL").val(response.FECHA_INICIAL);
			$("#A_PRINCIPAL_FORM #FECHA_FINAL").val(response.FECHA_FINAL);
		});
	}
//}
	$("#MODAL_A_PRINCIPAL #AUTOFOCUS").val("DESCRIPCION");
	MODAL_A_PRINCIPAL_INSTANCE.show();		
}	

function MODAL_A_PRINCIPAL_Procesar(){
	if($("#A_PRINCIPAL_FORM")[0].reportValidity()==false){return;}
	FormErrorReset("A_PRINCIPAL_FORM");
	var NewTab = window.open("'.$URL['API'].'/ViandasChamba/Procesar_Reportes/" + $("#MODAL_A_PRINCIPAL #DESCRIPCION").val() + "/" + $("#MODAL_A_PRINCIPAL #ID_ARCHIVO").val() + "/" + $("#MODAL_A_PRINCIPAL #FECHA_INICIAL").val() + "/" + $("#MODAL_A_PRINCIPAL #FECHA_FINAL").val() + "/" + Math.floor(Math.random() * (99999 - 10000) + 10000) , "_blank");
}	

	$JS_TMP .= CreateFormUpload('ARCHIVO','A_PRINCIPAL_FORM', 'EXCEL');