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


// function Connect(QUERY, ACT){
//     fetch('http://localhost/bdtconnect.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({
//             ACTION: ACT, // Asegúrate de que la acción sea correcta
//             QUE : QUERY
//         })
//     })
//     .then(response => response.json())
//     .then(data => {
//         console.log('Respuesta del servidor perri:', data);
//         return data ;
//         // Aquí puedes manejar los datos recibidos
//     })
//     .catch(error => {
//         console.error('Error en la solicitud:', error);
//     }); 
    
// }

// function QuerySelect(QUERY){
//     const data = Connect(QUERY, 'select');
//     return data ;
// }

async function Connect(QUERY, ACT) {
    try {
        const response = await fetch('http://localhost/bdtconnect.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                ACTION: ACT,
                QUE: QUERY
            })
        });
        const data = await response.json();
        // console.log('Respuesta del servidor perri:', data);
        return data; // Retorna los datos cuando estén listos
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
}

async function QuerySelect(QUERY) {
    const data = await Connect(QUERY, 'select');
    return data; // Espera los datos antes de retornar
}

