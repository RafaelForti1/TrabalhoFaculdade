<?php
require 'conexao.php'; // Importa a conexão com o banco de dados

// Verifica se o ID foi enviado e se a ação é para confirmar a exclusão
if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $id = $_GET['id'];
    // Exclui o usuário do banco de dados usando o ID
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: manutencao.php"); // Depois de excluir, volta para a lista de usuários
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Exclusão</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Confirmação de Exclusão</h2>
        <p class="text-center">Tem certeza de que deseja excluir este usuário?</p>

        <!-- Botão para abrir o modal de confirmação -->
        <div class="text-center">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">
                Excluir Usuário
            </button>
            <a href="manutencao.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>

    <!-- Modal de confirmação de exclusão -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este usuário? Essa ação não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <a href="?id=<?= $_GET['id'] ?>&confirm=true" class="btn btn-danger">Excluir</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
