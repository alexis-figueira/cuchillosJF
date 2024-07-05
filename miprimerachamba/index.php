<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
</head>
<body>
    <h1>Carga de excel</h1>
    <form action="archivoexc.php" method="POST" enctype = "multipart/form-data">
        <input type="file" name="fichero" accept=".xlsx">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>


