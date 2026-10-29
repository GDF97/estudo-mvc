<?php

$baseURL = "/estudos/MVC"

?>

<a href="<?= $baseURL ?>">home</a>
<a href="<?= $baseURL ?>/tarefas">tarefas</a>
<a href="<?= $baseURL ?>/tarefas/cadastrar">cadastrar tarefas</a>
<h1>Tarefas</h1>

<?php

if(empty($userTasks))
{
    echo "Sem tarefas para esse usuário";
}

foreach ($userTasks as $task) {
    // echo $task['taskId'] . " ";
    echo "<li>" . $task['taskName'] . "</li> ";
    // echo $task['userName'] . " ";
    echo "<br><br>";
}

?>