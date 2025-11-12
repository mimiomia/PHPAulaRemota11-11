<?php
session_start();

// Pega os dados do formulário. Se o post estiver vazio, atribui string vazia na variavel login e senha
$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';
// Cria a variável do tipo de usuário
$usuario_tipo = '';

// define o tipo de usuário a partir do login e senha especifico
if ($login == 'admin' && $senha == '1234') {
    $usuario_tipo = 'Administrador';
} elseif ($login == 'visit' && $senha == '12345') {
    $usuario_tipo = 'Visitante';
} elseif ($login == 'colab' && $senha == '123456') {
    $usuario_tipo = 'Colaborador';
}

//Se o tiver um tipo de usuário ele cria a variavel usuario na sessão e manda pra página principal
if ($usuario_tipo) {
    $_SESSION['usuario'] = $usuario_tipo;
    header("location:principal.php");
    exit();
} else {
    // se o tipo n for definido ele redireciona pra página de login com erro pra exivir a mensagem de erro
    header("location:index.php?erro=1");
    exit();
}
?>