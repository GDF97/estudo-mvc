<?php
    $baseURL = "/estudos/MVC";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuários</title>
</head>
<body>
    <div>
        <a href="<?= $baseURL ?>" >voltar</a>
        <a href="<?= $baseURL ?>/usuarios/cadastrar">cadastrar usuário</a>
        <h1>Lista de usuários</h1>
    </div>
    <?php 
        // var_dump($users);
        if(!$users){
            echo "sem usuários";
        } else {
        foreach($users as $user) { ?>
            <p> <a href="<?= $baseURL ?>/usuarios/<?= $user['id'] ?>"><?=  htmlspecialchars($user['name'])  ?></a> </p>
            
    <?php } }?>
</body>
</html>