<?php

// ==========================================
// VALIDADOR PROFISSIONAL DE SENHAS
// ==========================================

function validarSenha($senha)
{
    $erros = [];

    // Regra 1: tamanho mínimo
    if (strlen($senha) < 8) {
        $erros[] = "A senha deve possuir pelo menos 8 caracteres.";
    }

    // Regra 2: letra maiúscula
    if (!preg_match('/[A-Z]/', $senha)) {
        $erros[] = "A senha deve possuir pelo menos uma letra maiúscula.";
    }

    // Regra 3: letra minúscula
    if (!preg_match('/[a-z]/', $senha)) {
        $erros[] = "A senha deve possuir pelo menos uma letra minúscula.";
    }

    // Regra 4: número
    if (!preg_match('/[0-9]/', $senha)) {
        $erros[] = "A senha deve possuir pelo menos um número.";
    }

    // Regra 5: caractere especial
    if (!preg_match('/[^a-zA-Z0-9]/', $senha)) {
        $erros[] = "A senha deve possuir pelo menos um caractere especial.";
    }

    return $erros;
}


// ==========================================
// PROGRAMA PRINCIPAL
// ==========================================

echo "============================================\n";
echo "       SISTEMA DE VALIDAÇÃO DE SENHAS      \n";
echo "============================================\n\n";

echo "Requisitos da senha:\n";
echo "- Mínimo de 8 caracteres\n";
echo "- Uma letra maiúscula\n";
echo "- Uma letra minúscula\n";
echo "- Um número\n";
echo "- Um caractere especial\n";

echo "\n--------------------------------------------\n";

echo "Digite sua senha: ";
$senha = trim(fgets(STDIN));

$erros = validarSenha($senha);

echo "\n============================================\n";
echo "              RELATÓRIO DE SEGURANÇA       \n";
echo "============================================\n";

if (count($erros) == 0) {

    echo "\nSTATUS: SENHA VÁLIDA\n";
    echo "Nível de segurança: FORTE\n";
    echo "Todas as regras foram atendidas.\n";

} else {

    echo "\nSTATUS: SENHA INVÁLIDA\n";
    echo "Problemas encontrados:\n\n";

    foreach ($erros as $erro) {
        echo "[ERRO] $erro\n";
    }

    echo "\nNível de segurança: FRACA\n";
}

echo "\n============================================\n";
echo "             FIM DO PROGRAMA               \n";
echo "============================================\n";

?>