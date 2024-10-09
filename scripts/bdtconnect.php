<?php
// Este codigo lo creo en xampp htdocs y desde el bdt.js apunto a donde lo haya guardado. Esto para poder utilizar y combinar el liveserver con el servidor de php de xampp para utilizar la base de datos.
header("Access-Control-Allow-Origin: *"); // Permitir todas las conexiones de cualquier origen (puedes restringirlo según sea necesario)
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, OPTIONS"); // Incluye OPTIONS si Chrome está haciendo preflight requests

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'cuchillos__figueira';
$username = 'root';
$password = '';
$port = '3306';

$GLOBALS['QWE'] = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password);
$GLOBALS['QWE']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ok ------------------------------------------------------------------------------------
// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // Leer los datos enviados por el frontend
//     $postData = json_decode(file_get_contents("php://input"), true);
//     // Verificar si los datos han sido enviados correctamente
//     if ($postData === null) {
//         echo json_encode(['error' => 'No se recibieron datos']);
//         exit;
//     }
//     if (isset($postData['ACTION']) && $postData['ACTION'] === 'select') {
//         // Realizar una consulta a la base de datos
//         $stmt = $pdo->query($postData['QUE']);
//         $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         // Enviar los datos en formato JSON
//         echo json_encode($datos);
//     } else {
//         echo json_encode(['error' => 'Acción no válida']);
//     }
// } catch (PDOException $e) {
//     // Enviar error en caso de falla en la base de datos
//     echo json_encode(['error' => $e->getMessage()]);
// }
// ok ------------------------------------------------------------------------------------

function QuerySelect($QUE, $CON = "QWE"){
    try{
        $stmt = $GLOBALS[$CON]->query($QUE);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($datos);
    }catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

$postData = json_decode(file_get_contents("php://input"), true);
if ($postData === null) {
    echo json_encode(['error' => 'No se recibieron datos']);
    exit;
} 
if (isset($postData['BACK']) && $postData['BACK'] === 'Procesar_Productos'){
    $RETURN = QuerySelect("SELECT * FROM `productos` WHERE 1");
}
else if(isset($postData['BACK']) && $postData['BACK'] === 'Procesar_Temporales') {
    $RETURN = QuerySelect("SELECT * FROM `productos` WHERE `".$postData['DATA']."`");
}
else{
    echo json_encode(['error' => 'Acción no válida']);
}
?>