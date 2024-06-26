/* Botones destacados */
$(".card-btn.ant-dest").click(function(){
    let tit = $(".cont-card-dest h3.card__tit"); 
    $(".cont-card-dest .img__card").remove();
    for(let i=0 ; i<tit.length ;  i++){
        let idProd = 0;
        for(let j=0 ; j<arrProdDest.length ; j++){ 
            if(tit[i].innerHTML == arrProdDest[j].nombre){
                idProd = arrProdDest[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;      
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == 1){
            setCard(arrProdDest[arrProdDest.length-1].nombre, arrProdDest[arrProdDest.length-1].descripcion, "./img/" + arrProdDest[arrProdDest.length-1].img, arrProdDest[arrProdDest.length-1].precio ,"cont-card-dest");
        } else {
            console.log("id prod distinto de 0")
            setCard(arrProdDest[ubProd-1].nombre, arrProdDest[ubProd-1].descripcion, "./img/" + arrProdDest[ubProd-1].img, arrProdDest[ubProd-1].precio,"cont-card-dest");
        } ;
    }
    $(".cont-card-dest .img__card").css("animation-name", "ani-translate-ing")
    $(".cont-card-dest .img__card").css("animation-duration", "1.5s")
})

$(".card-btn.sig-dest").click(function(){
    let tit = $(".cont-card-dest h3.card__tit");
    $(".cont-card-dest .img__card").remove();
    for(let i=0 ; i<tit.length ; i++){
        let idProd = 0;
        for(let j=0 ; j<arrProdDest.length ; j++){ 
            if(tit[i].innerHTML == arrProdDest[j].nombre){
                idProd = arrProdDest[j].id;
                break ;
            };
        };
        ubProd = idProd - 1;     
        if (idProd == 0){
            console.log("no se encontro el archivo") ;
        } else if (idProd == arrProdDest.length){
            console.log("ultimo");
            setCard(arrProdDest[0].nombre, arrProdDest[0].descripcion, "./img/" + arrProdDest[0].img, arrProdDest[0].precio, "cont-card-dest");
        } else {
            console.log("encontro y no es el ultimo")
            setCard(arrProdDest[ubProd+1].nombre, arrProdDest[ubProd+1].descripcion, "./img/" + arrProdDest[ubProd+1].img, arrProdDest[ubProd+1].precio, "cont-card-dest");
            
        } ;
    }
    $(".cont-card-dest .img__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-dest .img__card").css("animation-duration", "1.5s");
})

/* Botones novedades */
$(".card-btn.ant-nov").click(function(){
    let tit = $(".cont-card-nov h3.card__tit"); 
    $(".cont-card-nov .img__card").remove();
    for(let i=0 ; i<tit.length ;  i++){
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
            setCard(arrProdNov[arrProdNov.length-1].nombre, arrProdNov[arrProdNov.length-1].descripcion, "./img/" + arrProdNov[arrProdNov.length-1].img, arrProdNov[arrProdNov.length-1].precio ,"cont-card-nov");
        } else {
            console.log("id prod distinto de 0")
            setCard(arrProdNov[ubProd-1].nombre, arrProdNov[ubProd-1].descripcion, "./img/" + arrProdNov[ubProd-1].img, arrProdNov[ubProd-1].precio,"cont-card-nov");
        } ;
    }
    $(".cont-card-nov .img__card").css("animation-name", "ani-translate-ing")
    $(".cont-card-nov .img__card").css("animation-duration", "1.5s")
})

$(".card-btn.sig-nov").click(function(){
    let tit = $(".cont-card-nov h3.card__tit");
    $(".cont-card-nov .img__card").remove();
    
    for(let i=0 ; i<tit.length ; i++){
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
        } else if (idProd == arrProdNov.length){
            console.log("ultimo");
            setCard(arrProdNov[0].nombre, arrProdNov[0].descripcion, "./img/" + arrProdNov[0].img, arrProdNov[0].precio, "cont-card-nov");
        } else {
            console.log("encontro y no es el ultimo")
            setCard(arrProdNov[ubProd+1].nombre, arrProdNov[ubProd+1].descripcion, "./img/" + arrProdNov[ubProd+1].img, arrProdNov[ubProd+1].precio, "cont-card-nov");
        } ;
    }
    $(".cont-card-nov .img__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-nov .img__card").css("animation-duration", "1.5s");
})




