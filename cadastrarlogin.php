
<?php
session_start();
include('_conexao.php');

<<<<<<< HEAD

$conn = conectaBD();


=======
// Conexão com o banco de dados
$conn = conectaBD();

// Verificar se o formulário foi enviado
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['senha'];

<<<<<<< HEAD
    
=======
    // Verificar se os campos não estão vazios
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
    if (!empty($user) && !empty($pass)) {
       
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);


<<<<<<< HEAD
        
=======
        // Inserir dados no banco de dados usando consultas preparadas
>>>>>>> 51bc93ed8758f546b6e365a6a8243eae2fd8af2d
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


