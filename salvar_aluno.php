<?php
include 'db.php';

// Verifica se o método da solicitação é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $curso_id = $_POST['curso_id'];
    $data_inicio = $_POST['data_inicio'];

    // Prepara a instrução SQL
    $stmt = $conn->prepare("INSERT INTO alunos (nome, email, data_nascimento, curso_id, data_inicio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $nome, $email, $data_nascimento, $curso_id, $data_inicio);

    // Executa a instrução SQL
    if ($stmt->execute() === TRUE) {
        $message = "Aluno cadastrado com sucesso!";
    } else {
        $message = "Erro: " . $stmt->error;
    }

    // Fecha a instrução e a conexão
    $stmt->close();
    $conn->close();
} else {
    $message = "Método de solicitação inválido.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-10 text-center">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6"><?= $message ?></h1>

        <div class="space-x-4">
            <button type="button" onclick="window.location.href='cadastrar_aluno.php'" class="px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Cadastrar Novo Aluno
            </button>
            <button type="button" onclick="window.location.href='listar_alunos.php'" class="px-6 py-2 text-indigo-600 font-semibold rounded-lg border border-indigo-600 hover:bg-indigo-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Listar Alunos
            </button>
        </div>
    </div>
</body>
</html>


