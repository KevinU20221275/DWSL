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
<body>
    <?php
    // ver errorres de php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);


        include_once('./conf/conf.php');
        $objeto = new Conexion();

        $conexion = $objeto->conectar();

        $query = "SELECT * FROM cliente";
        $preparacion = $conexion->prepare($query);
        $preparacion->execute();

        $clientes = $preparacion->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="container">

    <div class="container d-flex justify-content-between mt-2 p-3">
<h3>Listado de Clientes</h3>
        <a class="btn btn-success" href="registro.php">Agregar</a>
    </div>

    <table class="table table-responsive table-striped table-hover table-bordered">
        <thead class="text-center">
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Dui</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Acciones</th>

        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente) {?>
                <tr>
                    <td><?php echo $cliente['id'];?></td>
                    <td><?php echo $cliente['nombre'];?></td>
                    <td><?php echo $cliente['telefono'];?></td>
                    <td><?php echo $cliente['dui'];?></td>
                    <td><?php echo $cliente['correo'];?></td>
                    <td><?php echo $cliente['direccion'];?></td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="modificar.php?id=<?php echo $cliente['id'];?>">Editar</a>
                        <a class="btn btn-danger" href="procesos.php?id=<?php echo $cliente['id'];?>">Eliminar</a>
                    </td>

                </tr>
            <?php }?>
        </tbody>
    </table>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>