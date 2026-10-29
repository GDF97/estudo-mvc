# Anotações .htaccess

.htaccess é um arquivo de configuração do apache ele permite criar regras referente aos diretorios (Pastas/Estrutura do projeto)

Principais utilizações
- Criar URLs costumizadas/amigaveis 
   - ex: /usuários em vez de /index.php?pagina=usuários
- Redirecionamento 
- Bloquear acesso a arquivos e pastas.
- Impedir a listagem de arquivos de um diretório.
- Configurar páginas de erro.
- Aplicar algumas regras de segurança.

Como iniciar a configuração de reescrita da url?
Para inicializar é necessário colocar a regra "RewriteEngine On", após isso você pode começar a escrever as regras de reescrita da url atraves do "RewriteRules" e em seguida a regra que deve ser colocada o simbolo "^" representa o inicio da regra e o simbolo "$" representa o final de ssa regra, e entre esses dois simbolos é a regra que o motor irá pesquisar, após isso você deve apontar para onde será a saída dessa nova regra e o [L] no final representa o fim da regra como se fosse um ponto e virgula, no exemplo a seguir irei colocar uma regra para que quando o usuário acesse a rota /usuarios seja redirecionado para o arquivo index.php

```
RewriteEngine On

RewriteRule ^usuarios$ index.php [L]
```
 
 Passando para o proximo passo nós encontramos o "RewriteCond" como o proprio nome propõe, é uma especie de condição onde iremos verificar se algo é verdadeiro ou falso. O maior problema que iremos encontrar a partir de agora é ter que escrever uma regra pra cada URL, e isso pode se tornar extenso e cansativo, o RewriteCond nos ajuda com isso pois podemos verificar se o que foi solicitado pelo servidor é um arquivo, uma rota ou uma pasta, para isso iremos utilizar uma keyword %{REQUEST_FILENAME} que representa o arquivo que foi solicitado para o servidor, junto com isso iremos utilizar combinação de keywords "!-f" e "!-d". O "!-f" faz uma afirmação de que o que foi solicitado NÃO é um arquivo, ou seja se o servidor requisitar um style.css e ele existir, essa será uma afirmação falsa, já que é um arquivo, e o "!-d" é referente ao diretorio, ele faz uma afirmação de que NÃO é um diretorio, e caso for um diretorio essa afirmação será falsa. No fim de tudo isso vem agora a regra RewriteRule ^ index.php [L], agora ela só será acessada caso as duas afirmações anteriores forem verdadeiras, ou seja, se o que o servidor solicitou não é nem um arquivo e nem uma pasta ele so pode ser uma rota e assim redirecionar para o index.php
 
 PS: o index.php no futuro será utilizado para redirecionar para outras páginas
 
 ```
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [L]
 ```
 
 Beleza, para o proximo passo iremos aprender a capturar partes da URL, vamos imaginar que você queira acessar um determinado usuário através do ID dele, normalmente no php iriamos passar através do nome do arquivo + a variavel GET para resgatar, algo como ```index.php?id=1``` porém, não queremos que o nosso usuário acesse desse jeito, para isso iremos reescrever as regras de URL para que ele possa acessar algo do tipo ```/usuarios/1```. Para fazer isso iremos precisar iniciar uma regra de reescrita ou seja ```ReewriteRule``` e iremos colocar a regra ```^usuarios/([0-9]+)$ index.php?id=$1 [L] ```, o que cada parte dessa regra faz? Bom ja sábemos que o ^ e o $ determina o inicio e o fim, entre eles colocamos uma regra para que caso seja acessado a url "usuarios" depois da barra ele irá aceitar um numero entre 0-9 com mais de um digito, e após isso ele irá pegar esse digito e colocar no lugar do $1, isso é algo que o APACHE faz por baixo dos panos com isso se o usuário acessar a URL ```usuarios/69```o apache ira redirecionar internamente para ```index.php?id=69```
 
 Ainda  na mesma pegada podemos "aninhar" parametros para formar uma url com mais de um parametro, por exemplo, se eu quiser acessar a url ```categorias/1/produtos/2```para acessar o produto 2 da categoria 1 eu precisaria enviar para o servidor a requisição ```index.php?categoria_id=1&produto_id=2``` mas não queremos escrever tudo isso, então escrevemos a seguinte regra ```RewriteRule ^categorias/([0-9]+)/produtos/([0-9]+)$ index.php?cat=$1&prod=$2 [L]``` segue a mesma logica da regra anterior porém com o adicional do "&" para adicionar mais uma condição e isso poderia se estender por mais e mais parametros
 
 Se uma regra não estiver de acordo você pode redirecionar ela com os parametros no final [R=302,L] esse R é de redirecionamento e o 302 é o codigo http que representa um redirecionamento temporario, exemplo no codigo:
 
 ```
 # Se alguém tentar acessar a url /antigo ele automaticamente redireciona para a url /novo com o status code de redirecionamento temporario
 RewriteRule ^antigo$ novo [R=302,L] 
```

Uma das partes mais importantes agora é controlar o que pode ou não ser acessado, então se queremos proteger algum arquivo de ser acessado de maneira indevida podemos escrever uma regra para que seja bloqueado, por exemplo, eu nao quero que os usuários acessem por conta propria a url ```app/views/CreateUser.php``` então eu crio uma regra que pega todos as URLs que comecem com "app" e adiciono o simbolo de menos (-) para que não seja reescrito para outro destino e por fim eu retorno o erro 403 através da letra F e finalizo a linha de regra com o L

```.htaccess
RewriteRule ^app/ - [F,L]
```

Caso eu queira excluir um arquivo em especifico eu posso utilizar a regra "FilesMatch" e dentro dela colocar que todas as requisições serão negadas, a estrutura do FilesMatch segue da seguinte maneira, é uma tag igual a do html e após o nome da tag eu abro e fecho aspas e dentro dela coloco a regra para quais arquivos não podem ser acessados, nesse caso, o .env da aplicação

```
<FilesMatch "^\.env$">
    Require all denied
</FilesMatch>
```