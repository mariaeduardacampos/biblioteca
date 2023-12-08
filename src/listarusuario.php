<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "listar.css">
        <title> Lista de usuários </title>
        <link rel="shortcut icon" href="src/icon.png">
</head>
<body class= "listar">
    <h1>Lista de usuários </h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM usuario');
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count ($usuarios) == 0) {
        echo '<p> Nenhum usuario foi cadastrado. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr><th>Nomecompleto</th><th>Nomeusuario</th><th>Email</th><th>Senha</th><th>Endereco</th><th>Cep</th><th colspan="2">Opções</th></thead>';
        echo '<tbody>';

        foreach ($usuarios as $usuario) {
            echo '<tr>';
            echo '<td>' . $usuario['nomecompleto'] . '</td>';
            echo '<td>' . $usuario['nomeusuario'] . '</td>';
            echo '<td>' . $usuario['email'] . '</td>';
            echo '<td>' . $usuario['senha'] . '</td>';
            echo '<td>' . $usuario['endereco'] . '</td>';
            echo '<td>' . $usuario['cep'] . '</td>';


            echo '<td><a style="color:black;" href="atualizarusuario.php?id=' . $usuario ['id'] . '">Atualizar </a></td>';
            echo '<td><a style="color:black;" href="deletarusuario.php?id=' . $usuario ['id'] . '">Deletar</a></td>';
            echo '<try>';
            
        }
        echo '</tbody>';
        echo '</table>';

    }

    ?>
<br><br>
    <button><a href="adm.php">Voltar</a></button>
    </body>

    </html>
