<?php
$servername = "localhost";
$username = "root";
$password = ""; // Insira sua senha do banco de dados aqui
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

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
