<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM cursos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$curso = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Editar Curso</h1>
        <form action="atualizar_curso.php" method="post">
            <input type="hidden" name="id" value="<?= $curso['id'] ?>">
            
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-medium">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= $curso['nome'] ?>" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 font-medium">Descrição:</label>
                <textarea name="descricao" id="descricao" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"><?= $curso['descricao'] ?></textarea>
            </div>

            <div class="mb-4">
                <label for="data_inicio" class="block text-gray-700 font-medium">Data de Início:</label>
                <input type="date" name="data_inicio" id="data_inicio" value="<?= $curso['data_inicio'] ?>" required class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Salvar</button>
            </div>
        </form>
        
        <div class="flex justify-end mt-4">
            <button type="button" onclick="window.location.href='index.php'" class="px-6 py-2 text-indigo-600 font-semibold rounded-lg border border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">Voltar ao Início</button>
        </div>
    </div>
</body>
</html>
