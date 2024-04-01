// Productos por botones
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

/// Funcion Busqueda Producto
function fbp (){ 
    let prodIngresado = $("#prodBuscado").val()
    let encontro = false ;
    if (prodIngresado == null || prodIngresado == ""){
        return;
    };
    if(prodIngresado.toUpperCase() == "CUCHILLO" || prodIngresado.toUpperCase() == "CUCHILLOS" ){
        encontro = true;
        $("#prodBuscado").val("");
        $(".img__card").remove();
        for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }else if(prodIngresado.toUpperCase() == "MATE" || prodIngresado.toUpperCase() == "MATES" ){
        encontro = true;
        $("#prodBuscado").val("");
        $(".img__card").remove();
        for (let i=0 ; i<arrProductos.mates.length ; i++){
            setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }else if(prodIngresado.toUpperCase() == "BOMBILLA" || prodIngresado.toUpperCase() == "BOMBILLAS" ){
        encontro = true;
        $("#prodBuscado").val("");
        $(".img__card").remove();
        for (let i=0 ; i<arrProductos.bombillas.length ; i++){
            setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }else if(prodIngresado.toUpperCase() == "BOLEADORA" || prodIngresado.toUpperCase() == "BOLEADORAS" ){
        encontro = true;
        $("#prodBuscado").val("");
        $(".img__card").remove();
        for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
            setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing");
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }else {
        $(".img__card").remove();
        for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
            if (arrProductos.cuchillos[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
                encontro = true;
                console.log("encontre un producto con la nueva funcion y es " + arrProductos.cuchillos[i].nombre.toUpperCase());
                setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
            }
        };
        for (let i=0 ; i<arrProductos.mates.length ; i++){
            if (arrProductos.mates[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
                encontro = true;
                console.log("encontre un producto con la nueva funcion y es " + arrProductos.mates[i].nombre.toUpperCase());
                setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
            }
        };
        for (let i=0 ; i<arrProductos.bombillas.length ; i++){
            if (arrProductos.bombillas[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
                encontro = true;
                console.log("encontre un producto con la nueva funcion y es " + arrProductos.bombillas[i].nombre.toUpperCase());
                setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
            }
        };
        for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
            if (arrProductos.boleadoras[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
                encontro = true;
                console.log("encontre un producto con la nueva funcion y es " + arrProductos.boleadoras[i].nombre.toUpperCase());
                setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
            }
        };





        $(".article-prod .img__card").css("animation-name", "ani-translate-ing");
        $(".article-prod .img__card").css("animation-duration", "1.5s");
        
        



    }
    if(encontro == false){
        Swal.fire({
            title: "No se encontro ningún producto",
            text: "Intente de nuevo",
            icon: "warning"
          });
        $("#prodBuscado").val("");
        for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
        };
        $(".article-prod .img__card").css("animation-name", "ani-translate-ing")
        $(".article-prod .img__card").css("animation-duration", "1.5s");
    }
};