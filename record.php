<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "busmunicipal";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$uid = $_POST['uid'];
$ci_usuario = $_POST['ci_usuario'];
$nombre = $_POST['nombre'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
// $password = $_POST['password'];
$tipo_tarjeta = $_POST['tipo_tarjeta'];
$saldo = $_POST['saldo'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO tarjetas_validas (uid, ci_usuario, nombre, ape_paterno, ape_materno, password, tipo_tarjeta, saldo)
        VALUES ('$uid', '$ci_usuario', '$nombre', '$ape_paterno', '$ape_materno', '$tipo_tarjeta', '$saldo')";

if ($conn->query($sql) === TRUE) {
    // Mostrar mensaje de éxito
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro Exitoso</title>
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            ¡Registro creado exitosamente!
        </div>
        <p>Redirigiendo en <span id="countdown">3</span> segundos...</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        var countdown = document.getElementById("countdown");
        var seconds = 3;
        var interval = setInterval(function() {
            seconds--;
            countdown.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = "http://localhost/Bus/vender_tarjeta.php";
            }
        }, 1000);
    </script>
</body>
</html>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
