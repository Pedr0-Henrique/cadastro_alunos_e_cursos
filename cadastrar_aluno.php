<?php
include 'db.php';

$sql = "SELECT id, nome FROM cursos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Cadastro de Alunos</h1>
        <form action="salvar_aluno.php" method="post" class="space-y-4">
            <div>
                <label for="nome" class="block text-gray-700 font-semibold">Nome:</label>
                <input type="text" id="nome" name="nome" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            
            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                <input type="email" id="email" name="email" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            
            <div>
                <label for="data_nascimento" class="block text-gray-700 font-semibold">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            
            <div>
                <label for="curso" class="block text-gray-700 font-semibold">Curso:</label>
                <select id="curso" name="curso_id" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?php while($row = $result->fetch_assoc()) { ?>
                        <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div>
                <label for="data_inicio" class="block text-gray-700 font-semibold">Data de Início do Curso:</label>
                <input type="date" id="data_inicio" name="data_inicio" required class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            
            <div class="flex items-center justify-center">
                <input type="submit" value="Cadastrar" class="w-full py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors">
            </div>
        </form>
        
        <button type="button" onclick="window.location.href='index.php'" 
                class="mt-6 w-full py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 transition-colors">
            Voltar ao Início
        </button>
    </div>
</body>
</html>
