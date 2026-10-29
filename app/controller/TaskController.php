<?php

require_once __DIR__ . "/../model/Task.php";
require_once __DIR__ . "/../model/User.php";

class TaskController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function showTasks()
    {
        $modelTask = new Task($this->pdo);
        $tasks = $modelTask->getAllTasks();
        require_once __DIR__ ."/../views/ShowTasks.php";

    }

    public function showForms()
    {
        $userModel = new User($this->pdo);
        $users = $userModel->getUsers();
        require_once __DIR__ . "/../views/CreateTask.php";

    }

    public function createTask(int $userId, string $taskName)
    {
        $task = new Task($this->pdo);
        $response = $task->createTask($userId, $taskName);
        return $response;
    }

    public function showTasksByUser(int $userId)
    {
        $task = new Task($this->pdo);
        $userTasks = $task->getTasksByUser($userId);
        require_once __DIR__ . "/../views/UserTasks.php";
    }
}

?>