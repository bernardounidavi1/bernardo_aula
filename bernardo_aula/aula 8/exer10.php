<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Exercício 10 - Árvore Recursiva</title>
</head>
<body>
  <h2>Exercício 10 - Estrutura de Pastas Recursiva</h2>

  <?php
  $pastas = array(
      "bsn" => array(
          "3a Fase" => array(
              "desenvWeb",
              "bancoDados 1",
              "engSoft 1"
          ),
          "4a Fase" => array(
              "Intro Web",
              "bancoDados 2",
              "engSoft 2"
          )
      )
  );

  function mostrarArvore($array, $nivel = 0) {
      foreach ($array as $chave => $valor) {
          $prefixo = str_repeat("-", $nivel * 2);

          if (is_array($valor)) {
              echo "$prefixo $chave<br>";
              mostrarArvore($valor, $nivel + 1);
          } else {
              echo "$prefixo - $valor<br>";
          }
      }
  }

  mostrarArvore($pastas);
  ?>
</body>
</html>
