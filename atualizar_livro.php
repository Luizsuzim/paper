<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $id = $_POST['id'];
   $titulo = $_POST['titulo'];
   $autor = $_POST['autor'];
   $ano = $_POST['ano'];

   $sql = "UPDATE livros SET titulo = '$titulo', autor = '$autor', ano_publicacao = '$ano' WHERE id = $id";

   if ($conn->query($sql) === TRUE) {
       echo "Livro atualizado com sucesso.";
       echo '<br><br>';
       echo '<a href="http://localhost/biblioteca/">Voltar para a página inicial</a>';
   } else {
       echo "Erro ao atualizar livro: " . $conn->error;
   }
}

$conn->close();
?>
