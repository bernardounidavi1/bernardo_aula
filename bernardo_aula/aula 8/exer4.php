<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 4</title></head>
<body>
  <h2>Área de um Retângulo</h2>
  <form method="post">
    <label>Lado A: <input type="number" name="a" step="0.01" required></label><br>
    <label>Lado B: <input type="number" name="b" step="0.01" required></label><br>
    <button type="submit">Calcular</button>
  </form>

  <?php
  if ($_POST) {
      $a = $_POST['a'];
      $b = $_POST['b'];
      $area = $a * $b;
      if ($area > 10)
          echo "<h1>A área do retângulo de lados $a e $b metros é $area m².</h1>";
      else
          echo "<h3>A área do retângulo de lados $a e $b metros é $area m².</h3>";
  }
  ?>
</body>
</html>
