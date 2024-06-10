<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        
    } else if(strlen($_POST['senha']) == 0) {
        
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['name'] = $usuario['name'];

            header("Location: index2.html");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Unifood - Login</title>
</head>
<body>
    <form action="" method="POST">
    <div class="main-login">
        <div class="left-login">
            <img src="hamburguer.svg" class="left-login-image" alt="hamburguer-animate">
        </div>
        <div class="right-login">
            <div class="card-login">
                <img src="logo-unifood.png" class="logo-unifood" alt="unifood-logo">
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="email" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="usuario">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                    <a href="recuperar_senha.html" class="recuperar-senha">Recuperar senha</a>
                </div>
                <button class="btn-login">Entrar</button>
                <a href="cadastrar.php" class="cadastro">Cadastrar-se</a>
            </div>
        </div>
    </div>
</body>
</html>