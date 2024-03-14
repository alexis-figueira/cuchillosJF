var arrProd = [];

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

const cantCard = 4 ; //cant prod mostrados

$(".card-btn-ant.dest").click(function(){
    let idIn = 0 ;
    let tit = $("h3.card-nov.tit"); 
    let desc = $("h3.card-nov.desc");
    let lnk = $("h3.card-nov.lnk");
    let prc = $("h3.card-nov.prc");

    // console.log(tit[0].innerHTML)
    // console.log("hola")
    // tit[0].innerHTML = arrProd[4].nombre
    // console.log(tit[0].innerHTML)

    for(let i=0 ; i< arrProd.length ; i++){ 
        // console.log("vuelta ")
        if(tit[0].innerHTML == arrProd[i].nombre){
            idIn = arrProd[i].id;
            break
        }
    }
    console.log(idIn)

    ubProd = idIn -1 ;

    if (idIn==0){
        // console.log("No se encontro el archivo")
    } else {
        // console.log("encontre algo")
        for(let i=0 ; i<tit.length ;i++){
            //     tit[i].innerHTML = arrProd[idIn].nombre;
            console.log("card " + (i + 1))
            if(ubProd<=arrProd.length){
                tit[i].innerHTML = arrProd[ubProd+1].nombre;
            }
            ubProd =+ 1;
        }

    }
})

$(".card-btn-sig.dest").click(function(){
    let idIn = 0 ;
    for(let i=0 ; i< arrProd.length ; i++){
        if($(".card-tit").text() == arrProd[i].nombre){
            idIn = arrProd[i].id;
            break
        }
    }
    
    if (idIn==0){
        console.log("No se encontro el archivo")
    } else if (idIn == arrProd.length){
        $(".card-tit").text(arrProd[0].nombre)
        $(".card-desc").text(arrProd[0].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[0].img)
        $(".card-prc").text("$ " + arrProd[0].precio)
    }else {
        console.log(arrProd[idIn-1])
        $(".card-tit").text(arrProd[idIn].nombre)
        $(".card-desc").text(arrProd[idIn].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[idIn].img)
        $(".card-prc").text("$ " + arrProd[idIn].precio)
    }

})

