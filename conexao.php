<?php
// Aqui a gente configura como conectar ao banco de dados MySQL
$host = 'localhost';
$dbname = 'crud_usuarios';
$user = 'root'; // Coloque o usuário do MySQL aqui
$password = ''; // Coloque a senha do MySQL aqui

try {
    // Criando a conexão com o banco
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Configura para mostrar erros, assim fica mais fácil ver o que deu errado
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Se der erro na conexão, a gente mostra a mensagem
    die("Erro na conexão: " . $e->getMessage());
}
?>
