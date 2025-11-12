<?php
session_start();

// se o usuário não estiver logado, manda pro index
if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
    // usar o exit para garantir que o código pare aqui dps de redirecionar
    exit();
}

$nome_usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Principal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="principal">
    <div class="container">
        <h1>Seja bem-vindo, <?php echo $nome_usuario; ?>!</h1>
        
        <p>Essa é a pag de usuários logados</p>
        
        <p><a href="sair.php">Sair (Encerrar sessão)</a></p>
    </div>
</body>
</html>