<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Exercício 7</title></head>
<body>
  <h2>Financiamento da Mariazinha</h2>
  <?php
  $avista = 22500;
  $parcela = 489.65;
  $meses = 60;
  $total = $parcela * $meses;
  $juros = $total - $avista;

  echo "<p>Valor à vista: R$ $avista</p>";
  echo "<p>Total pago no financiamento: R$ " . number_format($total, 2, ',', '.') . "</p>";
  echo "<p>Mariazinha pagará R$ " . number_format($juros, 2, ',', '.') . " só de juros.</p>";
  ?>
</body>
</html>
