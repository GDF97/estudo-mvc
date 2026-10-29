# Estudo de MVC em PHP Puro

Este repositório tem como objetivo estudar e compreender a arquitetura **MVC (Model-View-Controller)**, aprendendo a aplicá-la em PHP puro, sem o uso de frameworks.

Para colocar os conceitos em prática, será desenvolvido um sistema simples de gerenciamento de usuários e tarefas, com funcionalidades para cadastrar usuários, associar tarefas a eles e visualizar os registros cadastrados.

## Funcionalidades

- Cadastro e listagem de usuários.
- Cadastro e listagem de tarefas.
- Associação de tarefas aos respectivos usuários.
- Visualização das tarefas de um usuário específico por meio de sua URL.

## Progresso dos estudos

- [x] Configurar o `.htaccess` para controlar as requisições.
- [x] Criar um roteador para interpretar URLs e direcionar as requisições.
  - Remover o prefixo padrão da URL (`/estudos/MVC/`).
  - Identificar rotas e exibir as páginas correspondentes.
  - Utilizar expressões regulares (`preg_match`) para identificar parâmetros nas URLs.
  - Trabalhar com URLs dinâmicas, como `/usuario/45`.
- [x] Aplicar a arquitetura MVC ao projeto.

## Objetivo final

Desenvolver um sistema funcional que permita cadastrar usuários e tarefas, relacioná-los e consultar as tarefas de um usuário específico por meio de uma rota como `/usuario/45`, utilizando os conceitos aprendidos durante o estudo da arquitetura MVC.
