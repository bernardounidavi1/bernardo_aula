<?php

function getConnection() {
    $host = 'localhost';
    $dbname = 'sistema_avaliacao';
    $user = 'postgres';
    $password = '123';
    
    try {
        $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
        if (!$conn) {
            die("Erro ao conectar no banco de dados");
        }
        return $conn;
    } catch (Exception $e) {
        die("Erro: " . $e->getMessage());
    }
}

?>