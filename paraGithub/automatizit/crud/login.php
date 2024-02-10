<?php
//Conexão com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "automatizit";

//criar conexão
$mysqli = new mysqli($servername, $username, $password, $dbname);

// verificar se a criação da conexão foi bem sucedida
if ($mysqli->error) {
    die("Falha de conexão: " . $mysqli->error);
}

$username = $_POST['uname'];
$password = $_POST['psw'];

$hashed_password = md5($password);
$sql_login = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE username = '$username';");
$row = mysqli_fetch_array($sql_login);
$id_usuario = $row['id_usuario'];

if ($hashed_password === $row['senha']) {
    if (!isset($_SESSION)) {
        session_start();
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['username'] = $row['username'];
        header("Location: ../portal.php");
    } else {
        session_start();
        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['username'] = $row['username'];
        header("Location: ../portal.php");
    }
} else {
    header("Location: ../index.php");
    exit();
}


/* $id_usuario = "";
                $obt_id = "SELECT MAX(id_usuario) AS novo_usuario FROM usuarios;";
                $resultado = $mysqli->query($obt_id);
                if ($resultado->num_rows > 0) {
                    if ($row = $resultado->fetch_assoc()) {
                        $id_usuario = $row['novo_usuario'] + 1;
                    } else {
                        $id_usuario = 1;
                    }
                }
                $username = $_POST['user-username'];
                $password = md5($_POST['user-password']);
                $sql_insert_usuario = "INSERT INTO usuarios (id_usuario, username, senha) VALUES 
            ('$id_usuario', '$username', '$password');";
                $resposta2 = mysqli_query($mysqli, $sql_insert_usuario);
                if ($resposta2) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Houve um erro! favor entrar em contato com o suporte.";
                    header("Location: index.php");
                    exit();
                }
            } */