<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 2</title></head>
<body>
  <h2>Teste de divisibilidade por 2</h2>
  <form method="post">
    <label>Digite um número: <input type="number" name="num" required></label>
    <button type="submit">Verificar</button>
  </form>

  <?php
  if ($_POST) {
      $num = $_POST['num'];
      if ($num % 2 == 0)
          echo "<p>Valor divisível por 2</p>";
      else
          echo "<p>O valor não é divisível por 2</p>";
  }
  ?>
</body>
</html>
