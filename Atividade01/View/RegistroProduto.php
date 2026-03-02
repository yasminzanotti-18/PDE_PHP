<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produto Cadastro</title>
</head>
    <body>
        <a href="/PDE_PHP/Atividade01/produto/listar">Ir para a tela da Lista de Produtos</a>
        <form method="POST" action="Salvar">
            <input type="text" name="nome" placeholder="Nome do Produto" require>
            <input type="number" name="descricao" placeholder="Valor do Produto" require>
            <input type="number" name="quantidade" placeholder="Quantidade Disponível" require>
            <input type="date" name="data" placeholder="Data de Validade" require>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>