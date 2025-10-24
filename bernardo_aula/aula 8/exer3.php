<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 3</title></head>
<body>
  <h2>Área de um quadrado</h2>
  <form method="post">
    <label>Lado (m): <input type="number" name="lado" step="0.01" required></label>
    <button type="submit">Calcular</button>
  </form>

  <?php
  if ($_POST) {
      $lado = $_POST['lado'];
      $area = $lado * $lado;
      echo "<p>A área do quadrado de lado $lado metros é $area metros quadrados.</p>";
  }
  ?>
</body>
</html>
