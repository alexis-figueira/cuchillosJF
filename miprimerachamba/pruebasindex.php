<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>
</head>
<body>
    <h1>Carga de excel</h1>
    <form action="pruebas.php" method="POST" enctype = "multipart/form-data">
        <input type="file" name="fichero" accept=".xlsx">
        <br>
        <p>Ingrese el período a buscar</p>
        <label for="fIni">Fecha inicial: </label>
        <input type="date" id="fIni" name="fIni"  min="2024-03-01" max="2026-03-01">
        <label for="fFin">Fecha final: </label>
        <input type="date" id="fFin" name="fFin"  min="2024-03-01" max="2026-03-01">
        <br><br>
        
        
        <button type="submit">Enviar</button>
    </form>
</body>
</html>