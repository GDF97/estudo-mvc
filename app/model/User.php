<?php


class User
{
    /* TODO
        pegar todos os usuários
        cadastrar usuários
    */
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function getUsers()
        {
            try {
                $sql = "SELECT * FROM tb_user";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $users;

            } catch (Throwable $th) {
                return $th;
            }
        }

        public function createUser(string $name)
        {
            try {
                $sql = "INSERT INTO tb_user (name) VALUES (:name)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(":name", $name);
                $stmt->execute();

                return array([
                    "message" => "Usuário cadastrado com sucesso",
                    "status" => "ok"
                ]);

            } catch (Throwable $th) {
                return $th;
            }
        }
}


?>