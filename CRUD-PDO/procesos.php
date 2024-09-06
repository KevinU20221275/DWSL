<?php

include_once('./conf/conf.php');
$objeto = new Conexion();

$conexion = $objeto->conectar();


$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : "";
$id = isset($_POST['id'])? $_POST['id'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$telefono = isset($_POST['telefono'])? $_POST['telefono'] : "";
$dui = isset($_POST['dui'])? $_POST['dui'] : "";
$correo = isset($_POST['correo'])? $_POST['correo'] : "";
$direccion = isset($_POST['direccion'])? $_POST['direccion'] : "";

if($bandera == 1){
    $query = "INSERT INTO cliente (nombre, telefono, dui, correo, direccion) 
    VALUES (:nombre, :telefono,:dui ,:correo, :direccion)";
    $resultado = $conexion->prepare($query);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':telefono', $telefono);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);

    if ($resultado->execute()) {
        header("Location: ./index.php");
    } else {
        echo "Error al insertar los datos.";
    }
    
} else if($bandera == 2){
    $query = "UPDATE cliente SET nombre = :nombre, telefono = :telefono, dui = :dui, correo = :correo, direccion = :direccion WHERE id = :id";
    $resultado = $conexion->prepare($query);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':telefono', $telefono);
    $resultado->bindParam(':dui', $dui);
    $resultado->bindParam(':correo', $correo);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':id', $id);

    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar los datos.";
    }

} else {
    $idGet = isset($_GET["id"]) ? $_GET["id"] : "";
    $query = "DELETE FROM cliente WHERE id = :id";
    $resultado = $conexion->prepare($query);
    $resultado->bindParam(':id', $idGet);
    if ($resultado->execute()) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar los datos.";
    }
}

?>