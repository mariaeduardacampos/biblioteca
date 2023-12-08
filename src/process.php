<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/process.css">
    <link rel="shortcut icon" href="src/icon.png">
    <title>Registro de Empréstimo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 15px;
        }

        .success-message {
            color: #4CAF50;
            font-weight: bold;
        }

        .error-message {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include 'db.php'; ?>

<div class="container">
    <?php

        $nome = $_GET["nome"];
        $livro = $_GET["livro"];
        $data_emprestimo = $_GET["data_emprestimo"];

        // Aqui você pode realizar as operações necessárias com os dados, como salvar em um banco de dados, etc.

        // Exemplo de exibição dos dados (pode ser substituído pelo processamento real)
        echo "<h2>Empréstimo registrado com sucesso!</h2>";
        echo "<p>Nome do Aluno: $nome</p>";
        echo "<p>Livro: $livro</p>";
        echo "<p>Data de Empréstimo: $data_emprestimo</p>";
    ?>
</div>

</body>
</html>