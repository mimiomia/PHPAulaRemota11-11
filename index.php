<?php
session_start();

// se o user já está logado exibe o nome de usuário
if (isset($_SESSION['usuario'])) {
    // cria uma variável com o nome do usuário pra que possa ser exibida nessa página
    $nome_usuario = $_SESSION['usuario'];
    // mensagem é definida para quando o usuário ta logado
    $mensagem = "Usuário logado: {$nome_usuario}";
} else {
    // mensagem fica quando o usuário não ta logado
    $mensagem = "";
}

// cria a variável de erro que armazena 1 se houver erro no login e vazio se nao tiver
// o valor do erro é passado via url no arquivo validar.php
$erro = $_GET['erro'] ?? '';
if ($erro == '1') {
    $mensagem_erro = "<p class='error-message'>Erro: Login ou senha inválidos</p>";
} else {
    $mensagem_erro = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tela de login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <!-- Ícone de cadeado podre veio zoado generico -->
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="48px" height="48px">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 17c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm6-9h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2H8.9V6zm10 12H6V10h12v8z"/>
        </svg>

        <?php 
        if ($mensagem) { 
        ?>
            <h2><?php echo $mensagem; ?></h2>
            <p>Você pode ir para a <a href="principal.php">página principal</a> ou <a href="sair.php">sair da sua sessão</a>.</p>
        <?php 
        } else { 
        ?>
            <h2>Bem-vinda</h2>
            <p>Faça seu login</p>
            <?php echo $mensagem_erro; ?>
            
            <form name="login" method="post" action="validar.php">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" required placeholder="Digite seu login"><br>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required placeholder="Digite sua senha"><br>
                
                <input type="submit" value="Entrar">
            </form>
            
            <p>Logins pro teste</p>
            <ul>
                <li>admin / 1234 (Administrador)</li>
                <li>visit / 12345 (Visitante)</li>
                <li>colab / 123456 (Colaborador)</li>
            </ul>
        <?php 
        } 
        ?>
    </div>
</body>
</html>