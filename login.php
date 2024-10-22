<?php
session_start();
include('_conexao.php');

// Conexão com o banco de dados
$conn = conectaBD();
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Recebe os dados do formulário
$user = $_POST['username'];
$pass = $_POST['senha'];

// Verificação específica para o login da equipe de TI
if ($user === 'TiTi23' && $pass === 'T1Ti') {
    // Login da equipe de TI bem-sucedido
    $_SESSION['username'] = $user; // Salva o nome de usuário na sessão
    header("Location: indexTI.html"); // Redireciona para a página exclusiva de TI
    exit();
}

// Verificação para os clientes (usuários cadastrados no banco de dados)
$sql = "SELECT username, senha FROM usuarios WHERE username = '$user' AND senha = '$pass'";
$result = mysqli_query($conn, $sql);

// Verifica se o cliente existe no banco de dados
if (mysqli_num_rows($result) > 0) {
    // Login do cliente bem-sucedido
    $_SESSION['username'] = $user; // Salva o nome de usuário na sessão
    header("Location: index.html"); // Redireciona para a página exclusiva do cliente
    exit();
} else {
    // Login falhou, exibe mensagem de erro
    echo "Usuário ou senha incorretos.";
}

mysqli_close($conn); // Fecha a conexão com o banco de dados
?>


