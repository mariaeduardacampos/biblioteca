<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "listar.css">
        <title> Listar reservas </title>
        <link rel="shortcut icon" href="src/icon.png">
</head>
<body class= "listar">
    <h1>Listar de livros emprestados </h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM reserva');
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count ($reservas) == 0) {
        echo '<p> Nenhum livro foi reservado. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr><th>Nome</th><th>Livro</th><th>Data Emprestimo</th><th colspan="2">Opções</th></thead>';
        echo '<tbody>';

        foreach ($reservas as $reserva) {
            echo '<tr>';
            echo '<td>' . $reserva['nome'] . '</td>';
            echo '<td>' . $reserva['livro'] . '</td>';
            echo '<td>' . $reserva['data_emprestimo'] . '</td>';
            echo '<td><a style="color:black;" href="atualizarreserva.php?id=' . $reserva ['id'] . '">Atualizar </a></td>';

        }
        echo '</tbody>';
        echo '</table>';

    }

    ?>
<br><br>
    <button><a href="adm.php">Voltar</a></button>
    </body>

    </html>
