<?php
include('php-includes/conexion.php');

$query = "SELECT uid FROM master ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['uid'];
    } else {
        // No hay registros en la tabla
        echo "no se escaneo la tarjeta";
    }
} else {
    // Error en la consulta
    echo 'Error en la consulta: ' . mysqli_error($con);
}

mysqli_close($con);
?>
