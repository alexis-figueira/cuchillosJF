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
    let idActive = 0 ;
    let tit = $("h3.card-nov.tit"); 
    let desc = $("h3.card-nov.desc");
    let lnk = $("h3.card-nov.lnk");
    let prc = $("h3.card-nov.prc");

    // console.log(tit[0].innerHTML)
    // console.log("hola")
    // tit[0].innerHTML = arrProd[4].nombre
    // console.log(tit[0].innerHTML)

    for(let i=0 ; i< arrProd.length ; i++){ console.log("vuelta ")
        if(tit[0].innerHTML == arrProd[i].nombre){
            idActive = arrProd[i].id;
            break
        }
    }

    if (idActive==0){
        console.log("No se encontro el archivo")
    } else {
        console.log("encontre algo")
        for(let i=0 ; i<cantCard ;i++){
            let nc = -1
            console.log("entre al for");
            console.log(idActive+i);
            // console.log("cant prod "+ arrProd.length)
            if((idActive + i) <= arrProd.length){
                console.log("entre al if")
                tit[i].innerHTML = arrProd[idActive+cantCard+nc].nombre ;
                nc -= 1;
            }else {
                console.log("la cuenta dio mal")
            }
        }
    
        $(".card-tit").text(arrProd[arrProd.length - 1].nombre)
        $(".card-desc").text(arrProd[arrProd.length - 1].descripcion)
        $(".card-lnk").attr("src", "." + arrProd[arrProd.length - 1].img)
        $(".card-prc").text("$ " + arrProd[arrProd.length - 1].precio)
    }
    // else {
    //     $(".card-tit").text(arrProd[idActive-2].nombre)
    //     $(".card-desc").text(arrProd[idActive-2].descripcion)
    //     $(".card-lnk").attr("src", "." + arrProd[idActive-2].img)
    //     $(".card-prc").text("$ " + arrProd[idActive-2].precio)
    // }
})

$(".card-btn-sig.dest").click(function(){
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

