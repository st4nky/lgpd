<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: painel.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form id="loginForm" method="POST">
                <h1>Entrar</h1>
                <div class="input-group">
                    <input type="email" id="loginEmail" name="email" placeholder="usuario@gmail.com" required>
                </div>
                <div class="password-container">
                    <input type="password" id="loginPassword" name="senha" placeholder="senha123" required>
                    <span id="loginTogglePassword" class="toggle-password">Mostrar</span>
                </div>
                <button type="submit">Entrar</button>
                <div id="loginError" class="error-message">Preencha todos os campos!</div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Olá Usuário!</h1>
                    <p>Digite e-mail e senha para que possa acessar nosso Dashboard.</p>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="POST">
    <script src="script.js"></script>
</body>
</html>