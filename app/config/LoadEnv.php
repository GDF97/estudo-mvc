
<?php

function loadEnv(string $caminho): void
{
    if (!is_file($caminho) || !is_readable($caminho)) {
        throw new RuntimeException("Arquivo .env inexistente ou ilegível.");
    }

    $linhas = file($caminho, FILE_IGNORE_NEW_LINES);

    foreach ($linhas as $linha) {
        $linha = trim($linha);

        // Ignora linhas vazias e comentários
        if ($linha === '' || str_starts_with($linha, '#')) {
            continue;
        }

        // Separa a chave do valor no primeiro sinal de =
        $separador = strpos($linha, '=');

        if ($separador === false) {
            continue;
        }

        $chave = trim(substr($linha, 0, $separador));
        $valor = trim(substr($linha, $separador + 1));

        if ($chave === '') {
            continue;
        }

        // Remove aspas simples ou duplas externas
        if (
            strlen($valor) >= 2 &&
            (($valor[0] === '"' && $valor[strlen($valor) - 1] === '"') ||
             ($valor[0] === "'" && $valor[strlen($valor) - 1] === "'"))
        ) {
            $valor = substr($valor, 1, -1);
        }

        // Não sobrescreve variáveis de ambiente já existentes
        if (getenv($chave) !== false) {
            continue;
        }

        putenv("$chave=$valor");
        $_ENV[$chave] = $valor;
    }
}
