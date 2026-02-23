<?php

session_start();
require_once "Model/Produto.php";

class ProdutoController{
    public function telaCadastro(){
        require "View/Cadastro.php";
    }

    public function cadastrar(){
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $validade = $_POST['validade'];

        $produto = new Produto($nome,$preco,$quantidade,$validade);
        $produto->salvar();
        header('Location: /PDE_PHP/Atividade01/produto/listarProduto');
        exit;
    }

    public function listarProduto(){
        $produtos = Produto::listar();
        echo"<pre>";
        print_r($produtos);
        echo"<pre>";
        require 'View/ListarProduto.php';
    }
} 

?>