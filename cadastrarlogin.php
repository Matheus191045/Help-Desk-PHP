
<?php
session_start();
include('_conexao.php');

// Conexão com o banco de dados
$conn = conectaBD();

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Verificar se os campos não estão vazios
    if (!empty($user) && !empty($pass)) {
       
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);


        // Inserir dados no banco de dados usando consultas preparadas
        $stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user, $hashed_password);

        if ($stmt->execute()) {
            echo "Novo usuário cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

desconectaBD($conn);
?>


