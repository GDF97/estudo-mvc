<?php

    // TODO
    // Retornar uma view explicando do que se trata esse site

    Class  HomeController
    {
        public function index()
        {
            require_once __DIR__ . "/../views/Home.php";
        }

        public function about()
        {
            require_once __DIR__ . "/../views/About.php";
        }
    }

?>