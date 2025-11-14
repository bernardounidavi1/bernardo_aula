<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../functions/avaliacoes.php';

$conn = getConnection();

$dispositivo_id = 1;
if (isset($_GET['dispositivo'])) {
    $dispositivo_id = (int)$_GET['dispositivo'];
}

$setor_id = $dispositivo_id;

$perguntas = buscarPerguntas($conn);

$enviado = false;
$erro = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $respostas = $_POST['resposta'];
    $feedback = '';
    
    if (isset($_POST['feedback'])) {
        $feedback = limparDados($_POST['feedback']);
    }
    
    if (count($respostas) == count($perguntas)) {
        if (salvarAvaliacao($conn, $dispositivo_id, $setor_id, $respostas, $feedback)) {
            $enviado = true;
        } else {
            $erro = true;
        }
    } else {
        $erro = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Serviços</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php if ($enviado): ?>
            <div class="sucesso">
                <h1>Obrigado pela sua avaliação!</h1>
                <p>O Estabelecimento agradece sua resposta e ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>

                <button onclick="window.location.href='index.php'">
                    Fazer Nova Avaliação
                </button>
            </div>

        <?php else: ?>
            <div class="topo">
                <h1>Avaliação de Qualidade</h1>
                <p>Nos ajude a melhorar! Sua opinião é importante.</p>
            </div>

            <?php if ($erro): ?>
                <div class="erro">
                    Por favor, responda todas as perguntas!
                </div>
            <?php endif; ?>

            <form method="POST" id="formulario">
                <?php 
                $numero = 1;
                foreach ($perguntas as $pergunta): 
                ?>
                    <div class="pergunta">
                        <label><?php echo $numero; ?>. <?php echo $pergunta['texto_pergunta']; ?></label>
                        
                        <div class="escala-topo">
                            <span>Muito Insatisfeito</span>
                            <span>Muito Satisfeito</span>
                        </div>
                        
                        <div class="escala">
                            <?php for ($i = 0; $i <= 10; $i++): ?>
                                <div class="opcao">
                                    <input type="radio" 
                                           name="resposta[<?php echo $pergunta['id_pergunta']; ?>]" 
                                           value="<?php echo $i; ?>" 
                                           id="q<?php echo $pergunta['id_pergunta']; ?>_<?php echo $i; ?>"
                                           required>
                                    <label for="q<?php echo $pergunta['id_pergunta']; ?>_<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php 
                    $numero++;
                endforeach; 
                ?>

                <div class="feedback">
                    <label>Deixe um comentário (opcional):</label>
                    <textarea name="feedback" placeholder="Conte-nos mais sobre sua experiência..."></textarea>
                </div>

                <button type="submit">Enviar Avaliação</button>
            </form>

            <div class="rodape">
                Sua avaliação espontânea é anônima, nenhuma informação pessoal é solicitada ou armazenada.
            </div>

        <?php endif; ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
