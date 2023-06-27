<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $titulo = $_POST['titulo'];
   $autor = $_POST['autor'];
   $ano = $_POST['ano'];

   $sql = "INSERT INTO livros (titulo, autor, ano_publicacao) VALUES ('$titulo', '$autor', '$ano')";
   if ($conn->query($sql) === TRUE) {
       echo "Livro adicionado com sucesso.";
   } else {
       echo "Erro ao adicionar livro: " . $conn->error;
   }
}

$conn->close();
?>
