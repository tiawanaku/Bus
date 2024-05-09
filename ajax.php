<?php
include(__DIR__ . '/php-includes/conexion.php');

// Save Record
if(isset($_POST['save'])){
    $num_placa = $_POST['num_placa'];
    $num_bus = $_POST['num_bus'];
    $num_chasis = $_POST['num_chasis'];
    
    $query = "INSERT INTO buses (num_placa, num_bus, num_chasis) VALUES ('$num_placa', '$num_bus', '$num_chasis')";
    if(mysqli_query($con, $query)){
        echo "Registro agregado correctamente";
    } else{
        echo "Error al agregar registro: " . mysqli_error($con);
    }
}

// Delete Record
if(isset($_POST['delete'])){
    $id = $_POST['num_placa'];
    $query = "DELETE FROM buses WHERE num_placa = '$num_placa'";
    if(mysqli_query($con, $query)){
        echo "Registro eliminado correctamente";
    } else{
        echo "Error al eliminar registro: " . mysqli_error($con);
    }
}

// Fetch Records
if(isset($_GET['getRecords'])){
    $query = "SELECT * FROM buses";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<tr><th>Numero de Placa</th><th>Numero de Bus</th><th>Numero de Chasis</th><th>Acciones</th></tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['num_placa']."</td>";
            echo "<td>".$row['num_bus']."</td>";
            echo "<td>".$row['num_chasis']."</td>";
            echo "<td><button class='btn btn-danger delete' data-num_placa='".$row['num_placa']."'>Eliminar</button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else{
        echo "No se encontraron registros";
    }
}
?>
