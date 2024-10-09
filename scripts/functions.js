function setCard (id=0, titulo, medidas, imagen, precio, contenedor){
    let card = document.createElement ("div");
    card.setAttribute("class", "prod__card");
    card.setAttribute("id", id); /// ID y poner a la funcion y al base 
    
    $("."+contenedor).append(card);

    let card_tit = document.createElement("h3");
    let text_tit = document.createTextNode(titulo);
    card_tit.appendChild(text_tit);
    card_tit.setAttribute("class", "card__item card__tit");
    $(card).append(card_tit);
    
    let card_desc = document.createElement("p");
    let text_desc = document.createTextNode(medidas);
    card_desc.appendChild(text_desc);
    card_desc.setAttribute("class", "card__item card__desc");  
    $(card).append(card_desc);
    
    let card_img = document.createElement("img");
    card_img.setAttribute("src", imagen);
    card_img.setAttribute("class", "card__item card__lnk");
    $(card).append(card_img);
    
    let card_prc = document.createElement("p");
    let text_prc = document.createTextNode ("Precio base $" + precio);
    card_prc.appendChild(text_prc);
    card_prc.setAttribute("class", "card__item card__prc");
    $(card).append(card_prc);
}

/*function openCard(lala){
    //console.log(evento.currentTarget);
    //let miCarta = evento.currentTarget;
    //let miProd = miCarta.firstChild.innerHTML ;
    //console.log("miprod es " + miProd);
    
    console.log(lala)

    $(".miModal .prod__card").remove();
    $(".miModal").css("display", "block");

    let encontro = false;

    for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
        console.log(arrProductos.cuchillos[i].nombre)
        if (arrProductos.cuchillos[i].nombre == lala){
            encontro = true;
            setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.mates.length ; i++){
        if (arrProductos.mates[i].nombre == lala){
            encontro = true;
            setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.bombillas.length ; i++){
        if (arrProductos.bombillas[i].nombre == lala){
            encontro = true;
            setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"miModal");
            return;
        }
    };
    for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
        if (arrProductos.boleadoras[i].nombre == lala){
            encontro = true;
            setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"miModal");
            return;
        }
    };

    if (encontro==false){
        alert ("Error al encontrar el producto")
    }
}
*/


// /* Funcion Busqueda Producto */
/* function fbp (){ 
//     let prodIngresado = $("#prodBuscado").val()
//     let encontro = false ;
//     if (prodIngresado == null || prodIngresado == ""){
//         return;
//     };
//     if(prodIngresado.toUpperCase() == "CUCHILLO" || prodIngresado.toUpperCase() == "CUCHILLOS" ){
//         encontro = true;
//         $("#prodBuscado").val("");
//         $(".prod__card").remove();
//         for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
//             setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing")
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }else if(prodIngresado.toUpperCase() == "MATE" || prodIngresado.toUpperCase() == "MATES" ){
//         encontro = true;
//         $("#prodBuscado").val("");
//         $(".prod__card").remove();
//         for (let i=0 ; i<arrProductos.mates.length ; i++){
//             setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing")
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }else if(prodIngresado.toUpperCase() == "BOMBILLA" || prodIngresado.toUpperCase() == "BOMBILLAS" ){
//         encontro = true;
//         $("#prodBuscado").val("");
//         $(".prod__card").remove();
//         for (let i=0 ; i<arrProductos.bombillas.length ; i++){
//             setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing")
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }else if(prodIngresado.toUpperCase() == "BOLEADORA" || prodIngresado.toUpperCase() == "BOLEADORAS" ){
//         encontro = true;
//         $("#prodBuscado").val("");
//         $(".prod__card").remove();
//         for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
//             setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing");
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }else { ///No se ingreso un tipo
//         $(".prod__card").remove();
//         for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
//             if (arrProductos.cuchillos[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
//                 encontro = true;
//                 console.log("encontre un producto con la nueva funcion y es " + arrProductos.cuchillos[i].nombre.toUpperCase());
//                 setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
//             }
//         };
//         for (let i=0 ; i<arrProductos.mates.length ; i++){
//             if (arrProductos.mates[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
//                 encontro = true;
//                 console.log("encontre un producto con la nueva funcion y es " + arrProductos.mates[i].nombre.toUpperCase());
//                 setCard(arrProductos.mates[i].nombre, arrProductos.mates[i].descripcion, "../img/"+arrProductos.mates[i].img, arrProductos.mates[i].precio,"article-prod");
//             }
//         };
//         for (let i=0 ; i<arrProductos.bombillas.length ; i++){
//             if (arrProductos.bombillas[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
//                 encontro = true;
//                 console.log("encontre un producto con la nueva funcion y es " + arrProductos.bombillas[i].nombre.toUpperCase());
//                 setCard(arrProductos.bombillas[i].nombre, arrProductos.bombillas[i].descripcion, "../img/"+arrProductos.bombillas[i].img, arrProductos.bombillas[i].precio,"article-prod");
//             }
//         };
//         for (let i=0 ; i<arrProductos.boleadoras.length ; i++){
//             if (arrProductos.boleadoras[i].nombre.toUpperCase().includes(prodIngresado.toUpperCase())){
//                 encontro = true;
//                 console.log("encontre un producto con la nueva funcion y es " + arrProductos.boleadoras[i].nombre.toUpperCase());
//                 setCard(arrProductos.boleadoras[i].nombre, arrProductos.boleadoras[i].descripcion, "../img/"+arrProductos.boleadoras[i].img, arrProductos.boleadoras[i].precio,"article-prod");
//             }
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing");
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }
//     if(encontro == false){
//         Swal.fire({
//             title: "No se encontro ningún producto",
//             text: "Intente de nuevo",
//             icon: "warning"
//           });
//         for (let i=0 ; i<arrProductos.cuchillos.length ; i++){
//             setCard(arrProductos.cuchillos[i].nombre, arrProductos.cuchillos[i].descripcion, "../img/"+arrProductos.cuchillos[i].img, arrProductos.cuchillos[i].precio,"article-prod");
//         };
//         $(".article-prod .prod__card").css("animation-name", "ani-translate-ing")
//         $(".article-prod .prod__card").css("animation-duration", "1.5s");
//     }
//     $("#prodBuscado").val("");
 }; */