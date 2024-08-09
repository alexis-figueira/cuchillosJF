$(window).on("load resize",function(e){WindowSize();});
$(document).ready(function(){
	$('.tabs-buttons button[aria-controls="A"]').trigger('click');$('[data-bs-toggle="tooltip"]').tooltip({trigger : 'hover'});
	$(document).on('keypress', '.FormEnter', function(e){if (e.which == 13){e.preventDefault();$(this).parents('.modal').find('.FormBtnSubmit').click();}});
	$(document).on('shown.bs.modal', '.modal', function(){var INPUT = $(this).find('input[id="AUTOFOCUS"]').val();if(INPUT != ''){$("#"+this.id+" #"+INPUT).focus();}});
	$(document).on('hide.bs.modal', '.modal', function(e){if($(".swal2-container").length){e.preventDefault();}});
	$(document).on("click", ".FormBtnSubmit", function(){if(typeof window[$(this).parents('.modal').attr('id') + "_Procesar"] === "function"){window[$(this).parents('.modal').attr('id') + "_Procesar"]();}});
	$(document).on('keyup', ':input[type="number"]',function(){if($(this).attr('data-ShowNumber') == 'true'){var DECIMALES = 2;if($(this).attr('step') == 1){DECIMALES = 0;}$("label[for='" + this.id + "']").text($(this).attr('data-text') + " (" + SeparadorMiles($("#" + $(this).parents('.modal').find('form').attr('id') + " #"+this.id).val(), DECIMALES) + ")");console.log(this.id);}});
});
$(document).on('shown.bs.modal', '.modal', function(){
	var INPUT = $(this).find('input[id="AUTOFOCUS"]').val();
	if(INPUT != ''){$("#"+this.id+" #"+INPUT).focus();}
	$(this).find(".subtabs-buttons button").eq(0).click();
});
$(document).on('click', '.tabs-buttons button',function (){$(this).parents('ul').find('button').removeClass('active');$(this).parents('ul').find('button').attr('aria-selected', 'false');$(this).addClass('active');$(this).attr('aria-selected', 'true');$('.tabs-body').find('div').removeClass('show').removeClass('active');var ACT = $(this).attr('aria-controls');$('.tabs-body div[aria-labelledby="'+ACT+'"]').addClass('show').addClass('active');TableLoad(ACT);});
$(document).on('click', '.subtabs-buttons button',function (){$(this).parents('ul').find('button').removeClass('active');$(this).parents('ul').find('button').attr('aria-selected', 'false');$(this).addClass('active');$(this).attr('aria-selected', 'true');$('.subtabs-body').find('div').removeClass('show').removeClass('active');var ACT = $(this).attr('aria-controls');$('.subtabs-body div[aria-labelledby="'+ACT+'"]').addClass('show').addClass('active');TableLoad(ACT)});
$.ajaxSetup({
	type: 'POST', 
	encode: true, 
	dataType: 'json', 
	contentType: 'application/json', 
	processData: false,
	beforeSend: function() {
		$("#spinner-container").removeClass('d-none');$("#overlay").removeClass('d-none');
	},
	error: function(jqXHR, textStatus, errorThrown) {
		swal.fire({
			icon: "error",
			title: "No se pudo procesar!", 
			text: "Se recomienda refrescar la pagina",
			showCancelButton: true,
			confirmButtonText: "Refrescar",
			cancelButtonText: "Cancelar",
		}).then((result) => {if (result.isConfirmed) {location.reload();}});
	},
	complete: function() {
		$("#spinner-container").addClass('d-none');$("#overlay").addClass('d-none');
	}
});

