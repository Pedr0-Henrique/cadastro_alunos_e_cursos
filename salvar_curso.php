<?php
include 'db.php';

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];

$sql = "INSERT INTO cursos (nome, descricao, data_inicio)
VALUES ('$nome', '$descricao', '$data_inicio')";

if ($conn->query($sql) === TRUE) {
    echo "<div class='max-w-3xl mx-auto p-8 bg-green-100 rounded-lg shadow-lg mt-10 text-center'>
            <h1 class='text-3xl font-semibold text-green-800 mb-6'>Curso cadastrado com sucesso!</h1>
            <div class='space-x-4'>
                <button type='button' onclick=\"window.location.href='cadastrar_curso.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Cadastrar Novo Curso
                </button>
                <button type='button' onclick=\"window.location.href='listar_cursos.php'\" class='px-6 py-2 text-indigo-600 font-semibold rounded-lg border border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Listar Cursos
                </button>
            </div>
          </div>";
} else {
    echo "<div class='max-w-3xl mx-auto p-8 bg-red-100 rounded-lg shadow-lg mt-10 text-center'>
            <h1 class='text-3xl font-semibold text-red-800 mb-6'>Erro: " . $conn->error . "</h1>
            <div class='space-x-4'>
                <button type='button' onclick=\"window.location.href='cadastrar_curso.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Tentar Novamente
                </button>
            </div>
          </div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <!-- O conteúdo será gerado dinamicamente pelo PHP -->
</body>
</html>
