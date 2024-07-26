<?php
include('php-includes/conexion.php');

$query = "SELECT uid FROM master ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['uid'];
} else {
    echo 'Error en la consulta: ' . mysqli_error($con);
}

mysqli_close($con);
?>