function inicializarSelect2(selector, MODAL, URL, PLACEHOLDER, LENGTH = 1) {

    $(MODAL +" "+selector).select2({
        theme: 'bootstrap-5',
        dropdownParent: $(MODAL),
        ajax: ({
            url: URL,
            type: 'POST',
            encode: true,
            dataType: 'json',
            contentType: 'application/json',
            processData: false,
            beforeSend: function() {},
            complete: function() {},
            error: function() {},
            data: function(params) {
                return JSON.stringify({
                    CTS_SEARCH: params.term
                });
            },
            processResults: function(data) {
                return {
                    results: data.items.map(function(item) {
                        return {
                            id: item.ID,
                            text: item.VALUE
                        };
                    })
                };
            },
            cache: true
        }),
        minimumInputLength: LENGTH,
        placeholder: PLACEHOLDER,
        allowClear: true,
        language: {
            inputTooShort: function() {if (LENGTH === 1) { return 'Por favor, introduzca al menos un carácter';} else {return 'Por favor, introduzca al menos ' + LENGTH + ' caracteres';}},
            searching: function() {return 'Buscando…';},
            noResults: function() {return 'No se encontraron resultados';},
            errorLoading: function() {return 'La carga falló';},
            removeAllItems: function() {return 'Eliminar todos los elementos';},
            removeItem: function() {return 'Eliminar elemento';},
            loadingMore: function() {return 'Cargando más resultados…';}
        }
    }).on('select2:select', function() {
        var selectId = $(this).attr('id');
        var label = $('label[for="' + selectId + '"]').text();
        var container = $(this).next('.select2-container');

        if (container.find('.select2-label').length === 0) {
            container.prepend('<span class="select2-label">' + label + '</span>');
        }
    });
	
	$(document).ready(function() {
        $(MODAL + " " + selector).each(function() {
            var selectId = $(this).attr('id');
            var label = $('label[for="' + selectId + '"]');
            var container = $(this).next('.select2-container');

            if (container.find('.select2-label').length === 0) {
                container.prepend('<span class="select2-label">' + label.text() + '</span>');
            }
        });
    });
}

