<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<style>
  body {
    background: #000c;
    height: 100vh;
    color: #fff;
    display: flex;
    justify-content: center;
    align-content: center;
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
      display: grid;
      grid-template-columns: 80px 1fr;
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

    p {
      text-align: center;
      color: red;
      margin-top: 0;
    }
  }
</style>

<body>
  <form action="principal.php" method="POST">
    <h2>Login</h2>
    <fieldset>
      <label for="user">Usuario: </label>
      <input type="text" name="user">
    </fieldset>
    <fieldset>
      <label for="password">Contraseña: </label>
      <input type="password" name="password">
    </fieldset>
    <fieldset style="display:flex; justify-content:center;">
      <button>Login</button>
    </fieldset>
    <?php
    if (isset($message)) {
      echo "<p>$message</p>";
    }
    ?>
  </form>

</body>

</html>