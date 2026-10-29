<?php

$baseURL = "/estudos/MVC"

?>

<a href="<?= $baseURL ?>">home</a>
<a href="<?= $baseURL ?>/tarefas/cadastrar">cadastrar tarefas</a>
<h1>Tarefas</h1>

<?php

foreach ($tasks as $task) {
    echo "Usuário: " . "<a href='". $baseURL . "/usuarios/" . $task['userId'] . "'>" . $task['userName'] ."</a>"  . " ";
    echo "Tarefa: " . $task['taskName'] . " ";
    echo "<br><br>";
}

?>