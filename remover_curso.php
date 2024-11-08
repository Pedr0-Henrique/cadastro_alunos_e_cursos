<?php
// Verifica se o ID do curso foi enviado através do método GET
if(isset($_GET['id'])) {
    // Inclui o arquivo de conexão com o banco de dados
    include 'db.php';

    // Obtém o ID do curso da URL e converte para inteiro para segurança
    $id = (int)$_GET['id'];

    // Prepara a consulta SQL para excluir o curso com o ID especificado
    $sql = "DELETE FROM cursos WHERE id = $id";

    // Executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
        // Se a consulta for bem-sucedida, exibe uma mensagem de sucesso
        echo "<div class='max-w-3xl mx-auto p-8 bg-green-100 rounded-lg shadow-lg mt-10 text-center'>
                <h1 class='text-3xl font-semibold text-green-800 mb-6'>Curso removido com sucesso!</h1>
                <div class='space-x-4'>
                    <button type='button' onclick=\"window.location.href='listar_cursos.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                        Voltar para a lista
                    </button>
                </div>
              </div>";
    } else {
        // Se houver um erro na consulta, exibe uma mensagem de erro
        echo "<div class='max-w-3xl mx-auto p-8 bg-red-100 rounded-lg shadow-lg mt-10 text-center'>
                <h1 class='text-3xl font-semibold text-red-800 mb-6'>Erro ao remover o curso: " . $conn->error . "</h1>
                <div class='space-x-4'>
                    <button type='button' onclick=\"window.location.href='listar_cursos.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                        Tentar novamente
                    </button>
                </div>
              </div>";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Se o ID do curso não estiver presente na URL, exibe uma mensagem de erro
    echo "<div class='max-w-3xl mx-auto p-8 bg-yellow-100 rounded-lg shadow-lg mt-10 text-center'>
            <h1 class='text-3xl font-semibold text-yellow-800 mb-6'>ID do curso não especificado.</h1>
            <div class='space-x-4'>
                <button type='button' onclick=\"window.location.href='listar_cursos.php'\" class='px-6 py-2 text-white bg-indigo-600 font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500'>
                    Voltar para a lista
                </button>
            </div>
          </div>";
}
?>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
