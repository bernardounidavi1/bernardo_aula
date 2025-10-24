<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 9</title></head>
<body>
  <h2>Parcelas com Juros Compostos (Juquinha)</h2>

  <?php
  $valor = 8654;
  $parcelas = [24, 36, 48, 60];
  $taxa = 0.02; // 2% inicial

  foreach ($parcelas as $p) {
      $montante = $valor * pow((1 + $taxa), $p);
      $valorParcela = $montante / $p;

      echo "<p>$p vezes de R$ " . number_format($valorParcela, 2, ',', '.') . 
           " (taxa: " . ($taxa*100) . "%)</p>";

      $taxa += 0.003;
  }
  ?>
</body>
</html>
