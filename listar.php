<?php
include 'db.php';

$sql = "SELECT alunos.id, alunos.nome, alunos.email, alunos.data_nascimento, cursos.nome as curso, alunos.data_inicio
        FROM alunos
        JOIN cursos ON alunos.curso_id = cursos.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Curso</th>
            <th>Data de Início</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['data_nascimento'] ?></td>
            <td><?= $row['curso'] ?></td>
            <td><?= $row['data_inicio'] ?></td>
            <td><button onclick="remover(<?= $row['id'] ?>)">Remover</button></td>
        </tr>
        <?php } ?>
    </table>
    <br><button type="button" onclick="window.location.href='index.php'">Voltar</button>

    <script>
        function remover(id) {
            if (confirm('Tem certeza que deseja remover este aluno?')) {
                window.location.href = 'remover.php?id=' + id;
            }
        }
    </script>
</body>
</html>
