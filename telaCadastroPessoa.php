<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Pessoa</title>
</head>

<body>
    <?php require 'menu.html'; ?>
    <h1>Cadastro Pessoa</h1>
    <form action="controller.php" method="post">
        <label for="nome">Nome da Pessoa</label>
        <br>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="senha">Senha</label>
        <br>
        <input type="password" name="senha" id="senha" required>
        <br>
        <label for="idade">Idade da Pessoa</label>
        <br>
        <input type="number" name="idade" id="idade" step="any" required>
        <br>
        <label for="sexo">Sexo da Pessoa</label>
        <br>
        <select name="sexo" id="sexo">
            <option value="">Selecione...</option>
            <option value="F">Feminino</option>
            <option value="M">Masculino</option>
        </select>
        <br>
        <br>
        <input type="hidden" name="acao" id="acao" value="cadastrarPessoa">
        <input type="submit" value="Cadastrar Pessoa">
    </form>
</body>
</html>