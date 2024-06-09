
<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Unifood - Login</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <img src="hamburguer.svg" class="left-login-image" alt="hamburguer-animate">
        </div>
        <div class="right-login">
            <div class="card-login">
                <img src="logo-unifood.png" class="logo-unifood" alt="unifood-logo">
                <div class="textfield">
                    <form action="" method="post"> 
                    <label for="usuario">Usuário</label>
                    
                    <input type="text" name="usuario" placeholder="Usuário">
                    </form>
                </div>
                <div class="textfield">
                    <form action="" method="post">
                    <label for="usuario">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                    <a href="recuperar_senha.html" class="recuperar-senha">Recuperar senha</a>
                    </form>   
                </div>
                <button class="btn-login" type="submit">Entrar</button>
                <a href="cadastrar.html" class="cadastro">Cadastrar-se</a>
            </div>
        </div>
    </div>
</body>
</html>