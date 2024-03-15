var arrProdDest = [] ;
var arrProdNov = [] ;


/*Json dest*/ 
$(document).ready(function(){
    $.ajax({
        url: "../JSON/baseDest.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        arrProdDest = resultado;
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status);
        console.log(error);
    })
})

/*Json Nov*/ 
$(document).ready(function(){
    $.ajax({
        url: "../JSON/baseNov.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        arrProdNov = resultado;
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status) ;
        console.log(error);
    })
})

/* botones destacados */

$(".card-btn.ant-dest").click(function(){
    let tit = $("h3.card__dest-tit"); 
    let desc = $("p.card__dest-desc");
    let lnk = $("img.card__dest-lnk");
    let prc = $("p.card__dest-prc");

    for(let i=0 ; i<tit.length ;  i++){
        console.log("card " + (i + 1)) ;
        let idProd = 0;
        for(let j=0 ; j<arrProdDest.length ; j++){ 
            // console.log("vuelta ")
            if(tit[i].innerHTML == arrProdDest[j].nombre){
                idProd = arrProdDest[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;
        
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == 1){
            tit[i].innerHTML = arrProdDest[arrProdDest.length-1].nombre ;
            desc[i].innerHTML = arrProdDest[arrProdDest.length-1].descripcion ;
            lnk[i].setAttribute("src", "./img/" + arrProdDest[arrProdDest.length-1].img) ;
            prc[i].innerHTML = arrProdDest[arrProdDest.length-1].precio ;
        } else {
            tit[i].innerHTML = arrProdDest[ubProd-1].nombre ;
            desc[i].innerHTML = arrProdDest[ubProd-1].descripcion ;    
            lnk[i].setAttribute("src", "./img/" + arrProdDest[ubProd-1].img) ;
            prc[i].innerHTML = arrProdDest[ubProd-1].precio ;
        } ;

    }
})

$(".card-btn.sig-dest").click(function(){
    let tit = $("h3.card__dest-tit"); 
    let desc = $("p.card__dest-desc");
    let lnk = $("img.card__dest-lnk");
    let prc = $("p.card__dest-prc");

    for(let i=0 ; i<tit.length ; i++){
        console.log("card " + (i + 1)) ;
        let idProd = 0;
        for(let j=0 ; j<arrProdDest.length ; j++){ 
            // console.log("vuelta ")
            if(tit[i].innerHTML == arrProdDest[j].nombre){
                idProd = arrProdDest[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;
        
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == arrProdDest.length){
            tit[i].innerHTML = arrProdDest[0].nombre ;
            desc[i].innerHTML = arrProdDest[0].descripcion ;
            lnk[i].setAttribute("src", "./img/" + arrProdDest[0].img) ;
            prc[i].innerHTML = arrProdDest[0].precio ;

        } else {
            tit[i].innerHTML = arrProdDest[ubProd+1].nombre ;
            desc[i].innerHTML = arrProdDest[ubProd+1].descripcion ;    
            lnk[i].setAttribute("src", "./img/" + arrProdDest[ubProd+1].img) ;
            prc[i].innerHTML = arrProdDest[ubProd+1].precio ;
        } ;
    }
})

/* Bot novedades */

$(".card-btn.ant-nov").click(function(){
    let tit = $("h3.card__nov-tit"); 
    let desc = $("p.card__nov-desc");
    let lnk = $("img.card__nov-lnk");
    let prc = $("p.card__nov-prc");

    for(let i=0 ; i<tit.length ;  i++){
        console.log("card " + (i + 1)) ;
        let idProd = 0;
        for(let j=0 ; j<arrProdNov.length ; j++){ 
            if(tit[i].innerHTML == arrProdNov[j].nombre){
                idProd = arrProdNov[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;
        
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == 1){
            tit[i].innerHTML = arrProdNov[arrProdNov.length-1].nombre ;
            desc[i].innerHTML = arrProdNov[arrProdNov.length-1].descripcion ;
            lnk[i].setAttribute("src", "./img/" + arrProdNov[arrProdNov.length-1].img) ;
            prc[i].innerHTML = arrProdNov[arrProdNov.length-1].precio ;
        } else {
            tit[i].innerHTML = arrProdNov[ubProd-1].nombre ;
            desc[i].innerHTML = arrProdNov[ubProd-1].descripcion ;    
            lnk[i].setAttribute("src", "./img/" + arrProdNov[ubProd-1].img) ;
            prc[i].innerHTML = arrProdNov[ubProd-1].precio ;
        } ;

    }
})

$(".card-btn.sig-nov").click(function(){
    let tit = $("h3.card__nov-tit"); 
    let desc = $("p.card__nov-desc");
    let lnk = $("img.card__nov-lnk");
    let prc = $("p.card__nov-prc");

    for(let i=0 ; i<tit.length ; i++){
        console.log("card " + (i + 1)) ;
        let idProd = 0;
        for(let j=0 ; j<arrProdNov.length ; j++){ 
            // console.log("vuelta ")
            if(tit[i].innerHTML == arrProdNov[j].nombre){
                idProd = arrProdNov[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;
        
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == arrProdNov.length){
            tit[i].innerHTML = arrProdNov[0].nombre ;
            desc[i].innerHTML = arrProdNov[0].descripcion ;
            lnk[i].setAttribute("src", "./img/" + arrProdNov[0].img) ;
            prc[i].innerHTML = arrProdNov[0].precio ;

        } else {
            tit[i].innerHTML = arrProdNov[ubProd+1].nombre ;
            desc[i].innerHTML = arrProdNov[ubProd+1].descripcion ;    
            lnk[i].setAttribute("src", "./img/" + arrProdNov[ubProd+1].img) ;
            prc[i].innerHTML = arrProdNov[ubProd+1].precio ;
        } ;
    }
})



