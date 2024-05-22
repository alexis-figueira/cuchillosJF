// const MySQL = require('mysql');

// const conection = MySQL.createConnection ({
// 	host:'localhost',
// 	user:'root',
// 	password:'',
// 	database:'northwind'
// });

// conection.connect( (err) => {
// 	if(err) throw err ;
// 	console.log ('la conexión funciona');
// });
// /*Nuevamente en terminal:
// 	node .\mysql.js  --> mysql es el nombre del archivo js donde esto codifica
// */

// conection.query('SELECT * from categories', (err,rows) => {
// 	if(err) throw err ;
// 	console.log('Muestro toda la tabla:');
// 	console.log(rows);
// 	console.log("Muestro la cantidad de resultados:");
// 	console.log(rows.length); 
// 	console.log("Muestro el primer registro y lo trabajo como un objeto(desde el resultado):");
// 	console.log(rows[0]);
// 	console.log(rows[0].CategoryName);
// 	console.log("Muestro el segundo registro y lo trabajo como un objeto(desde una variable)")
// 	const usuarioUno = rows[1];
// 	console.log(usuarioUno.CategoryID);
// 	console.log(usuarioUno.CategoryName);
// 	console.log(usuarioUno.Description);
// });

// /// Realizar un insert
// const insertar = "INSERT INTO categories (CategoryId, CategoryName, Description) VALUES (NULL, 'Hamburguesitas o ke', 'Son altas burgas con cheddar')"
// conection.query(insertar, (err,rows) => {
// 	if (err) throw err ;
// })

// /// Realizar un delete
// conection.query("DELETE FROM `categories` WHERE `CategoryID` = 9", (err, rows) =>{
// })

// conection.end()


