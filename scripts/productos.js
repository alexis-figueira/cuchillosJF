// Productos por tipo
$(".item-cuch").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
        setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
    };
    $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
    $(".article-prod .img__card").css("animation-duration", "1.5s");
});

$(".item-mat").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.mates.length ; i++){
        setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
    };
    $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
    $(".article-prod .img__card").css("animation-duration", "1.5s");
});

$(".item-bomb").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.bombillas.length ; i++){
        setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
    };
    $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
    $(".article-prod .img__card").css("animation-duration", "1.5s");
});

$(".item-bol").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
        setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
    };
    $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
    $(".article-prod .img__card").css("animation-duration", "1.5s");
});

// Productos por busqueda
$("#buscar").click(fbp);

$("#prodBuscado").keypress(function(e){
    if (e.keyCode == 13){
        fbp();
    }
});

