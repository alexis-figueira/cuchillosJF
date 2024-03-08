let prodObt = $.ajax({
    url: "../JSON/baseProd.json",
    type: "GET",
    dataType: "json"
    }).done(function(resultado){
        console.log(resultado);
    })
    .fail(function(xhr, status, error){
        console.log(xhr); 
        console.log(status) ;
        console.log(error);
    })
    

    function Producto(id, nombre, precio, img){
        this.id = id;
        this.nombre = nombre;
        this.precio = precio;
        this.img = img;
    }

    let obj = JSON.parse(prodObt)

   console.log(obj)