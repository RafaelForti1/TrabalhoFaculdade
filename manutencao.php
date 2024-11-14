<?php
session_start(); // Inicia a sessão para verificar se o usuário está logado
require 'conexao.php'; // Importa a conexão com o banco de dados

// Verifica se o usuário está logado. Se não estiver, manda ele para a página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Pega todos os usuários cadastrados no banco de dados
$stmt = $pdo->query("SELECT * FROM usuarios");
$usuarios = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção de Usuários</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Manutenção de Usuários</h2>
        <div class="mb-3 text-center">
            <a href="cadastro.php" class="btn btn-success">Novo Usuário</a>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>

        <!-- Exibe a lista de usuários em uma tabela -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td>
                        <!-- Links para editar ou excluir cada usuário -->
                        <a href="editar.php?id=<?= $usuario['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        <a href="excluir.php?id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
