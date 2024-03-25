/*
<div class="container" style="margin: 50px;">
    <input type="text" placeholder="Ingrese un producto" id="prodBuscado">
    <input type="button" value="buscar" id="buscar">
</div>
*/
var productos ;

$(document).ready(function(){
    $.ajax({
        url: "../JSON/prueba.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        productos = resultado;
        // console.log(productos)
        // console.log(resultado)
    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status);
        console.log(error);
    })
})

$("#buscar").click(function(){
    let prodIngresado = $("#prodBuscado").val()
    
    if(prodIngresado == "cuchillos" || prodIngresado == "cuchillo" ){
        console.log("Indicaste " + prodIngresado)
    }else{
        console.log("indicaste otra cosa")
    }

})


{/* <div class="img__card">
    <h3 class="card__item card__dest-tit">Daga esterillada</h3>
    <p class="card__item card__dest-desc">medidas 15cm a 30cm</p>
    <img class="card__item card__dest-lnk" src="./img/cuchillo alfombardo.jpg" alt="">
    <p class="card__item card__dest-prc">$3500</p>
</div>  */}

function createCard (tit, desc, img, prc){
    


}





