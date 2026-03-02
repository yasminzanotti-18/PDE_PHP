<?php

session_start(); // Onde salva as informações

require_once "./Model/ProdutoModel.php";

class ProdutoController{ // Mostrar tela de cadastro 

    public function telaRegistro(){ //
        require "View/RegistroProduto.php";
    }

    public function registrar() { // Recebe os dados enviados pelo formulário 
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $data = $_POST['data'];

        $produto = new Produto($nome, $descricao, $quantidade, $data); // Cria um objeto Produto com os dados recebidos
        $produto ->Salvar();
        // Redireciona para a tela de cadastro após salvar
        header ('Location: /PDE_PHP/Atividade01/produto/telaRegistro');
        exit;
    }

    public function listarProdutos(){ //listar produtos 
        $produtos = Produto::listar(); 
        echo "<pre>";
        print_r($produtos);
        echo "</pre>";
        require 'View/ProdutoListar.php';
    }

    public function telaEditar(){
        $produto = Produto ::buscar($_GET['id']); // Busca o produto pelo ID recebido via GET
        require 'View/produtoEditar.php'; // Abre a View com formulário preenchido
    }

    public function atualizar(){
        $produto = new Produto($_POST['nome'], $_POST['descricao'], $_POST['quantidade'], $_POST['data']);
        $produto->atualizar($_GET['id']);
        header ('Location: /PDE_PHP/Atividade01/produto/telaEditar?id='.($_GET['id'])); // Redireciona novamente para tela de edição
        exit;
    }

    public function excluir(){
        Produto::excluir($_GET['id']); // Remove o produto pelo ID
        header ('Location: /PDE_PHP/Atividade01/produto/listar');
        exit;
    }
}