<?php 
    $baseURL = "/estudos/MVC";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
</head>
<body>
    <h1>Bem vindo ao estudo de MVC e .htaccess</h1>
    <a href="<?=  $baseURL ?>/sobre">sobre o projeto</a>
    <br>
    <a href="<?=  $baseURL ?>/usuarios">usuários</a>
    <br>
    <a href="<?=  $baseURL ?>/tarefas">tarefas</a>
</body>
</html>