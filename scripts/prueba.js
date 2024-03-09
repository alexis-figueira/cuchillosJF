/*hay que probar todo */
let variable = $.ajax({
    url: "../JSON/baseProd.json",
    type: "GET",
    dataType: "json"
}).done(function(resultado){
    console.log(typeof resultado);
}).fail(function(xhr, status, error){
    console.log(xhr); 
    console.log(status) ;
    console.log(error);
})
