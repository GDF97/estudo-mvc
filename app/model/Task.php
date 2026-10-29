<?php


class Task
{
    /* TODO
        pegar todos as tarefas
        cadastrar tarefa com usuário
    */

        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function getAllTasks()
        {
            try {
                $sql = "select T.id as 'taskId', T.name as 'taskName', U.name as 'userName', U.id as 'userId'  from tb_task T join tb_user U where T.fk_user = U.id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $tasks;
            } catch (Throwable $th) {
                return $th;
            }
        }

        public function createTask(int $userId, string $taskName)
        {
            try {
                $sql = "INSERT INTO tb_task (fk_user, name) VALUES (:fk_user, :name)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':fk_user', $userId);
                $stmt->bindParam(':name', $taskName);
                $stmt->execute();

                return array([
                    "message" => "Tarefa cadastrada com sucesso",
                    "status" => "ok"
                ]);

            } catch (\Throwable $th) {
                return $th;
            }
        }

        public function getTasksByUser(int $userId)
        {
            try {
                // $sql = "SELECT * FROM tb_task WHERE fk_user = :id";
                 $sql = "select T.id as 'taskId', T.name as 'taskName', U.name as 'userName' from tb_task T join tb_user U on T.fk_user = U.id where T.fk_user = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":id", $userId);
                $stmt->execute();

                $userTasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $userTasks;

            } catch (Throwable $th) {
                return $th;
            }
        }

}


?>