<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
   $id = $_GET['id'];

   // Recupere as informações do livro com base no ID
   $sql = "SELECT * FROM livros WHERE id = $id";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       $livro = $result->fetch_assoc();

       // Exiba o formulário de edição com as informações preenchidas
       echo '
           <form id="editarForm" action="atualizar_livro.php" method="POST" class="form-editar">
               <input type="hidden" name="id" value="' . $livro['id'] . '">
               <label for="titulo">Título:</label>
               <input type="text" id="titulo" name="titulo" value="' . $livro['titulo'] . '" required><br><br>

               <label for="autor">Autor:</label>
               <input type="text" id="autor" name="autor" value="' . $livro['autor'] . '" required><br><br>

               <label for="ano">Ano de Publicação:</label>
               <input type="number" id="ano" name="ano" value="' . $livro['ano_publicacao'] . '" required><br><br>

               <button type="submit">Atualizar</button>
           </form>';
   } else {
       echo 'Livro não encontrado.';
   }
}

$conn->close();
?>
