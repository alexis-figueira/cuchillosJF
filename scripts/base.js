var arrProductos = [] ;
var arrProdDest = [] ;
var arrProdNov = [] ;

/*cant de card mostradas en inicio*/ 
var longDest = 3 ;
var longNov = 2 ;

/* json productos */
$(document).ready(function(){
    $.ajax({
        url: "../JSON/productos.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        arrProductos = resultado;
        for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"miContenedor");
            
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status);
        console.log(error);
    })
})

/*Json dest*/ 
$(document).ready(function(){
    $.ajax({
        url: "../JSON/baseDest.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        arrProdDest = resultado;
        for (let i=0 ; i<longDest; i++){
            setCard(arrProdDest[i].nombre, arrProdDest[i].descripcion, "../img/"+arrProdDest[i].img, arrProdDest[i].precio,"cont-card-dest");
        };
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
        for (let i=0 ; i<longNov; i++){
            setCard(arrProdNov[i].nombre, arrProdNov[i].descripcion, "../img/"+arrProdNov[i].img, arrProdNov[i].precio,"cont-card-nov");
        };
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status) ;
        console.log(error);
    })
})

/*Card*/
function setCard (titulo, descripcion, imagen, precio, contenedor){
    let card = document.createElement ("div");
    card.setAttribute("class", "img__card");
    $("."+contenedor).append(card);
    
    let card_tit = document.createElement("h3");
    let text_tit = document.createTextNode(titulo);
    card_tit.appendChild(text_tit);
    card_tit.setAttribute("class", "card__item card__tit");
    $(card).append(card_tit);

    let card_desc = document.createElement("p");
    let text_desc = document.createTextNode(descripcion);
    card_desc.appendChild(text_desc);
    card_desc.setAttribute("class", "card__item card__desc");   
    $(card).append(card_desc);
    
    let card_img = document.createElement("img");
    card_img.setAttribute("src", imagen);
    card_img.setAttribute("class", "card__item card__lnk");
    $(card).append(card_img);

    let card_prc = document.createElement("p");
    let text_prc = document.createTextNode ("$" + precio);
    card_prc.appendChild(text_prc);
    card_prc.setAttribute("class", "card__item card__prc");
    $(card).append(card_prc);
}