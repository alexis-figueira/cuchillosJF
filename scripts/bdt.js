// fetch('http://localhost/bdtconnect.php', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//     },
//     body: JSON.stringify({
//         accion: 'obtenerDatos' // Asegúrate de que la acción sea correcta
//     })
// })
// .then(response => response.json())
// .then(data => {
//     console.log('Respuesta del servidor perri:', data);
//     // Aquí puedes manejar los datos recibidos
// })
// .catch(error => {
//     console.error('Error en la solicitud:', error);
// });


function Connect(QUERY, ACT){
    fetch('http://localhost/bdtconnect.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            ACTION: ACT, // Asegúrate de que la acción sea correcta
            QUE : QUERY
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor perri:', data);
        // Aquí puedes manejar los datos recibidos
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
    }); 
}
