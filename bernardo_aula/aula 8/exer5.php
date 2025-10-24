<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 5</title></head>
<body>
  <h2>Área de um Triângulo Retângulo</h2>
  <form method="post">
    <label>Base (m): <input type="number" name="base" step="0.01" required></label><br>
    <label>Altura (m): <input type="number" name="altura" step="0.01" required></label><br>
    <button type="submit">Calcular</button>
  </form>

  <?php
  if ($_POST) {
      $base = $_POST['base'];
      $altura = $_POST['altura'];
      $area = ($base * $altura) / 2;
      echo "<p>A área do triângulo é $area metros quadrados.</p>";
  }
  ?>
</body>
</html>
