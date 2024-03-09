/*hay que probar todo */

let objeto =$.ajax({
        url: "../JSON/baseProd.json",
        type: "GET",
        dataType: "json"
    }).done(function(resultado){
        console.log(resultado);
        




    }).fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status) ;
        console.log(error);
    })






















/* {
    "producto" : [
        {
            "id" :  1 ,
            "nombre" : "Mi primer cuchillo",
            "precio" : 3500,
            "img": "./img/cuchillo alfombardo.jpg"
        },
        {
            "id" :  2 ,
            "nombre" : "Mi Segundo cuchillo",
            "precio" : 2200,
            "img": "./img/cuchillos.jpg"
        },
        {
            "id" :  3 ,
            "nombre" : "Mi tercero cuchillo",
            "precio" : 1600,
            "img": "./img/juego de picnic.jpg"
        },
        {
            "id" :  4 ,
            "nombre" : "Mi cuarto cuchillo",
            "precio" : 1900,
            "img": "./img/cuchNegro.jpg"
        },
        {
            "id" :  5 ,
            "nombre" : "Mi quinto cuchillo",
            "precio" : 4500,
            "img": "./img/cuchNegro.jpg"
        },
        {
            "id" :  6 ,
            "nombre" : "Mi sexto cuchillo",
            "precio" : 5300,
            "img": "./img/cuchNegro.jpg"
        },
        {
            "id" :  7 ,
            "nombre" : "Mi Septimo cuchillo",
            "precio" : 6000,
            "img": "./img/cuchNegro.jpg"
        } 
    ]
}
*/