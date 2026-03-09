<?php

session_start();

require_once "./Model/BibliotecaModel.php";

class LivroController{

    public function telaCadastro(){
        require "View/livroCadastro.php";
    }

    public function cadastrar() {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $ano_publicacao = $_POST['ano_publicacao'];
        $editora = $_POST['editora'];

        $livro = new Livro($titulo, $autor, $ano_publicacao, $editora);
        $livro->Salvar();

        header ('Location: /PDE_PHP/MVC_prova/livro/telaCadastro');
        exit;
    }

    public function listarLivros(){
        $livros = Livro::listar();
        require 'View/LivrosListar.php';
    }

    public function telaEditar(){
        $livro = Livro::buscar($_GET['id']);
        require 'View/LivroEditar.php';
    }

    public function atualizar(){
        $livro = new Livro($_POST['titulo'], $_POST['autor'],$_POST['ano_publicacao'], $_POST['editora']);
        $livro->atualizar($_GET['id']);
        header ('Location: /PDE_PHP/MVC_prova/livro/telaEditar?id= '.($_GET['id']));
        exit;
    }

    public function excluir (){
        Livro::excluir($_GET['id']);
        header ('Location: /PDE_PHP/MVC_prova/livro/listar');
        exit;
    }
}

?>