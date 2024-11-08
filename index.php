<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Alunos e Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div id="panel" class="bg-white border border-gray-300 rounded-lg p-6 w-80 shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Cadastro de Alunos e Cursos</h1>

        <button onclick="window.location.href='cadastrar_aluno.php'" 
                class="w-full mb-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors flex items-center justify-center space-x-2">
            <i class="fas fa-user-plus"></i> <!-- Icone de adicionar aluno -->
            <span>Cadastrar Aluno</span>
        </button>

        <button onclick="window.location.href='cadastrar_curso.php'" 
                class="w-full mb-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors flex items-center justify-center space-x-2">
            <i class="fas fa-book-open"></i> <!-- Icone de adicionar curso -->
            <span>Cadastrar Curso</span>
        </button>

        <button onclick="window.location.href='listar_alunos.php'" 
                class="w-full mb-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors flex items-center justify-center space-x-2">
            <i class="fas fa-users"></i> <!-- Icone de listar alunos -->
            <span>Listar Alunos</span>
        </button>

        <button onclick="window.location.href='listar_cursos.php'" 
                class="w-full py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition-colors flex items-center justify-center space-x-2">
            <i class="fas fa-book"></i> <!-- Icone de listar cursos -->
            <span>Listar Cursos</span>
        </button>
    </div>
</body>
</html>
