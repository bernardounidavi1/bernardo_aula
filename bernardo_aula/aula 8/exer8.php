<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 8</title></head>
<body>
  <h2>Parcelas com Juros Simples (Paulinho)</h2>

  <?php
  $valor = 8654;
  $parcelas = [24, 36, 48, 60];
  $taxa = 0.015; // 1.5%

  foreach ($parcelas as $p) {
      $juros = $valor * $taxa * $p;
      $total = $valor + $juros;
      $valorParcela = $total / $p;

      echo "<p>$p vezes de R$ " . number_format($valorParcela, 2, ',', '.') . 
           " (taxa: " . ($taxa*100) . "%)</p>";

      $taxa += 0.005;
  }
  ?>
</body>
</html>
