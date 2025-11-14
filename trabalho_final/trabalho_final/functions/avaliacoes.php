<?php

function limparDados($texto) {
    $texto = trim($texto);
    $texto = stripslashes($texto);
    $texto = htmlspecialchars($texto);
    return $texto;
}

function buscarPerguntas($conn) {
    $sql = "SELECT * FROM perguntas WHERE status = 'ativa' ORDER BY ordem";
    $resultado = pg_query($conn, $sql);
    $perguntas = array();
    
    while ($linha = pg_fetch_assoc($resultado)) {
        $perguntas[] = $linha;
    }
    
    return $perguntas;
}

function salvarAvaliacao($conn, $dispositivo, $setor, $respostas, $feedback) {
    pg_query($conn, "BEGIN");
    
    foreach ($respostas as $id_pergunta => $resposta) {
        $resposta = (int)$resposta;
        $id_pergunta = (int)$id_pergunta;
        
        if ($resposta < 0 || $resposta > 10) {
            pg_query($conn, "ROLLBACK");
            return false;
        }
        
        if (empty($feedback)) {
            $sql = "INSERT INTO avaliacoes (id_setor, id_pergunta, id_dispositivo, resposta) 
                    VALUES ($setor, $id_pergunta, $dispositivo, $resposta)";
        } else {
            $feedback_limpo = pg_escape_string($conn, $feedback);
            $sql = "INSERT INTO avaliacoes (id_setor, id_pergunta, id_dispositivo, resposta, feedback_textual) 
                    VALUES ($setor, $id_pergunta, $dispositivo, $resposta, '$feedback_limpo')";
        }
        
        $resultado = pg_query($conn, $sql);
        
        if (!$resultado) {
            pg_query($conn, "ROLLBACK");
            return false;
        }
    }
    
    pg_query($conn, "COMMIT");
    return true;
}

?>