<?php //Início do PHP

require_once "Controller/produtoController.php"; //Criando o produto

$ProdutoController = new produtoController(); //Criando uma classe
$route = $_GET["route"] ?? '';

switch ($route) {
    case 'produto/telaRegistro':
        $ProdutoController -> telaRegistro(); //Função tela cadastro
        break;

    case 'produto/Salvar':
        $ProdutoController -> registrar(); //registra 
        break;

    case 'produto/listar':
        $ProdutoController-> listarProdutos (); //lista
        break;

    case 'produto/telaEditar':
        $ProdutoController->telaEditar(); //edita
        break;

    case 'produto/atualizar': 
        $ProdutoController->atualizar(); //atualiza
        break;

    case 'produto/excluir':
        $ProdutoController->excluir(); //exclui
        break;

    default:
        echo "Página não Encontrada!";
        break;
}