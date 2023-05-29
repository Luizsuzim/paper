<?php
$servername = "localhost";
$username = "root";
$password = ""; // Insira sua senha do banco de dados aqui
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

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
