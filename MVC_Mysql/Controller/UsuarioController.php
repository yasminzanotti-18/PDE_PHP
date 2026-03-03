 <?php 
 
 session_start(); //banco de dados
 require_once "./Model/Usuariomodel.php";

 class UsuarioController{
    public function telaCadastro(){
       require "View/usuarioCadastrar.php";
    }

    public function cadastrar(){
        $nome = $_POST['nome']; // Recebe os dados enviados pelo formulário (POST)
        $email = $_POST['email']; 

        $usuario = new Usuario($nome, $email); // Cria um objeto Usuario usando os dados recebidos
        $usuario->salvar();
        header('Location: /PDE_PHP/MVC_Mysql/usuario/telaCadastro');
        exit;
    }

    public function listarUsuario(){
        $usuarios = Usuario::listar();
        echo"<pre>";
        print_r($usuarios);
        echo"<pre>";
        require 'View/usuarioListar.php';
    }

    public function telaEditar(){
        $usuario = Usuario::buscar($_GET['id']);
        require 'View/usuarioEditar.php';
    }

    public function atualizar(){
        $usuario = new Usuario($_POST['nome'], $_POST['email']); // Cria objeto Usuario com os novos dados enviados pelo formulário
        $usuario ->atualizar($_GET['id']);
        header('location:/PDE_PHP/MVC_Mysql/usuario/telaEditar?id='. ($_GET['id']));
        exit;
    }

    public function excluir(){
        Usuario::excluir($_GET['id']); //executa o (exluir) que está na model 
        header('location:/PDE_PHP/MVC_Mysql/usuario/listar');// trocar o final por listar
        exit;
    }
 }

 ?>