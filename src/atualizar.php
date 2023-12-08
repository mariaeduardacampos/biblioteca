<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM livro WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listar.php');
    exit;
}
$nome= $appointment['nome'];
$autor= $appointment['autor'];
$secao= $appointment ['secao'];
$codigo= $appointment['codigo'];
?>

<!DOCTYPE html>
<link rel="stylesheet" href="atualizar.css">
<link rel="shortcut icon" href="src/icon.png">
<html>
<head>
    <title>Atualizar livro</title>
</head>
<body>
     <h1>Atualizar Livro</h1>
     <form method="post">
<div class="container">       
     <label for="nome">Nome</label>
        <input type="text" name="nome" required><br> 

        <label for="autor">Autor</label>
        <input type="text" name="autor" required><br> 

        <label for="secao">Seção</label>
        <input type="text" name="secao" required><br> 

        <label for="codigo">Código</label>
        <input type="text" name="codigo" required><br> 

        <button type="submit">Atualizar</button>
</div>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $autor = $_POST['autor'];
    $secao= $_POST['secao'];
    $codigo = $_POST['codigo'];
    $id = $appointment['id'];

    $stmt = $pdo->prepare('UPDATE livro SET nome = ?, autor = ?, secao= ?, codigo = ? WHERE id = ?');
    $stmt->execute([$nome, $autor, $secao, $codigo, $id]);
    header('Location: listar.php');
exit;
}