<?php
session_start(); // Inicia a sessão para fazer logout
session_unset(); // Limpa as informações da sessão
session_destroy(); // Termina a sessão
header("Location: login.php"); // Redireciona para a página de login
exit;
?>
