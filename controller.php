<?php
$acao = $_POST['acao'];

if ($acao === 'entrar') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $arquivo = fopen('pessoas.csv', 'r');
    
    $pessoas = [];

    while ($linha = fgetcsv($arquivo)) {
        $arrayLinha = explode(';', $linha[0]);

        $pessoa = [
            'codigo' => $arrayLinha[0],
            'nome' => $arrayLinha[1],
            'senha' => $arrayLinha[2],
            'idade' => $arrayLinha[3],
            'sexo' => $arrayLinha[4]
        ];

        array_push($pessoas, $pessoa);
    }


    $usuarioEncontrado = false;

    foreach ($pessoas as $pessoa) {
        if ($usuario == $pessoa['nome'] && $senha == $pessoa['senha']) {

            $usuarioEncontrado = true;
            break;
        }
    };

    session_start();

    if ($usuarioEncontrado == true) {
        $_SESSION['logado'] = true;
        header('Location: telaProdutos.php');
    } 
    else {
        header('Location: telaLogin.php');
    }

    exit();
} 
elseif ($acao === 'Cadastrar') {
    $desricao = $_POST['descricao'];


    $preco = floatval($_POST['preco']);

    $arquivo = fopen('products.csv', 'r');

    $produtos = [];

    while ($linha = fgetcsv($arquivo)) {
        $arrayLinha = explode(';', $linha[0]);

        $produto = [
            'codigo' => $arrayLinha[0],
            'descricao' => $arrayLinha[1],
            'preco' => $arrayLinha[2],
        ];


        array_push($produtos, $produto);
    }

    fclose($arquivo);

    $arquivo = fopen('products.csv', 'a');

    $produto = [
        count($produtos) + 1,
        "$desricao",
        $preco
    ];

    fputcsv($arquivo, $produto, ';');

    fclose($arquivo);

    header('Location: telaProdutos.php');
    exit();
}
elseif ($acao === 'cadastrarPessoa') {
    $nome = $_POST['nome'];

    $senha = $_POST['senha'];

    $idade = $_POST['idade'];

    $sexo = $_POST['sexo'];

    $arquivo2 = fopen('C:\xampp\htdocs\pessoas.csv', 'r');

    $pessoas = [];

    while ($linha = fgetcsv($arquivo2)) {
        $arrayLinha = explode(';', $linha[0]);

        $pessoa = [
            'codigo' => $arrayLinha[0],
            'nome' => $arrayLinha[1],
            'senha' => $arrayLinha[2],
            'idade' => $arrayLinha[3],
            'sexo' => $arrayLinha[4],
        ];


        array_push($pessoas, $pessoa);
    }

    fclose($arquivo2);

    $arquivo2 = fopen('C:\xampp\htdocs\pessoas.csv', 'a');

    $pessoa = [
        count($pessoas) + 1,
        $nome,
        $senha,
        $idade,
        $sexo
    ];

    fputcsv($arquivo2, $pessoa, ';');

    fclose($arquivo2);

    header('Location: telaPessoas.php');
    exit();
}