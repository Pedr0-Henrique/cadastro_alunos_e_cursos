<?php
include 'db.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$data_nascimento = $_POST['data_nascimento'];
$curso_id = $_POST['curso_id'];
$data_inicio = $_POST['data_inicio'];

$sql = "INSERT INTO alunos (nome, email, data_nascimento, curso_id, data_inicio)
VALUES ('$nome', '$email', '$data_nascimento', '$curso_id', '$data_inicio')";

if ($conn->query($sql) === TRUE) {
    echo "Aluno cadastrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br><button type="button" onclick="window.location.href='index.php'">Voltar</button>
<button type="button" onclick="window.location.href='listar.php'">Listar Alunos</button>
