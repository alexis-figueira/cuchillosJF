$(".item-cuch").click(function(){
    $(".img__card").remove();
    for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
        setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
    };
    $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
    $(".article-prod .img__card").css("animation-duration", "1.5s");
    $(".article-prod .img__card").css("z-index", "90");
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

$("#buscar").click(function(){
    let prodIngresado = $("#prodBuscado").val()
    if(prodIngresado.toUpperCase() == "CUCHILLO" || prodIngresado.toUpperCase() == "CUCHILLOS" ){
        alert("Indicaste " + prodIngresado);
        $("#prodBuscado").val("Ingrese un producto");
    }else if(prodIngresado.toUpperCase() == "MATE" || prodIngresado.toUpperCase() == "MATES" ){
        alert("Indicaste " + prodIngresado);
        $("#prodBuscado").val("Ingrese un producto");
    }else if(prodIngresado.toUpperCase() == "BOMBILLA" || prodIngresado.toUpperCase() == "BOMBILLAS" ){
        alert("Indicaste " + prodIngresado);
        $("#prodBuscado").val("Ingrese un producto");
    }else if(prodIngresado.toUpperCase() == "BOLEADORA" || prodIngresado.toUpperCase() == "BOLEADORAS" ){
        alert("Indicaste " + prodIngresado);
        $("#prodBuscado").val("Ingrese un producto");
    }else {
        alert("no se encontro ningun producto")
        $("#prodBuscado").val("Ingrese un producto");
    }
})