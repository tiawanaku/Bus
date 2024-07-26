<?php
include ('php-includes/conexion.php');
include ('php-includes/check-login.php');
$userid = $_SESSION['userid'];

// Obtener la fecha actual
$currentDate = date('Y-m-d');

// Consulta SQL para contar boletos de la fecha actual
$query = "SELECT uid FROM boletos_validos WHERE fecha LIKE '$currentDate%'";

// Ejecutar la consulta
$result = mysqli_query($con, $query);

// Contar los boletos
$totalBoletos = mysqli_num_rows($result);

// Consulta SQL para contar boletos regulares y preferenciales
$regularesQuery = "SELECT COUNT(*) AS count FROM boletos_validos WHERE uid LIKE '469471A594880' AND fecha LIKE '$currentDate%'";
$preferencialesQuery = "SELECT COUNT(*) AS count FROM boletos_validos WHERE uid LIKE 'A2151F51' AND fecha LIKE '$currentDate%'";

$regularesResult = mysqli_query($con, $regularesQuery);
$preferencialesResult = mysqli_query($con, $preferencialesQuery);

$regularesCount = mysqli_fetch_assoc($regularesResult)['count'];
$preferencialesCount = mysqli_fetch_assoc($preferencialesResult)['count'];

// Devolver datos en formato JSON
echo json_encode([
    'currentDate' => $currentDate,
    'totalBoletos' => $totalBoletos,
    'regularesCount' => $regularesCount,
    'preferencialesCount' => $preferencialesCount
]);
?>
