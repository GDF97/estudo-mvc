
<?php


require_once __DIR__ . "/app/core/Router.php";
include  __DIR__ . "/Database.php";
require_once __DIR__ . "/app/controller/HomeController.php";
require_once __DIR__ . "/app/controller/UserController.php";
require_once __DIR__ . "/app/controller/TaskController.php";


$home = new HomeController();

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];
// Remove o caminho da pasta do projeto.
$url = str_replace('/estudos/MVC', '', $url);

$router = new Router($pdo);

$router->dispatch($url, $method);


// if ($url === '/') {
//     $home->index();
// } elseif ($url === '/usuarios') {
//     echo 'Lista de usuários';
// } elseif (preg_match('#^/produtos/([0-9]+)$#', $url, $matches)) {
//     $id = $matches[1];
//     echo 'Detalhes do produto: ' . htmlspecialchars($id);
// } else {
//     http_response_code(404);
//     echo 'Página não encontrada';
// }