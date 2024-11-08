<?php
include 'db.php';

$sql = "SELECT * FROM cursos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Lista de Cursos</h1>
        
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="p-4 border border-gray-300">Nome</th>
                    <th class="p-4 border border-gray-300">Descrição</th>
                    <th class="p-4 border border-gray-300">Data de Início</th>
                    <th class="p-4 border border-gray-300">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr class="text-gray-700 odd:bg-white even:bg-gray-100">
                        <td class="p-4 border border-gray-300"><?= $row['nome'] ?></td>
                        <td class="p-4 border border-gray-300"><?= $row['descricao'] ?></td>
                        <td class="p-4 border border-gray-300"><?= $row['data_inicio'] ?></td>
                        <td class="p-4 border border-gray-300 text-center">
                            <button onclick="window.location.href='editar_curso.php?id=<?= $row['id'] ?>'"
                                    class="px-4 py-2 mr-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors">
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
        
        <div class="flex justify-between mt-6">
            <button onclick="window.location.href='cadastrar_curso.php'"
                    class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">
                Cadastrar Novo Curso
            </button>
            <button onclick="window.location.href='index.php'"
                    class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors">
                Voltar ao Início
            </button>
        </div>
    </div>

    <script>
        function remover(id) {
            if (confirm('Tem certeza que deseja remover este curso?')) {
                window.location.href = 'remover_curso.php?id=' + id;
            }
        }
    </script>
</body>
</html>
