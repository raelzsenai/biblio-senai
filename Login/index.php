<?php
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber e sanitizar os dados
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);
    
    // Buscar o usuário no banco de dados
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Verificar a senha
        $row = $result->fetch_assoc();

        if ($senha === $row['senha']) {
            echo "Login realizado com sucesso!";
            // Redirecionar para a página de usuário ou dashboard

            header("Location: ../Biblioteca/Home.html"); 

            session_start();

            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    // Fechar a conexão
    $conn->close();
}
?>



