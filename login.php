<?php
session_start();
include('_conexao.php');

// Conexão com o banco de dados
$conn = conectaBD();
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['senha'])) {
        
        $user = $_POST['username'];
        $pass = $_POST['senha'];

        
        if ($user === 'TiTi23' && $pass === 'T1Ti') {
            session_regenerate_id(true); 
            $_SESSION['username'] = $user;
            $_SESSION['user_role'] = 'ti';
            header("Location: indexTI.html");
            exit();
        } else {
            
            $sql = "SELECT usuario_id, username FROM usuarios WHERE username = '$user' AND senha = '$pass'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                session_regenerate_id(true); 
                $_SESSION['usuario_id'] = $row['usuario_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_role'] = 'client';
                header("Location: index.html");
                exit();
            } else {
                header("Location: login.html");
                exit();
            }
        }
    } else {
        header("Location: login.html");
        exit();
    }
} else {
    header("Location: login.html");
    exit();
}

mysqli_close($conn);
?>
