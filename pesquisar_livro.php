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
   $search = $_GET['search'];

   $sql = "SELECT * FROM livros WHERE titulo LIKE '%$search%' OR autor LIKE '%$search%'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
       echo '<table>
           <tr>
               <th>Título</th>
               <th>Autor</th>
               <th>Ano de Publicação</th>
               <th>Ação</th>
           </tr>';

       while ($row = $result->fetch_assoc()) {
           echo '<tr>
               <td>' . $row['titulo'] . '</td>
               <td>' . $row['autor'] . '</td>
               <td>' . $row['ano_publicacao'] . '</td>
               <td><button onclick="excluirLivro(' . $row['id'] . ')">Excluir</button></td>
           </tr>';
       }

       echo '</table>';
   } else {
       echo 'Nenhum livro encontrado.';
   }
}

$conn->close();
?>
