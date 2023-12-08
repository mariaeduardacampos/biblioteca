<?php
require_once 'db.php';
if (isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $livro = $_POST['livro'];
    $data_emprestimo = $_POST['data_emprestimo'];

        $stmt = $pdo->prepare('INSERT INTO reserva (nome, livro, data_emprestimo) VALUES(:nome, :livro, :data_emprestimo)');
        $stmt->execute(['nome' => $nome, 'livro' => $livro, 'data_emprestimo' => $data_emprestimo]);

        if ($stmt->rowCount()) {
            $string = 'process.php?nome='.$nome.'&livro='.$livro.'&data_emprestimo='.$data_emprestimo;
            header("Location: $string");
            echo '<span>Livro emprestado com sucesso!</span>';
        } else {
            echo '<span>Erro ao emprestar seus livros.Tente novamente mais tarde!</span>';
        }
    }
    if (isset ($error)) {
        echo '<span>' . $error . '</span>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Empréstimo de Livros</title>
    <link rel="shortcut icon" href="icon.png">
    <link rel="stylesheet" href="reserva.css">
</head>
<body>
<body background="estante.jpg">
    <div class="container">
        <h1>Sistema de Empréstimo de Livros</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="livro">Livro:</label>
            <input type="text" id="livro" name="livro" required>

            <label for="data_emprestimo">Data de Empréstimo:</label>
            <input type="date" id="data_emprestimo" name="data_emprestimo" required>

            <button type="submit" name="submit" value="submit">Registrar Empréstimo</button>
            <br>
            <button><a href="adm.php">Voltar</a></button>

        </form>
    </div>


</body>
</html