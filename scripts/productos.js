/* Formato card
<div class="img__card">
    <h3 class="card__item card__tit">Daga esterillada</h3>
    <p class="card__item card__desc">medidas 15cm a 30cm</p>
    <img class="card__item card__lnk" src="./img/cuchillo alfombardo.jpg" alt="">
    <p class="card__item card__prc">$3500</p>
</div> */


var arrProductos = [] ;

$(document).ready(function(){
    $.ajax({
        url: "../JSON/productos.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        arrProductos = resultado;
        console.log(arrProductos.cuchillos);
        console.log(resultado);
        for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
        };
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status);
        console.log(error);
    })
})

$("#buscar").click(function(){
    console.log(arrProductos.cuchillos)
    let prodIngresado = $("#prodBuscado").val()
    
    if(prodIngresado == "cuchillos" || prodIngresado == "cuchillo" ){
        console.log("Indicaste " + prodIngresado)
    }else{
        console.log("indicaste otra cosa")
    }
})

function setCard (titulo, descripcion, imagen, precio, contenedor){
    console.log("hola");

    let card = document.createElement ("div");
    card.setAttribute("class", "img__card");
    $(".img__card").css("animation-duration", "0s");
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
    let text_prc = document.createTextNode (precio);
    card_prc.appendChild(text_prc);
    card_prc.setAttribute("class", "card__item card__prc");
    $(card).append(card_prc);
}

$(".item-cuch").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
        setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
    };
});

$(".item-mat").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.mates.length ; i++){
        setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
    };
});

$(".item-bomb").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.bombillas.length ; i++){
        setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
    };
});

$(".item-bol").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
        setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
    };
});


