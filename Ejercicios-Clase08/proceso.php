<?php
$num1 = isset($_POST['n1']) ? $_POST['n1'] : "";
$num2 = isset($_POST['n2']) ? $_POST['n2'] : "";
$operador = isset($_POST['operador']) ? $_POST['operador'] : "";


switch ($operador) {
    case '+':
        $repuesta = $num1 + $num2;
        break;
    case '-':
        $repuesta = $num1 - $num2;
        break;
    case '*':
        $repuesta = $num1 * $num2;
        break;
    case '/':
        $repuesta = $num1 / $num2;
        break;
    default:
        $repuesta = "Operacion no valida";
        break;
}

?>
<style>
    body {
        background: #222;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;

        section {
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 1rem 1.5rem;
        }
    }
</style>

<body>
    <section>
        <p>
            El resultado de la operacion es: <?= $repuesta ?>
        </p>
    </section>
</body>