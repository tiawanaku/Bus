<?php
include('php-includes/conexion.php');

if (isset($_POST['action']) && $_POST['action'] == 'updateUser') {
    $uid = $_POST['uid'];
    $ci_usuario = $_POST['ci_usuario'];
    $nombre = $_POST['nombre'];
    $ape_paterno = $_POST['ape_paterno'];
    $ape_materno = $_POST['ape_materno'];
    $password = $_POST['password'];
    $tipo_tarjeta = $_POST['tipo_tarjeta'];
    $saldo = $_POST['saldo'];
    $id = $_POST['id'];

    $query = "UPDATE users SET uid = ?, ci_usuario = ?, nombre = ?, ape_paterno = ?, ape_materno = ?, password = ?, tipo_tarjeta = ?, saldo = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('ssssssssi', $uid, $ci_usuario, $nombre, $ape_paterno, $ape_materno, $password, $tipo_tarjeta, $saldo, $id);

    if ($stmt->execute()) {
        echo "User updated successfully.";
    } else {
        echo "Error updating user.";
    }
}
?>
