/*hay que probar todo */

var arrProd = []

$(document).ready(function(){
    $.ajax({
        url: "../JSON/baseProd.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        // console.log("muestro resultado del AJAX")
        // console.log(resultado)
        arrProd = resultado;
        // console.log("muestro var ARRPROD")
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status) ;
        console.log(error);
    })
})

$(".card-btn-ant").click(function(){
    let idActive = 0 ;
    for(let i=0 ; i< arrProd.length ; i++){
        if($(".card-tit").text() == arrProd[i].nombre){
            idActive = arrProd[i].id;
            break
        }
    }
    
    if (idActive==0){
        console.log("No se encontro el archivo")
    } else if (idActive == 1){
        $(".card-tit").text(arrProd[arrProd.length - 1].nombre)
        $(".card-desc").text(arrProd[arrProd.length - 1].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[arrProd.length - 1].img)
        $(".card-prc").text("$ " + arrProd[arrProd.length - 1].precio)
    }else {
        $(".card-tit").text(arrProd[idActive-2].nombre)
        $(".card-desc").text(arrProd[idActive-2].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[idActive-2].img)
        $(".card-prc").text("$ " + arrProd[idActive-2].precio)
    }

})

$(".card-btn-sig").click(function(){
    let idActive = 0 ;
    for(let i=0 ; i< arrProd.length ; i++){
        if($(".card-tit").text() == arrProd[i].nombre){
            idActive = arrProd[i].id;
            break
        }
    }
    
    if (idActive==0){
        console.log("No se encontro el archivo")
    } else if (idActive == arrProd.length){
        $(".card-tit").text(arrProd[0].nombre)
        $(".card-desc").text(arrProd[0].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[0].img)
        $(".card-prc").text("$ " + arrProd[0].precio)
    }else {
        console.log(arrProd[idActive-1])
        $(".card-tit").text(arrProd[idActive].nombre)
        $(".card-desc").text(arrProd[idActive].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[idActive].img)
        $(".card-prc").text("$ " + arrProd[idActive].precio)
    }

})