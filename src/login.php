<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $nomeusuario = $_POST['nomeusuario'];
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare('SELECT * FROM usuario WHERE nomeusuario = :nomeusuario AND senha = :senha');
        $stmt->execute(['nomeusuario' => $nomeusuario, 'senha' => $senha]);

        if ($stmt->rowCount()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['niveis_permissao'] == 1) {
                header('Location: adm.php');
            } else {
                header('Location: ../index.php');
            }
        } else {
            echo '<span>Erro ao logar seu Usuário. Tente novamente mais tarde!</span>';
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
    <link rel="stylesheet" href="login.css">
    <link rel="shortcut icon" href="icon.png">
    <title>Login</title>
</head>
<body>
<Body background="bibi-login.jpg">

    <div class="container-usuario">
        <h1>Login</h1>

        <form method="post">
            <label for="nomedeusuario">Nome de usuário</label>
            <input type="text" name="nomeusuario" required><br> 

            <label for="senha">Senha</label>
            <input type="password" name="senha" required><br> 

            <div>
                <button type="submit" name="submit"> Entrar </button>
                <button><a href="cadastrodeusuario.php">Ainda não é cadastrado?</a></button>
            </div>
        </form>
    </div> 
    


</body>
</html>
