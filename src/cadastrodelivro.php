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
    <link rel="stylesheet" href= "cadastrolivro.css">
    <title>Cadastro de Livros</title>
</head>
<body>
<BODY background="bibi-login.jpg">

    <div class="container-livros">
        <h1>Cadastro de Livros</h1>
        <?php
        if (isset($_POST['submit'])){
            $nome = $_POST['nome'];
            $autor = $_POST['autor'];
            $secao = $_POST['secao'];
            $codigo = $_POST['codigo'];

                $stmt = $pdo->prepare('INSERT INTO livro(nome, autor, secao, codigo) VALUES(:nome, :autor, :secao, :codigo)');
                $stmt->execute(['nome' => $nome, 'autor' => $autor, 'secao' => $secao, 'codigo' => $codigo]);

                if ($stmt->rowCount()) {
                    echo '<span>Livro cadastrado com sucesso!</span>';
                } else {
                    echo '<span>Erro ao cadastrar seus livros.Tente novamente mais tarde!</span>';
                }
            }
            if (isset ($error)) {
                echo '<span>' . $error . '</span>';
            }
        ?>

        <form method="post">

        <label for="nome">Nome do Livro</label>
        <input type="text" name="nome" required><br> 

        <label for="autor">Autor</label>
        <input type="text" name="autor" required><br> 

        <label for="secao">Seção</label>
        <input type="text" name="secao"  required><br> 

        <label for="codigo">Código</label>
        <input type="text" name="codigo" required><br> 

        <div>
            <button type="submit" name="submit" valume="cadastrar">Cadastrar</button>
            <button><a href="listar.php">Cadastrados</a></button>
            <button><a href="adm.php">Voltar</a></button>
    </div>
    </form>
    </div> 
</body>
</html>