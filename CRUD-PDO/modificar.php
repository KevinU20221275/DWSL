<?php
include_once('./conf/conf.php');
$objeto = new Conexion();

$conexion = $objeto->conectar();

$id = $_GET['id'];

$query = "SELECT * FROM cliente WHERE id = :id";
$resultado = $conexion->prepare($query);
$resultado->bindValue(':id', $id, PDO::PARAM_INT);
$resultado->execute();

$cliente = $resultado->fetch(PDO::FETCH_ASSOC);
if (!$cliente) {
    die("No se encontraron datos para este cliente.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="d-flex justify-content-center h-100">
    <div class="container mt-5" >

        <h3 class="text-center">Actualizar Cliente</h3>
        <form class="mt-4 mx-auto bg-secondary rounded py-2 px-3" action="procesos.php" method="post" style="max-width: 500px;">
            <input type="text" value="2" name="bandera" hidden>
            <input type="text" value="<?= $cliente['id'] ?>" name="id" hidden>
            <fieldset>
                <label for="nombre" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="" value="<?= $cliente['nombre'] ?>" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="telefono" class="form-label">Telefono</label>
                <input class="form-control" type="tel" name="telefono"  id="" value="<?= $cliente['telefono'] ?>" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="dui" class="form-label">DUI</label>
                <input class="form-control" type="text" name="dui" id="" value="<?= $cliente['dui'] ?>" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="correo" class="form-label">Correo</label>
                <input class="form-control" type="email" name="correo" id="" value="<?= $cliente['correo'] ?>" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="direccion" class="form-label">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="" value="<?= $cliente['direccion'] ?>" required>
            </fieldset>
            <fieldset class="d-flex justify-content-center gap-2 mt-2">
                <button class="btn btn-warning" type="submit">Editar</button>
                <a href="./index.php" class="btn btn-primary">Volver</a>
            </fieldset>
        </form>
    </div>

</body>

</html>