<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM alunos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$aluno = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
        <h1 class="text-2xl font-bold text-center mb-6">Editar Aluno</h1>
        <form action="atualizar_aluno.php" method="post" class="space-y-4">
            <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
            
            <div>
                <label for="nome" class="block font-semibold text-gray-700">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= $aluno['nome'] ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block font-semibold text-gray-700">Email:</label>
                <input type="email" name="email" id="email" value="<?= $aluno['email'] ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="data_nascimento" class="block font-semibold text-gray-700">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?= $aluno['data_nascimento'] ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="curso_id" class="block font-semibold text-gray-700">Curso:</label>
                <select name="curso_id" id="curso_id" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php
                    $sql = "SELECT id, nome FROM cursos";
                    $result = $conn->query($sql);
                    while($curso = $result->fetch_assoc()) {
                        $selected = $curso['id'] == $aluno['curso_id'] ? 'selected' : '';
                        echo "<option value='{$curso['id']}' $selected>{$curso['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="data_inicio" class="block font-semibold text-gray-700">Data de Início:</label>
                <input type="date" name="data_inicio" id="data_inicio" value="<?= $aluno['data_inicio'] ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Salvar
                </button>
                <button type="button" onclick="window.location.href='index.php'"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                    Voltar ao Início
                </button>
            </div>
        </form>
    </div>
</body>
</html>
