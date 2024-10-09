// ok ------------------------------------------------------------------------------------
// async function Connect(QUERY, ACT) {
//     try {
//         const response = await fetch('http://localhost/bdtconnect.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify({
//                 ACTION: ACT,
//                 QUE: QUERY
//             })
//         });
//         const data = await response.json();
//         // console.log('Respuesta del servidor perri:', data);
//         return data; // Retorna los datos cuando estén listos
//     } catch (error) {
//         console.error('Error en la solicitud:', error);
//     }
// }

// async function QuerySelect(QUERY) {
//     const data = await Connect(QUERY, 'select');
//     return data; // Espera los datos antes de retornar
// }
// ok ------------------------------------------------------------------------------------

async function Procesar(link, info) {
    try {
        const response = await fetch('http://localhost/bdtconnect.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                BACK: link,
                DATA: info
            })
        });
        const RETURN = await response.json();
        return RETURN; 
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
}