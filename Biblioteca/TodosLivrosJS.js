function searchBooks() { // Aqui cria uma função chamada searchBooks
    var input = document.getElementById('searchInput').value.toLowerCase(); // AQui obtém o valor digitado no campo de pesquisa e converte para minúsculas
    var books = document.getElementsByClassName('polaroid'); // Aqui pega todos os elementos com a classe 'polaroid'

    for (var i = 0; i < books.length; i++) { // AQui inicia um loop que percorre todos os elementos obtidos
        var title = books[i].getElementsByTagName('p')[0].innerText.toLowerCase(); // Aqui pega o texto do primeiro parágrafo (título do livro) e converte para minúsculas
        var author = books[i].getElementsByTagName('p')[1].innerText.toLowerCase(); // Aqui pega o texto do segundo parágrafo (autor do livro) e converte para minúsculas
        
        if (title.includes(input) || author.includes(input)) { // Aqui verifica se o valor do input está incluído no título ou no autor
            books[i].style.display = ""; // Se estiver, mantém o elemento visível
        } else {
            books[i].style.display = "none"; // Se não estiver, oculta o elemento
        }
    }
}
