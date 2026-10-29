<head>
    <title>Criar task</title>
</head>
<a href="/estudos/MVC/">home</a>
<h1>Criar tarefa</h1>
<form action="/estudos/MVC/tarefas" method="POST">
    <p>Nome da tarefa</p>
    <input type="text" name="taskName" id="taskName" placeholder="digite o nome da tarefa">
    <p>Escolha o usuário responsável</p>
    <select name="user" id="user">
        <?php 
            if(empty($users))
            {
                echo "<option selected disabled>Nenhum usuário cadastrado</option>";
            }
            foreach($users as $user)
            { ?>
                <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
           <?php };
        ?>
    </select>
    <br>
    <br>
    <?php
        if(empty($users))
        {
            echo "<button type='submit' disabled>Cadastrar</button>";
        }
        else
        {
            echo "<button type='submit'>Cadastrar</button>";
        }
    ?>
</form>
