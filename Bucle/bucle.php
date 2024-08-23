<?php
$images = [
    "pokemon1",
    "pokemon2",
    "pokemon3",
    "pokemon4",
    "pokemon5",
    "pokemon6",
    "pokemon7",
    "pokemon8",
    "pokemon9",
    "pokemon10",
    "pokemon11",
    "pokemon12"
];

$imagesToRender = "";
$errorMessage = "";
$imagesArrayLength = count($images);

$num = isset($_POST["num"]) ? $_POST["num"] : 1;
if ($num > 0 && $num <= $imagesArrayLength) {
    for ($i = 0; $i < $num; $i++) {
        $imagesToRender .= "<div class='pokeCard'><img src='./img/$images[$i].png' alt=''></div>";
    }
} else {
    $errorMessage = "<p class='danger'>El numero de imagenes debe estar entre 1 y $imagesArrayLength</p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria Pokemon</title>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    .danger {
        color: #f00;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    body {
        background-color: #ccc;
    }

    .container {
        max-width: 840px;
        margin: 0 auto;

        h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: .3rem;
        }
    }

    form {
        flex-direction: column;

        select {
            padding: 0 0.2rem;
            margin-bottom: 0.5rem;
            background-color: #fff;
            outline: none;
            border: none;
            border-radius: 0.3rem;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;

            option {
                color: #000;
                font-weight: 400;
            }

            & .greySlot {
                background-color: #aaa;
            }

            & .whiteSlot {
                background-color: #fff;
            }
        }

        button {
            display: inline-block;
            font-size: 1.1rem;
            padding: 0.8rem 1.5rem;
            margin-top: 0.4rem;
            background-color: #888;
            border: none;
            border-radius: 0.3rem;
            color: #fff;
            cursor: pointer;
            transition: .3s all ease-in-out;
        }

        button:hover {
            background-color: #fff;
            color: #000;
        }

    }

    .gallery {
        flex-wrap: wrap;
        border-radius: .4rem;
        gap: 0.5rem;
        margin-top: 1rem;
        padding: 0.5rem;

        & .pokeCard {
            width: 200px;
            padding: 0.4rem;
            border-radius: .5rem;
            background-color: #fff;

            img {
                object-fit: cover;
                width: 100%;
                filter: drop-shadow(0 0 10px rgba(0, 0, 0, 0.8));
            }
        }
    }
</style>

<body>
    <div class="container">
        <h2>Galeria Pokemon</h2>
        <form class="flex" action="bucle.php" method="POST">
            <div>
                <label for="num">Numero de imagenes a mostrar</label>
                <select name="num" id="">
                    <?php
                    for ($i = 1; $i <= $imagesArrayLength; $i++) {
                        $optionClass = $i % 2 ? 'greySlot' : 'whiteSlot';
                        if ($num == $i) {
                            echo "<option value='$i' class='$optionClass' selected >$i</option>";
                        } else {
                            echo "<option value='$i' class='$optionClass' >$i</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Mostrar Imagenes</button>
        </form>
        <div class="gallery flex">
            <?php echo $errorMessage; ?>
            <?php echo $imagesToRender; ?>
        </div>
    </div>
</body>

</html>