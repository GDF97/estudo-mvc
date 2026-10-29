<?php

/*

Rotas
- get: usuários
- get: usuarios/cadastrar (Mostrar formulário)
- post: usuarios/cadastrar (Enviar requisição de cadastrar usuário)
- get: tarefas (mostra todas as tarefas e o usuário responsável)
- get: tarefas/cadastrar (Mostrar formulário)
- post: tarefas/cadastrar (Enviar requisição de cadastrar usuário)
- get: usuarios/id (Mostrar as tarefas de determinado usuário)
*/

class Router
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function dispatch($url, $method)
    {
        $url = rtrim($url, '/') ?: '/';

        // // substituir por switch case
        if ($url === '/') {
            $controller = new HomeController();
            $controller->index();
        } 
        elseif ($url === '/sobre') {
            $controller = new HomeController();
            $controller->about();
        } 
        elseif ($url === '/usuarios') {
            $controller = new UserController($this->pdo);
            if($method == "GET")
            {
                $controller->showUsers();
            }

            if($method == "POST")
            {
                $controller->createUser($_POST['name']);
                header("location: /estudos/MVC/usuarios");
            }
        } 
        elseif ($url === '/usuarios/cadastrar') {
            $controller = new UserController($this->pdo);
            $controller->showForms();
        }  
        elseif(preg_match('#^/usuarios/([0-9]+)$#', $url, $matches)){
            $id = $matches[1];
            $controller = new TaskController($this->pdo);
            $controller->showTasksByUser($id);
        }
        elseif($url === '/tarefas')
        {
            if($method == "GET")
            {
                $controller = new TaskController($this->pdo);
                $controller->showTasks();
            }

            if($method == "POST")
            {
                $controller = new TaskController($this->pdo);
                $controller->createTask($_POST['user'], $_POST['taskName']);
                header("location: /estudos/MVC/tarefas");
            }
        }
        elseif($url === '/tarefas/cadastrar')
        {
            $controller = new TaskController($this->pdo);
            $controller->showForms();
        }
        else{
            echo "default";
        }
    }
}

?>