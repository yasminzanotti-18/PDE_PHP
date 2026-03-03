<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuario</title>
</head>
<body>
    <a href="/PDE_PHP/MVC_Mysql/usuario/telaCadastro"> Ir para tela Usario Cadastrar</a>
    <h2>Usuários</h2>
    <table border= "1">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
       </tr>
       <?php foreach($usuarios as $id => $u): ?>
        <tr>
            <td><?= $u['NOME']?></td>
            <td><?= $u['EMAIL']?></td>
            <td>
            <a href= "/PDE_PHP/MVC_Mysql/usuario/telaEditar?id=<?=$u['ID']?>">Editar</a>
            <a href= "/PDE_PHP/MVC_Mysql/usuario/excluir?id=<?=$u['ID']?>">Excluir</a>
       </td>
       </tr>
       <?php endforeach; ?>
    </table>
 </body>
</html>