<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Exercício 1 - Soma de Três Valores</title>
</head>
<body>
  <h2>Soma de Três Valores</h2>

  <form method="post">
    <label>Valor 1: <input type="number" name="v1" required></label><br>
    <label>Valor 2: <input type="number" name="v2" required></label><br>
    <label>Valor 3: <input type="number" name="v3" required></label><br>
    <button type="submit">Calcular</button>
  </form>

  <?php
  if ($_POST) {
      $v1 = $_POST['v1'];
      $v2 = $_POST['v2'];
      $v3 = $_POST['v3'];
      $soma = $v1 + $v2 + $v3;

      if ($v1 > 10) {
          echo "<p style='color:blue;'>Resultado: $soma</p>";
      } elseif ($v2 < $v3) {
          echo "<p style='color:green;'>Resultado: $soma</p>";
      } elseif ($v3 < $v1 && $v3 < $v2) {
          echo "<p style='color:red;'>Resultado: $soma</p>";
      } else {
          echo "<p>Resultado: $soma</p>";
      }
  }
  ?>
</body>
</html>
