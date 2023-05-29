document.addEventListener('DOMContentLoaded', function() {
    const addForm = document.getElementById('addForm');
    const searchForm = document.getElementById('searchForm');
    const showAllButton = document.getElementById('showAllButton');
    const livrosTable = document.getElementById('livrosTable');
 
    addForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const titulo = document.getElementById('titulo').value;
        const autor = document.getElementById('autor').value;
        const ano = document.getElementById('ano').value;
 
        adicionarLivro(titulo, autor, ano);
    });
 
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const searchInput = document.getElementById('searchInput').value;
 
        pesquisarLivro(searchInput);
    });
 
    showAllButton.addEventListener('click', function() {
        mostrarTodosLivros();
    });
 
    function adicionarLivro(titulo, autor, ano) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'adicionar_livro.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
                document.getElementById('titulo').value = '';
                document.getElementById('autor').value = '';
                document.getElementById('ano').value = '';
            }
        };
        xhr.send(`titulo=${titulo}&autor=${autor}&ano=${ano}`);
    }
    
    function pesquisarLivro(searchInput) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `pesquisar_livro.php?search=${searchInput}`, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                livrosTable.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
    
 
    
 
    function mostrarTodosLivros() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'todos_livros.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                livrosTable.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
 });
 function excluirLivro(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `excluir_livro.php?id=${id}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert(xhr.responseText);
            location.reload(); // Atualiza a página
        }
    };
    xhr.send();
}
