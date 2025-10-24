<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 6</title></head>
<body>
  <h2>Feira do Joãozinho</h2>
  <form method="post">
    <p>Informe o preço e quantidade (kg) de cada produto:</p>
    <?php
    $produtos = ['Maçã', 'Melancia', 'Laranja', 'Repolho', 'Cenoura', 'Batatinha'];
    foreach ($produtos as $p) {
        echo "$p - Preço/kg: <input type='number' step='0.01' name='preco[$p]' required> 
              Quantidade (kg): <input type='number' step='0.01' name='qtd[$p]' required><br>";
    }
    ?>
    <button type="submit">Calcular</button>
  </form>

  <?php
  if ($_POST) {
      $total = 0;
      foreach ($_POST['preco'] as $produto => $preco) {
          $qtd = $_POST['qtd'][$produto];
          $subtotal = $preco * $qtd;
          $total += $subtotal;
      }

      echo "<h3>Total da compra: R$ " . number_format($total, 2, ',', '.') . "</h3>";

      if ($total < 50) {
          $resto = 50 - $total;
          echo "<p style='color:blue;'>Joãozinho ainda pode gastar R$ " . number_format($resto, 2, ',', '.') . "</p>";
      } elseif ($total > 50) {
          $excesso = $total - 50;
          echo "<p style='color:red;'>Faltam R$ " . number_format($excesso, 2, ',', '.') . " para pagar tudo!</p>";
      } else {
          echo "<p style='color:green;'>O saldo foi esgotado exatamente!</p>";
      }
  }
  ?>
</body>
</html>
