<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listarusuario.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM usuario WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listarusuario.php');
    exit;
}
$nomecompleto= $appointment['nomecompleto'];
$nomeusuario= $appointment['nomeusuario'];
$email= $appointment ['email'];
$senha= $appointment['senha'];
$endereco= $appointment['endereco'];
$cep= $appointment['cep'];

?>

<!DOCTYPE html>
<link rel="stylesheet" href="atualizar.css">
<link rel="shortcut icon" href="src/icon.png">
<html>
<head>
    <title>Atualizar usuario</title>
</head>
<body>
     <h1>Atualizar usuario</h1>
     <form method="post">
<div class="container">       
     <label for="nomecompleto">Nome completo</label>
        <input type="text" name="nomecompleto" required><br> 

        <label for="nomeusuario">Nome de usuário</label>
        <input type="text" name="nomeusuario" required><br> 

        <label for="email">E-mail</label>
        <input type="email" name="email" required><br> 

        <label for="senha">Senha</label>
        <input type="text" name="senha" required><br> 

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" required><br> 

        <label for="cep">CEP</label>
        <input type="text" name="cep" required><br> 

        <button type="submit">Atualizar</button>
</div>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomecompleto = $_POST['nomecompleto'];
    $nomeusuario = $_POST['nomeusuario'];
    $email= $_POST['email'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $id = $appointment['id'];

    $stmt = $pdo->prepare('UPDATE usuario SET nomecompleto = ?, nomeusuario = ?, email = ?, senha = ?, endereco = ?, cep = ? WHERE id = ?');
    $stmt->execute([$nomecompleto, $nomeusuario, $email, $senha, $endereco, $cep, $id]);
    header('Location: listarusuario.php');
exit;
}