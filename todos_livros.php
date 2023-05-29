<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM livros";
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

$conn->close();
?>
