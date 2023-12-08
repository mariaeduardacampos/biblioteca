<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "listar.css">
        <title> Cadastro de Livros concluídos </title>
        <link rel="shortcut icon" href="src/icon.png">
</head>
<body class= "listar">
    <h1>Cadastro de Livros concluídos </h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM livro');
    $stmt->execute();
    $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count ($livros) == 0) {
        echo '<p> Nenhum livro foi cadastrado. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr><th>Nome</th><th>Autor</th><th>Seção</th><th>Código</th><th colspan="2">Opções</th></thead>';
        echo '<tbody>';

        foreach ($livros as $livro) {
            echo '<tr>';
            echo '<td>' . $livro['nome'] . '</td>';
            echo '<td>' . $livro['autor'] . '</td>';
            echo '<td>' . $livro['secao'] . '</td>';
            echo '<td>' . $livro['codigo'] . '</td>';

            echo '<td><a style="color:black;" href="atualizar.php?id=' . $livro ['id'] . '">Atualizar </a></td>';
            echo '<try>';
            
        }
        echo '</tbody>';
        echo '</table>';

    }

    ?>
<br><br>
    <button><a href="cadastrodelivro.php">Voltar</a></button>
    </body>

    </html>
