<?php
require('bootstrapCDN.php');

if (isset($_POST['reset']) && $_POST['reset'] == true) {
    $matematicas = "";
    $lenguaje = "";
    $ciencias = "";
    $sociales = "";
    $moral = "";
} else {
    $error = "";
    if (!empty($_POST)) {
        $matematicas = isset($_POST['matematicas']) ? $_POST['matematicas'] : "";
        $lenguaje = isset($_POST['lenguaje']) ? $_POST['lenguaje'] : "";
        $ciencias = isset($_POST['ciencias']) ? $_POST['ciencias'] : "";
        $sociales = isset($_POST['sociales']) ? $_POST['sociales'] : "";
        $moral = isset($_POST['moral']) ? $_POST['moral'] : "";


        if ($matematicas === "" || $lenguaje === "" || $ciencias === "" || $sociales === "" || $moral === "") {
            $error = "Debe llenar todos los campos";
        };

        if ($error == "") {
            $promedio = ($matematicas + $lenguaje + $ciencias + $sociales + $moral) / 5;
            $classText = $promedio >= 6 ? 'text-success' : 'text-danger';
            $message = $promedio >= 6 ? 'Aprobado' : 'Reprobado';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promediar Notas</title>
</head>
<style>
    section {
        max-width: 700px;
        margin: 10px auto;
        height: 100px;
    }

    form {
        max-width: 700px;
    }

    input {
        border: 2px solid #000;
        outline: none;
        width: 100%;
    }

    input:not(:in-range) {
        border: 2px solid red;
    }
</style>

<body>
    <section class="mx-auto">
        <h2 class="text-center">Promedio de Notas</h2>
        <p class="mb-1">El promedio del estudiante es:
            <span class="<?= isset($classText) ? $classText : '' ?>">
                <?= isset($promedio) ? $promedio : "" ?>
            </span>
        </p>
        <?php
        if (isset($error)) {
            echo "<p class='text-danger text-center mb-1'>$error</p>";
        }
        ?>
        <span>
            Estado:
            <strong class="<?= isset($classText) ? $classText : '' ?>">
                <?= isset($message) ? $message : "" ?>
            </strong>
        </span>
    </section>
    <form action="" method="POST" class="d-flex flex-column m-auto align-items-center mt-2">
        <table class="table table-striped border">
            <tr>
                <th>MATEMATICAS</th>
                <th>LENGUAJE</th>
                <th>CIENCIAS</th>
                <th>SOCIALES</th>
                <th>MORAL</th>
            </tr>
            <tr>
                <td><input type="number" name="matematicas" min="1" max="10" value="<?= $matematicas ?>"></td>
                <td><input type="number" name="lenguaje" min="1" max="10" value="<?= $lenguaje ?>"></td>
                <td><input type="number" name="ciencias" min="1" max="10" value="<?= $ciencias ?>"></td>
                <td><input type="number" name="sociales" min="1" max="10" value="<?= $sociales ?>"></td>
                <td><input type="number" name="moral" min="1" max="10" value="<?= $moral ?>"></td>
            </tr>
            </tr>
        </table>
        <button class="btn btn-primary" type="submit">Promediar</button>
    </form>
    <form action="" method="POST" class="d-flex flex-column m-auto align-items-center mt-2">
        <input type="hidden" name="reset" value="true">
        <button class="btn btn-secondary" type="submit">Promediar otro</button>
    </form>
</body>

</html>