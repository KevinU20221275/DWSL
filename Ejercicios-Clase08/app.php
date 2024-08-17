<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora</title>
</head>
<style>
  body {
    background: #000c;
    color: #fff;
  }

  form {
    max-width: 400px;
    margin: auto;
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 5px;

    h2 {
      text-align: center;
    }

    fieldset {
      padding: 1rem 0.5rem;
      border: none;

      button {
        cursor: pointer;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        border: 1px solid transparent;
      }

      button:hover {
        background: inherit;
        color: #fff;
        border: 1px solid #fff;
      }
    }
  }
</style>

<body>
  <form action="proceso.php" method="POST">
    <h2>Calculadora</h2>
    <fieldset>
      <label for="n1">Ingrese el primer numero: </label>
      <input type="number" name="n1">
    </fieldset>
    <fieldset>
      <label for="operador">Seleccione el Operador</label>
      <select name="operador" id="">
        <option value="0">Seleccione</option>
        <option value="+">Sumar</option>
        <option value="-">Restar</option>
        <option value="*">Multiplicar</option>
        <option value="/">Dividir</option>
      </select>
    </fieldset>
    <fieldset>
      <label for="n2">Ingrese el segundo numero: </label>
      <input type="number" name="n2">
    </fieldset>
    <fieldset style="display:flex; justify-content:center;">
      <button>Calcular</button>
    </fieldset>
  </form>

</body>

</html>