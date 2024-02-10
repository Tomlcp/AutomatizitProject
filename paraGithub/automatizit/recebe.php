<?php if (isset($_POST['uname']) || isset($_POST['psw'])) {
    if (strlen($_POST['uname']) == 0) {
        echo "Preencha seu Nome de usuário!";
    } else if (strlen($_POST['psw']) == 0) {
        echo "Preencha sua senha!";
    } else {
        $uname = $mysqli->real_escape_string($_POST['uname']);
        $psw = $mysqli->real_escape_string($_POST['psw']);
    }
    $sql_listar = "SELECT * FROM usuarios WHERE username = '$uname' 
                    AND senha = '$psw'";
    $sql_query = $mysqli->query($sql_listar) or
        die("Falha na execução do código SQL! " . $mysqli->error);
    $rows = $sql_query->num_rows;
    if ($rows == 1) {

        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['username'] = $usuario['username'];
        header("Location: portal.php");
    } else {
        echo "<h1>Falha ao logar! Username ou senha incorretos.</h1>";
    }
}
