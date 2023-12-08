<?php
include 'db.php';

if (!isset ($_GET['id'])) {
    header('location: listarusuario.php');
    exit;

}

$id = $_GET ['id'];
$stmt = $pdo->prepare('SELECT * FROM usuario WHERE id = ?');
$stmt-> execute([$id]);
$appointment = $stmt-> fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header ('location: listarusuario.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM usuario WHERE id = ?');
    $stmt->execute ([$id]);

   header ('location: listarusuario.php');
   exit;
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar card</title>
    <link rel="stylesheet" href="deletar.css">
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar usuário</title>
    <link rel="stylesheet" href="deletar.css">
</head>
<body>
    <h1> Deletar usuário </h1>

        <form method="post">
            <button type= "submit" >sim </button> 
            <a href = "listarusuario.php"> não </a>
</form> </body> </html>
