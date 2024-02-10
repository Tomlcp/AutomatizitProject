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

if (($_GET['cad_cliente']) !== "") {
    $id_servico = $_GET['id_servico'];
    $cad_cliente = $_GET['cad_cliente'];
} else {
    $cliente = $_GET['nome_cliente'];
    $sql_busca_nome = "SELECT id_cliente FROM clientes WHERE nome = '$cliente'";
    $res = mysqli_query($mysqli, $sql_busca_nome);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $cad_cliente = $row['id_cliente'];
    }
    if (($_GET['id_servico']) === '') {
        $id_servico = 1;
    }
}

$nome_servico = $_GET['nome_servico'];
$descricao = $_GET['descricao'];
$custo = $_GET['custo'];

$sql_insert_servico = "INSERT INTO servicos (id_servico, cad_cliente, nome_servico,
                            descricao, custo) 
                           VALUES
                            ('$id_servico','$cad_cliente', '$nome_servico', 
                            '$descricao', '$custo');";

$res = mysqli_query($mysqli, $sql_insert_servico);
if ($res) {
    header('Location: ../portal.php');
    exit();
} else {
    echo '<h1>Houve um erro! Favor tentar novamente ou entrar em contato com apoio.</h1>';
    header("Location: ../logout.php");
    exit();
}
