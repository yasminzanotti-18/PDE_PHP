<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto</title>
</head>

<body>

<a href="/PDE_PHP/Atividade01/produto/telaCadastro">Cadastrar Produto </a>

<h2>Lista de Produtos</h2>

<table border="1">

<tr>
<th>Nome</th>
<th>Preço</th>
<th>Quantidade</th>
<th>Validade</th>
<th>Ações</th>
</tr>

<?php foreach($produtos as $p): ?>

<tr>

<td><?= $p['nome']?></td>
<td><?= $p['preco']?></td>
<td><?= $p['quantidade']?></td>
<td><?= $p['validade']?></td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>