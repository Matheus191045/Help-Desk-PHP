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
$pass = $_POST['password'];

// Consulta ao banco de dados usando consultas preparadas
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        $_SESSION['username'] = $user;
        echo "Login bem-sucedido. Redirecionando...";
        header("Location: index.html");
        exit();
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();
desconectaBD($conn);
?>


