<?php
// Este codigo lo creo en xampp htdocs y desde el bdt.js apunto a donde lo haya guardado. Esto para poder utilizar y combinar el liveserver con el servidor de php de xampp para utilizar la base de datos.

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'cuchillos_jf';
$username = 'root';
$password = '';
$port = '3306';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Leer los datos enviados por el frontend
    $postData = json_decode(file_get_contents("php://input"), true);

    // Verificar si los datos han sido enviados correctamente
    if ($postData === null) {
        echo json_encode(['error' => 'No se recibieron datos']);
        exit;
    }

    if (isset($postData['accion']) && $postData['accion'] === 'obtenerDatos') {
        // Realizar una consulta a la base de datos
        $stmt = $pdo->query('SELECT * FROM productos');
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Enviar los datos en formato JSON
        echo json_encode($datos);
    } else {
        echo json_encode(['error' => 'Acción no válida']);
    }
} catch (PDOException $e) {
    // Enviar error en caso de falla en la base de datos
    echo json_encode(['error' => $e->getMessage()]);
}
?>