<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #333;
        color: #fff;
        text-align: center;
    }

    input[type='submit'] {
        border-radius: 0.4rem;
        padding: 0.5rem 1rem;
        background-color: #f44;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #c12;
    }

    input[type="range"] {
        width: 100%;
    }

    main {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.5rem;
    }

    section {
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.4);
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 10px;
        align-items: center;
    }
</style>

<body>
    <div class="container">
        <h1>Reportes</h1>
        <main>
            <section>
                <h3>Productos con existencias menores a 10</h3>
                <form action="informeProductosExistencias.php" method="post">
                    <input type="submit" value="Generar PDF">
                </form>
            </section>
            <section>
                <h3>Productos vencidos</h3>
                <form action="informeProductosVencidos.php" method="post">
                    <input type="submit" value="Generar PDF">
                </form>
            </section>
            <section>
                <h3>Productos por rango de Precio</h3>
                <form action="informeProductosRango.php" method="post">
                    <label for="minPrice" id="minPriceLabel">Precio Minimo: $0 </label>
                    <input type="range" name="minPrice" id="minPrice" min="0" max="50" value="0">
                    <label for="maxPrice" id="maxPriceLabel">Precio Maximo: $10 </label>
                    <input type="range" name="maxPrice" id="maxPrice" min="0" max="50" value="10">
                    <input type="submit" value="Generar PDF">
                </form>
            </section>
        </main>

    </div>

    <script>
        const minPrice = document.getElementById('minPrice');
        const maxPrice = document.getElementById('maxPrice');
        const minPriceLabel = document.getElementById('minPriceLabel');
        const maxPriceLabel = document.getElementById('maxPriceLabel');

        minPrice.addEventListener('input', () => {
            minPriceLabel.innerText = `Precio Minimo: $${minPrice.value}`;
        });

        maxPrice.addEventListener('input', () => {
            maxPriceLabel.innerText = `Precio Maximo: $${maxPrice.value}`;
        });
    </script>
</body>

</html>