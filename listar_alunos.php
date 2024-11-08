<?php
include 'db.php';

$sql = "SELECT alunos.id, alunos.nome, alunos.email, alunos.data_nascimento, cursos.nome as curso, alunos.data_inicio
        FROM alunos
        JOIN cursos ON alunos.curso_id = cursos.id";
$result = $conn->query($sql);

// Verifica se a consulta falhou
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Lista de Alunos</h1>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b-2 p-4 text-gray-700">Nome</th>
                    <th class="border-b-2 p-4 text-gray-700">Email</th>
                    <th class="border-b-2 p-4 text-gray-700">Data de Nascimento</th>
                    <th class="border-b-2 p-4 text-gray-700">Curso</th>
                    <th class="border-b-2 p-4 text-gray-700">Data de Início</th>
                    <th class="border-b-2 p-4 text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                <tr class="hover:bg-gray-100">
                    <td class="border-b p-4"><?= $row['nome'] ?></td>
                    <td class="border-b p-4"><?= $row['email'] ?></td>
                    <td class="border-b p-4"><?= $row['data_nascimento'] ?></td>
                    <td class="border-b p-4"><?= $row['curso'] ?></td>
                    <td class="border-b p-4"><?= $row['data_inicio'] ?></td>
                    <td class="border-b p-4 space-x-2">
                        <button onclick="window.location.href='editar_aluno.php?id=<?= $row['id'] ?>'"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
                            Editar
                        </button>
                        <button onclick="remover(<?= $row['id'] ?>)"
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                            Remover
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <div class="mt-6 flex justify-center space-x-4">
            <button type="button" onclick="window.location.href='cadastrar_aluno.php'"
                    class="px-6 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors">
                Cadastrar Novo Aluno
            </button>
            <button type="button" onclick="window.location.href='index.php'"
                    class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition-colors">
                Voltar ao Início
            </button>
        </div>
    </div>

    <script>
        function remover(id) {
            if (confirm('Tem certeza que deseja remover este aluno?')) {
                window.location.href = 'remover_aluno.php?id=' + id;
            }
        }
    </script>
</body>
</html>
