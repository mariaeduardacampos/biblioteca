<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listarusuario.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM reserva WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listarreserva.php');
    exit;
}
$nome= $appointment['nome'];
$livro= $appointment['livro'];
$data_emprestimo= $appointment ['data_emprestimo'];
?>

<!DOCTYPE html>
<link rel="stylesheet" href="atualizar.css">
<link rel="shortcut icon" href="src/icon.png">
<html>
<head>
    <title>Atualizar reserva</title>
</head>
<body>
     <h1>Atualizar reserva</h1>
     <form method="post">
<div class="container">       
     <label for="nome">Nome</label>
        <input type="text" name="nome" required><br> 

        <label for="livro">Nome do livro</label>
        <input type="text" name="livro" required><br> 

        <label for="data_emprestimo">Data de emprestimo</label>
        <input type="date" name="data_emprestimo" required><br>

        <button type="submit">Atualizar</button>
</div>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $livro = $_POST['livro'];
    $data_emprestimo= $_POST['data_emprestimo'];
    $id = $appointment['id'];

    $stmt = $pdo->prepare('UPDATE reserva SET nome = ?, livro = ?, data_emprestimo = ? WHERE id = ?');
    $stmt->execute([$nome, $livro, $data_emprestimo, $id]);
    header('Location: listarreserva.php');
exit;
}