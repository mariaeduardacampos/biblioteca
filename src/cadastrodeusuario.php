<?php
require_once 'db.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="src/icon.png">
    <link rel="stylesheet" href= "cadastrousuario.css">
    
    <title>Cadastro de Usuário</title>
</head>
<body background="estante.jpg">
<div class="logo">
    <body style="background-color: black";></body>
</div>
    <div class="container-usuario">
        <h1>Cadastro</h1>
        <?php
        if (isset($_POST['submit'])){
            $nomecompleto = $_POST['nomecompleto'];
            $nomeusuario = $_POST['nomeusuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $endereco = $_POST['endereco'];
            $cep = $_POST['cep'];
            $niveis_permissao = $_POST['niveis_permissao'];

                $stmt = $pdo->prepare('INSERT INTO usuario(nomecompleto, nomeusuario, email, senha, endereco, cep, niveis_permissao) VALUES(:nomecompleto, :nomeusuario, :email, :senha, :endereco, :cep, :niveis_permissao)');
                $stmt->execute(['nomecompleto' => $nomecompleto, 'nomeusuario' => $nomeusuario, 'email' => $email, 'senha' => $senha, 'endereco' => $endereco, 'cep'=> $cep, 'niveis_permissao'=>$niveis_permissao]);

                if ($stmt->rowCount()) {
                    echo '<span>Usuário cadastrado com sucesso!</span>';
                    header('Location: ../index.php');
                } else {
                    echo '<span>Erro ao cadastrar seu Usuário.Tente novamente mais tarde!</span>';
                }
            }
            if (isset ($error)) {
                echo '<span>' . $error . '</span>';
            }
        ?>
        <form method="post">

        <label for="nomecompleto">Nome completo</label>
        <input type="text" name="nomecompleto" required><br> 

        <label for="nomeusuario">Nome usuário</label>
        <input type="text" name="nomeusuario" required><br> 

        <label for="email">Email</label>
        <input type="email" name="email"  required><br> 

        <label for="senha">Senha</label>
        <input type="password" name="senha" required><br> 

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" required><br> 

        <label for="cep">CEP</label>
        <input type="text" name="cep" required><br>

        <input type="hidden" name="niveis_permissao" value="2" required><br> 

        <div>
            <button type="submit" name="submit" valume="cadastrar">Cadastrar</button>
            <button><a href="login.php">Login</a></button>
    </div>
    </form>
    </div> 
</body>
</html>