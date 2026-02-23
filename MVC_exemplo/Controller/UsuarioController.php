 <?php 
 
 session_start(); //banco de dados
 require_once "./Model/Usuariomodel.php";

 class UsuarioController{
    public function telaCadastro(){
       require "View/usuarioCadastrar.php";
    }

    public function cadastrar(){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $usuario = new Usuario($nome, $email);
        $usuario->salvar();
        header('Location: /PDE_PHP/MVC_exemplo/usuario/telaCadastro');
        exit;
    }

    public function listarUsuario(){
        $usuarios = Usuario::listar();
        echo"<pre>";
        print_r($usuarios);
        echo"<pre>";
        require 'View/usuarioListar.php';
    }

 }

 ?>