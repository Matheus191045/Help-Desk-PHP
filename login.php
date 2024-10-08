<?php
session_start();
include('_conexao.php');


$conn = conectaBD();
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


$user = $_POST['username'];
$pass = $_POST['senha'];


if ($user === 'TiTi23' && $pass === 'T1Ti') {
    
    $_SESSION['username'] = $user; 
    header("Location: indexTI.html"); 
    exit();
}


$sql = "SELECT username, senha FROM usuarios WHERE username = '$user' AND senha = '$pass'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    
    $_SESSION['username'] = $user; 
    header("Location: index.html"); 
    exit();
} else {
    
    echo "Usuário ou senha incorretos.";
}

mysqli_close($conn); 
?>


