<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Editar🐒</title>
</head>
<body>
 <h2>Editar usuário🐒<h2>
 <a href="/PDE_PHP/MVC_Mysql/usuario/listar"> Ir para tela Listar</a>
    <form method="POST" action="atualizar?id=<?= $_GET['id']?>">
        <input type="text" name="id" value="<?= htmlspecialchars($_GET['id'])?>" disabled>
        <input type="text" name="nome" value="<?= htmlspecialchars($usuario['NOME'])?>"require>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['EMAIL'])?>"require>
        <button type="sumit">Editar</button>
   </form>
  </body>
</html>