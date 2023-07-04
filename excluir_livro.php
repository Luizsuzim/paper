<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
 
    $sql = "DELETE FROM livros WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Livro excluído com sucesso.";
    } else {
        echo "Erro ao excluir livro: " . $conn->error;
    }
 }
 
 $conn->close();
 ?>