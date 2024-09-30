<?php
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

    if ($postData['accion'] === 'obtenerDatos') {
        // Realizar una consulta a la base de datos
        $stmt = $pdo->query('SELECT * FROM productos');
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los datos en formato JSON
        echo json_encode($datos);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>