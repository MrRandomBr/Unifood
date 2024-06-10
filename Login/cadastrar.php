<?php
include('conexao.php');

if ($mysqli->error) {
    die("Falha na conexão ao banco de dados: " . $mysqli->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, senha) VALUES ('$usuario', '$email', '$senha')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $mysqli->error;
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
    <title>Unifood - Cadastro</title>
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
                    <label for="usuario">Nome</label>
                    <input type="text" name="name" placeholder="Nome do usuário">
                </div>
                <div class="textfield">
                    <label for="usuario">Email</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="textfield">
                    <label for="usuario">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                    <a href="recuperar_senha.html" class="recuperar-senha">Recuperar senha</a>
                </div>
                <button class="btn-login">Entrar</button>
                
            </div>
        </div>
    </div>
</body>
</html>