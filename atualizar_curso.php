<?php
include 'db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$data_inicio = $_POST['data_inicio'];

$sql = "UPDATE cursos SET nome = ?, descricao = ?, data_inicio = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nome, $descricao, $data_inicio, $id);

if ($stmt->execute()) {
    $message = "Dados atualizados com sucesso!";
} else {
    $message = "Erro ao atualizar curso: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Curso</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow-lg mt-10 text-center">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6"><?= $message ?></h1>

        <div class="flex justify-center">
            <button type="button" onclick="window.location.href='index.php'" class="px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Voltar ao Início
            </button>
        </div>
    </div>
</body>
</html>

