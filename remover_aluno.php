<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM alunos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='max-w-3xl mx-auto p-8 bg-green-100 rounded-lg shadow-lg mt-10 text-center'>
            <h1 class='text-3xl font-semibold text-green-800 mb-6'>Aluno removido com sucesso!</h1>
            <div class='space-x-4'>
                <button type='button' onclick=\"window.location.href='listar_alunos.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Voltar para a lista
                </button>
            </div>
          </div>";
} else {
    echo "<div class='max-w-3xl mx-auto p-8 bg-red-100 rounded-lg shadow-lg mt-10 text-center'>
            <h1 class='text-3xl font-semibold text-red-800 mb-6'>Erro ao remover o aluno: " . $conn->error . "</h1>
            <div class='space-x-4'>
                <button type='button' onclick=\"window.location.href='listar_alunos.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Tentar novamente
                </button>
            </div>
          </div>";
}

$conn->close();
?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">