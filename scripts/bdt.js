const mysql = require('mysql');

function respuesta (){
    const conection = mysql.createConnection ({
        host:'localhost',
        user:'root',
        password:'',
        database:'cuchillos_jf'
    });

    conection.connect( (err) => {
        if(err) throw err ;
        console.log ('la conexión funciona');
    });

    const devolucion = conection.query('SELECT * from productos', (err,rows) => {
            if(err) throw err ;
            console.log ('los datos de la tabla son:');
            console.log (rows);
        });

    conection.end();
    return devolucion ;  
}


console.log("ahora muestro los datos en respuesta")
console.log(respuesta())

setTimeout(function(){
    console.log("Hola Mundo");
}, 100);
console.log("setTimeout() Ejemplo...");


console.log("acabo de mostrar")
