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
    <div class="container mt-4">
        <h3 class="text-center">Agregar Cliente</h3>

        <form action="procesos.php" method="post" class="mt-4 mx-auto bg-secondary rounded py-2 px-3" style="max-width: 500px;">
            <input type="text" value="1" name="bandera" hidden>
            <fieldset>
                <label for="nombre" class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" id="" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="telefono" class="form-label">Telefono</label>
                <input class="form-control" type="tel" name="telefono" id="" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="dui" class="form-label">DUI</label>
                <input class="form-control" type="text" name="dui" id="" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="correo" class="form-label">Correo</label>
                <input class="form-control" type="email" name="correo" id="" required>
            </fieldset>
            <fieldset class="mt-2">
                <label for="direccion" class="form-label">Direccion</label>
                <input class="form-control" type="text" name="direccion" id="" required>
            </fieldset>
            <fieldset class="d-flex justify-content-center gap-2 mt-2">
                <button class="btn btn-success" type="submit">Guardar</button>
                <a href="./index.php" class="btn btn-primary">Volver</a>
            </fieldset>
        </form>
    </div>

</body>

</html>