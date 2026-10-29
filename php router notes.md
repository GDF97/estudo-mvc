# Anotações PHP Router

Agora que entendemos como funciona o .htaccess, iremos para o router. Precisamos deixar a configuração do .htaccess desse jeito:

```
RewriteEngine On

RewriteCond ${REQUEST_FILE} !-f

RewriteCond ${REQUEST_FILE} !-d

RewriteRule ^ index.php [L]
```

A lógica agora é o seguinte todo tipo de URL irá bater no arquivo index.php, e dentro desse arquivo precisamos recuperar o que está na URL, para resgatar o que está na URL usamos a seguinte função ```$_SERVER['REQUEST_URI']```, porém, essa linha por sí só apenas tras o que está na URL, precisamos tratar ela, parsear com o "parse_url" e ficará assim ```$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);```