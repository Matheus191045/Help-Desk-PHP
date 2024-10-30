
<?php
session_start();
include('_conexao.php');


$conn = conectaBD();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['senha'];

    
    if (!empty($user) && !empty($pass)) {
       
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);


        
        $stmt = $conn->prepare("INSERT INTO usuarios (username, senha) VALUES (?, ?)");
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