function FormDataPicker(FORM){
	var formData = {};
	$('#' + FORM + ' .InputPickUp').each(function(){
		/*
		if($(this).is('input')){formData[$(this).attr('validate')+"_"+this.id] = this.value;}
		if($(this).is('select')){formData[$(this).attr('validate')+"_"+this.id] = this.value;}
		*/
		if($(this).is('input') || $(this).is('select') || $(this).is('textarea')){
			formData[$(this).attr('validate')+"_"+this.id] = this.value;
		}
	});
	$('#' + FORM + ' .InputPickUpCheckbox').each(function(){
		if($(this).is(':checked')){formData[$(this).attr('validate')+"_"+this.id] = 'TRUE';}
	});
	$('#' + FORM + ' input[type="radio"]:checked').each(function(){
		formData[$(this).attr('validate')+"_"+this.name] = this.value;;
	});

	return formData;
}
function FormErrorReset(FORM){
	$('form#' + FORM + ' :input').each(function(){
		if(this.id){
			$('#' + this.id).removeClass('is-invalid');
			$('#' + this.id).removeClass('is-valid');			
			if(this.type == 'number' && $(this).attr('data-ShowNumber') == 'true'){$("label[for='" + this.id + "']").text($(this).attr('data-text'));}			
		}
	});
}
function FormReset(FORM){
	$('form#' + FORM + ' :input').each(function(){		
		if(this.type == 'checkbox'){if($(this).data('value') != 'checked'){$('#'+FORM+' #' + this.id).prop({'indeterminate': false,'checked': false});}}
		if(this.id){$('#'+FORM+' #' + this.id).val('');}
		if($(this).data('value') != undefined){$('#'+FORM+' #' + this.id).val($(this).data('value'));}
	});
	$('form#' + FORM + ' datalist').each(function(){
		if(this.id && $(this).attr('data-reset') != 'false'){
			$('#' + this.id).empty();;
		}
	});
}
function IpLibres(TIPO, INPUT){
	let formData = {'CNETU__TIPO':TIPO, 'CT012__RANGO': $("#"+INPUT).val()};
	$("#DLlist_"+INPUT).empty();
	$.each(IP_RANGOS,function(e, rango){
		$("#DLlist_"+INPUT).append('<option data-value="' + rango + '" value="' + rango + '"></option>');
	});
	$.ajax({url: '/Equipos/DL_List_IP',data: JSON.stringify(formData)}).done(function (response){			
		$.each(response, function(i, ip){
			$("#DLlist_"+INPUT).append('<option data-value="' + ip + '" value="' + ip + '"></option>');
		});
	});
}
function ModalClose(MODAL, RETURN = null){
	$("#" + $(MODAL).parent().closest('.modal').attr('id')).modal("hide");
	if(RETURN != null){
		$("#" + RETURN).modal('show');
	}
}
function ModalHasShow(){
	var MODAL = null;
	$(".modal").each(function(){if($(this).hasClass('show')){MODAL = this.id;}});
	return MODAL;
}
function ModalReturn(ID, METHOD = 'HIDE'){
	if($('#' + ID).length){
		const MODAL = bootstrap.Modal.getOrCreateInstance('#' + ID);	
		if(METHOD == 'SHOW'){
			MODAL.show();
		}else{
			MODAL.hide();
		}
	}
}
function SeparadorMiles(number, decimals = 2, dec_point = ",", thousands_sep = ".") {
	number = Number(number).toFixed(decimals);
	var nstr = number.toString();
	nstr += '';
	x = nstr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? dec_point + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1))
		x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');
	return x1 + x2;
}
function TableLoad(TABLE){
	if($('#Table'+ TABLE).length){
		var formData = {};
		formData['CEI_ORDENAR'] = $('#Table_' + TABLE + '_ordenar_col').val();
		formData['CTS_METHOD'] = $('#Table_' + TABLE + '_ordenar_method').val();
		formData['CEI_PAGINA'] = $('#Table_' + TABLE + '_page').val();
		if($('#Table' + TABLE).attr('data-ADV') == 'STR'){ formData['CtU_ADVANCE'] = $('#Table_' + TABLE + '_advanced').val();}
		if($('#Table' + TABLE).attr('data-ADV') == 'JSON'){ formData['CJS_ADVANCE'] = $('#Table_' + TABLE + '_advanced').val();}
		formData['CTS_SEARCH'] = $('#Table_' + TABLE + '_search').val();
		
		TableLoadSpinner(TABLE);	
		$.ajax({url: $('#Table' + TABLE).attr('data-AJAX'),data: JSON.stringify(formData)}).done(function (response){
			TableRowClick(TABLE, "");
			$('#TableBody' + TABLE).empty();
			$('#Table_' + TABLE + '_page_total').val(1);
			if(response.ROWS.length > 0){
				$.each(response.ROWS, function(k, v){
					AddRow = '<tr id="Row_'+TABLE+'_'+v['ID']+'" onClick="TableRowClick(\'' + TABLE + '\',\'' + v['ID'] + '\')" ondblclick="TableRowClickDouble(\'' + TABLE + '\',\'' + v['ID'] + '\')">';
						$.each($('#Table'+TABLE+' thead').find('th'), function(){
							if(v['DATA'][$(this).attr("data-DB")] != undefined && v['DATA'][$(this).attr("data-DB")] + "" != ""){
								AddRow += '<td class="' + $(this).attr('class') + '">' + v['DATA'][$(this).attr("data-DB")] + '</td>';
							}else{
								AddRow += '<td class="' + $(this).attr('class') + '"></td>';
							}
						})					
					AddRow += '</tr>';
					$("#Table" + TABLE + " > tbody").append(AddRow);
				});
			}else{
				TableLoadEmpty(TABLE);
			}
			$("#Table_" + TABLE + "_page_total").val(response.PAGINAS);
			TableLoadResult(TABLE, response.COUNT, response.TOTAL);			
			TablePaginationView(TABLE);
			if($('#Table' + TABLE).attr('data-ORD') == 'TRUE'){ TableOrderByView(TABLE);}
		});
	}
}
function TableLoadEmpty(TABLE){
	let COLSPAN = $('#Table' + TABLE + ' > thead > tr > th').length;	
	$('#TableBody' + TABLE ).empty();
	if($('#Table_' + TABLE + '_search').val() != ''){
		$('#Table' + TABLE + ' > tbody').append('<tr><td colspan="' + COLSPAN + '">No hay resultados que coincidan con la busqueda!</td></tr>');	
	}else{
		$('#Table' + TABLE + ' > tbody').append('<tr><td colspan="' + COLSPAN + '">No hay resultados para mostrar!</td></tr>');	
	}
}
function TableLoadResult(TABLE, PARCIAL, TOTAL){
	if(TOTAL == 0){
		$('#Table_' + TABLE + '_Resultados').text("Sin Resultados.");
	}else if(TOTAL == 1){
		$('#Table_' + TABLE + '_Resultados').text(PARCIAL + " Resultado.");
	}else if(PARCIAL == TOTAL){
		$('#Table_' + TABLE + '_Resultados').text(PARCIAL + " Resultados.");
	}else{
		$('#Table_' + TABLE + '_Resultados').text(PARCIAL + " de " + TOTAL + " Resultados.");
	}
}
function TableLoadSpinner(TABLE){
	let COLSPAN = $('#Table' + TABLE + ' > thead > tr > th').length;
	$('#TableBody' + TABLE ).empty();
	$('#Table' + TABLE + ' > tbody').append('<tr><td colspan="' + COLSPAN + '"><div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div></td></tr>');
}
function TableOrderBySet(TABLE, COLUMN){
	let OrderBy = $('#Table_' + TABLE + '_ordenar_col').val();
	let OrderMethod = $('#Table_' + TABLE + '_ordenar_method').val();	
	let METHOD;
	
	if(COLUMN <= 1 && $('#OrderByCol_' + TABLE + '_' + COLUMN).length < 1){COLUMN = 1}
	if (OrderBy != COLUMN){
		METHOD = 'ASC';
	}else{
		if(OrderMethod == 'ASC'){
			METHOD = 'DESC';
		}else{
			METHOD = 'ASC';
		}
	}
	$('#Table_' + TABLE + '_ordenar_col').val(COLUMN);
	$('#Table_' + TABLE + '_ordenar_method').val(METHOD);
	TablePaginationSet(TABLE, '1');
}
function TableOrderByView(TABLE){			
	let OrderBy = $('#Table_' + TABLE + '_ordenar_col').val();
	let OrderMethod = $('#Table_' + TABLE + '_ordenar_method').val();	
	$('#Table' + TABLE + ' > thead > tr > th > span').each(function(){ 
		$('#' + this.id).html('<i class="fa-solid fa-sort"></i>');
	});	
	if($('#OrderByCol_' + TABLE + '_' + OrderBy).length > 0){
		if(OrderMethod == 'DESC'){
			$('#OrderByCol_' + TABLE + '_' + OrderBy).html('<i class="fa-solid fa-square-caret-down"></i>');
		}else{
			$('#OrderByCol_' + TABLE + '_' + OrderBy).html('<i class="fa-solid fa-square-caret-up"></i>');
		}				
	}	
}
function TablePaginationSet(TABLE, PAGE){
	if(PAGE < 1){
		PAGE = 1;
	}
	if(PAGE > $('#Table_' + TABLE + '_page_total').val()){
		$PAGE = $('#Table_' + TABLE + '_page_total').val();
	}
	$('#Table_' + TABLE + '_page').val(PAGE);
	TableLoad(TABLE);
}
function TablePaginationView(TABLE){	
	let ACT = parseFloat($('#Table_' + TABLE + '_page').val());
	let MAX = parseFloat($('#Table_' + TABLE + '_page_total').val());
	let AddRow;
	let AddRowMD = '<div class="vr align-middle d-lg-none"></div>';
	if(ACT >= 1 && MAX >= 1 && ACT <= MAX){
		$('#Table_' + TABLE + '_Pagination').empty();
		$('#Table_' + TABLE + '_Pagination_MD').empty();
		AddRow = '<div class="btn-group btn-group-sm" role="group" aria-label="Pagination">';		
		if(ACT > 1){
			AddRow += '<button type="button" id="Page_Ant_' + TABLE + '" class="btn btn-light" onClick="TablePaginationSet(\'' + TABLE + '\', \'' + (ACT-1) + '\')"><i class="fa-solid fa-caret-left"></i></button>';
			AddRowMD += '<button type="button" class="btn btn-link';
				if($('#Table_' + TABLE + '_Pagination_MD').parents('.card-footer').length > 0){
					AddRowMD += ' text-white';
				};
			AddRowMD += ' d-lg-none px-1 m-0" id="Tool_' + TABLE + '_PAGE_ANT" onClick="document.getElementById(\'Page_Ant_' + TABLE + '\').click()" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="PAGINA ANTERIOR"><i class="fa-solid fa-circle-left fa-lg"></i></button>';
		}
		AddRow += '<button type="button" class="btn btn-light px-2" disabled>' + ACT + '</button>';
		if(ACT < MAX){
			AddRow += '<button type="button" id="Page_Sig_' + TABLE + '" class="btn btn-light" onClick="TablePaginationSet(\'' + TABLE + '\', \'' + (ACT+1) + '\')"><i class="fa-solid fa-caret-right"></i></button>';
			AddRowMD += '<button type="button" class="btn btn-link';
				if($('#Table_' + TABLE + '_Pagination_MD').parents('.card-footer').length > 0){
					AddRowMD += ' text-white';
				};			
			AddRowMD += ' d-lg-none px-1 m-0" id="Tool_' + TABLE + '_PAGE_NEXT" onClick="document.getElementById(\'Page_Sig_' + TABLE + '\').click()" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="PAGINA SIGUIENTE"><i class="fa-solid fa-circle-right fa-lg"></i></button>';
		}
		AddRow += '</div>';
		$('#Table_' + TABLE + '_Pagination').append(AddRow);
		$('#Table_' + TABLE + '_Pagination_MD').append(AddRowMD);
	}	
}
function TableRefresh(TABLE){
	TableLoad(TABLE);
}
function TableRowClick(TABLE, ROW){
	let ACTUAL = $("#Table_" + TABLE + "_row").val();
	if(ACTUAL != 0){$("#Row_" + TABLE + "_" + ACTUAL).removeClass("table-danger");}	
	$("#Table_" + TABLE + "_row").val(0);
	if(ACTUAL != ROW && ROW > 0 && $("#Row_" + TABLE + "_" + ROW).length >= 1){
		$("#Table_" + TABLE + "_row").val(ROW);
		$("#Row_" + TABLE + "_" + ROW).addClass("table-danger");
	}	
	if($("#Table_" + TABLE + "_row").val() == '0'){
		$("#Table_" + TABLE + "_Tools > .btn-row").each(function(){$(this).prop("disabled",true);});
	}else{
		$("#Table_" + TABLE + "_Tools > .btn-row").each(function(){$(this).prop("disabled",false);});
	}
}
function TableRowClickDouble(TABLE, ROW){
	let ACTUAL = $("#Table_" + TABLE + "_row").val();
	if(ACTUAL != ROW){TableRowClick(TABLE, ROW);}
	if(typeof window[$('#Table' + TABLE).attr('data-DOBLECLICK')] === "function") {window[$('#Table' + TABLE).attr('data-DOBLECLICK')]();}
}

function WindowSize(){
	var heightOutput = innerHeight;
	
	if(heightOutput <= 500){
		$('#card-body-main').height(440);
		$('.tableFixHead').height(heightOutput-325);
		$('#subcardcard-body-main').height(300);
		$('.SubtableFixHead').height(heightOutput-120);
	}else{
		$('#card-body-main').height(heightOutput-185);
		$('.tableFixHead').height(heightOutput-255);
		$('#subcardcard-body-main').height(heightOutput-310);
		$('.SubtableFixHead').height(heightOutput-380);
	}		
}