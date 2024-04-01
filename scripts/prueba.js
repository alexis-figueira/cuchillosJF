setCard ("Bombilla 2", "Descripcion", "../img/cuchillo alfombardo.jpg", "2500", "miContenedor");
setCard ("Mate 2", "Descripcion", "../img/cuchillo alfombardo.jpg", "2500", "miContenedor");



$(".img__card").click(function(evento){
    console.log(evento.currentTarget);
    let miCarta = evento.currentTarget;
    let miProd = miCarta.firstChild.innerHTML ;
    console.log("miprod es " + miProd);
    $(".miModal .img__card").remove();
    $(".miModal").css("display", "block");

    let encontro = false;

    for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
        console.log("vuelta cuchillos")
        if (arrProductos.cuchillos[i].nombre == miProd){
            encontro = true;
            console.log("encontre un cuchillo " + arrProductos.cuchillos[i].nombre);
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.mates.length ; i++){
        console.log("vuelta mates")
        if (arrProductos.mates[i].nombre == miProd){
            encontro = true;
            console.log("encontre un mate " + arrProductos.mates[i].nombre);
            setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.bombillas.length ; i++){
        console.log("vuelta bombillas")
        if (arrProductos.bombillas[i].nombre == miProd){
            encontro = true;
            console.log("encontre una bombilla " + arrProductos.bombillas[i].nombre);
            setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
        console.log("vuelta boleadoras")
        if (arrProductos.boleadoras[i].nombre == miProd){
            encontro = true;
            console.log("encontre una boleadora " + arrProductos.boleadoras[i].nombre);
            setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"miModal");
            return;
        }
    };

    if (encontro==false){
        alert ("No encontre el producto")
    }





})

$(".closeModal").click(function(){
    $(".miModal").css("display", "none");
})