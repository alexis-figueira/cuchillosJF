var destacados=[];
var novedades=[];
var productos=[];
var CDest = 4 ;
var CNov = 3 ;

$(document).ready(function(){
    (async () => {
        destacados = await Procesar("Procesar_Temporales", "destacado");
        // console.log("Mis destacados", destacados);
        for (let i=0 ; i<CDest; i++){
            setCard(destacados[i].producto_id ,destacados[i].nombre, destacados[i].medidas, "../img/"+destacados[i].img + ".jpg", destacados[i].precio,"cont-card-dest");
        };
    })();
    (async () => {
        novedades = await Procesar("Procesar_Temporales", "novedad");
        // console.log("Mis novedades", novedades);
        for (let i=0 ; i<CNov; i++){
            setCard(novedades[i].producto_id ,novedades[i].nombre, novedades[i].medidas, "../img/"+novedades[i].img + ".jpg", novedades[i].precio,"cont-card-nov");
        }
    })();
    (async () => {
        productos = await Procesar("Procesar_Productos", "producto");
        console.log(productos)
    })();
});

/* Botones destacados */
$(".card-btn.ant-dest").click(function(){
    let cardId = [] ;
    $(".cont-card-dest .prod__card").each(function() {
        let id = $(this).attr('id');
        cardId.push(id) ;
    });
    $(".cont-card-dest .prod__card").remove();    
    for(let i = 0; i < cardId.length; i++) {
        let idProd = 0;
        let ubProd = -1;
        for(let j = 0; j < destacados.length; j++) { 
            if(cardId[i] == destacados[j].producto_id){
                idProd = destacados[j].producto_id;
                ubProd = j;
                break;
            }
        }
        // console.log(idProd);
        if (idProd == 0) {
            console.log("no se encontró el id");
        }else {
            let nuevaUb = ubProd - CDest ;
            if(nuevaUb < 0){nuevaUb = (destacados.length) + nuevaUb};
            setCard(
                destacados[nuevaUb].producto_id, 
                destacados[nuevaUb].nombre, 
                destacados[nuevaUb].medidas, 
                "../img/" + destacados[nuevaUb].img + ".jpg", 
                destacados[nuevaUb].precio, 
                "cont-card-dest"
            );
        }
    }
    $(".cont-card-dest .prod__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-dest .prod__card").css("animation-duration", "1.5s");
});
$(".card-btn.sig-dest").click(function(){
    let cardId = [] ;
    $(".cont-card-dest .prod__card").each(function() {
        let id = $(this).attr('id');
        cardId.push(id) ;
    });
    $(".cont-card-dest .prod__card").remove();     
    for(let i = 0; i < cardId.length; i++) {
        let idProd = 0;
        let ubProd = -1;
        for(let j = 0; j < destacados.length; j++) { 
            if(cardId[i] == destacados[j].producto_id){
                idProd = destacados[j].producto_id;
                ubProd = j;
                break;
            }
        }
        if (idProd == 0) {
            console.log("no se encontró el id");
        }else {
            let nuevaUb = ubProd + CDest ;
            console.log("ub card: " + ubProd + " nueva ub: " + nuevaUb);
            if(nuevaUb >= destacados.length){nuevaUb = nuevaUb - destacados.length}

            setCard(
                destacados[nuevaUb].producto_id, 
                destacados[nuevaUb].nombre, 
                destacados[nuevaUb].medidas, 
                "../img/" + destacados[nuevaUb].img + ".jpg", 
                destacados[nuevaUb].precio, 
                "cont-card-dest"
            );
        }
    }
    $(".cont-card-dest .prod__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-dest .prod__card").css("animation-duration", "1.5s");
});
/* Botones novedades */
$(".card-btn.ant-nov").click(function(){
    let cardId = [] ;
    $(".cont-card-nov .prod__card").each(function() {
        let id = $(this).attr('id');
        cardId.push(id) ;
    });
    $(".cont-card-nov .prod__card").remove();    
    for(let i = 0; i < cardId.length; i++) {
        let idProd = 0;
        let ubProd = -1;
        for(let j = 0; j < novedades.length; j++) { 
            if(cardId[i] == novedades[j].producto_id){
                idProd = novedades[j].producto_id;
                ubProd = j;
                break;
            }
        }
        // console.log(idProd);
        if (idProd == 0) {
            console.log("no se encontró el id");
        }else {
            let nuevaUb = ubProd - CNov ;
            if(nuevaUb < 0){nuevaUb = (novedades.length) + nuevaUb};
            setCard(
                novedades[nuevaUb].producto_id, 
                novedades[nuevaUb].nombre, 
                novedades[nuevaUb].medidas, 
                "../img/" + novedades[nuevaUb].img + ".jpg", 
                novedades[nuevaUb].precio, 
                "cont-card-nov"
            );
        }
    }
    $(".cont-card-nov .prod__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-nov .prod__card").css("animation-duration", "1.5s");
});
$(".card-btn.sig-nov").click(function(){
    let cardId = [] ;
    $(".cont-card-nov .prod__card").each(function() {
        let id = $(this).attr('id');
        cardId.push(id) ;
    });
    $(".cont-card-nov .prod__card").remove();     
    for(let i = 0; i < cardId.length; i++) {
        let idProd = 0;
        let ubProd = -1;
        for(let j = 0; j < novedades.length; j++) { 
            if(cardId[i] == novedades[j].producto_id){
                idProd = novedades[j].producto_id;
                ubProd = j;
                break;
            }
        }
        if (idProd == 0) {
            console.log("no se encontró el id");
        }else {
            let nuevaUb = ubProd + CNov ;
            if(nuevaUb >= novedades.length){nuevaUb = nuevaUb - novedades.length}

            setCard(
                novedades[nuevaUb].producto_id, 
                novedades[nuevaUb].nombre, 
                novedades[nuevaUb].medidas, 
                "../img/" + novedades[nuevaUb].img + ".jpg", 
                novedades[nuevaUb].precio, 
                "cont-card-nov"
            );
        }
    }
    $(".cont-card-nov .prod__card").css("animation-name", "ani-translate-sal")
    $(".cont-card-nov .prod__card").css("animation-duration", "1.5s");
});




