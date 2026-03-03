<?php
 //model faz ação no banco de dados (conecxão com banco de dados)

 require_once "./database/Database.php";

class Usuario{
    private $nome;
    private $email;


    public function __construct ($nome, $email){
        $this-> nome = $nome; // $this representa o objeto atual
        $this-> email = $email;
    }

    public function salvar(){
        $pdo = Database::conectar(); // Conecta ao banco usando PDO
        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)"; 
        $stmt = $pdo->prepare($sql);  // Prepara o comando SQL
        $stmt->execute(['nome' => $this->nome, 'email' => $this->email]); // Executa enviando os valores
    }

    public static function listar(){ // retorna a lista de usuario 
        $pdo = Database::conectar();
        $stmt = $pdo->query("SELECT * FROM usuarios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos registros em array associativo
    }

    public static function buscar ($id){
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id){  // Executa atualização
       $pdo = Database::conectar();
       $stmt= $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
       $stmt->execute(['id' => $id, 'nome' => $this->nome, 'email' => $this->email]);
    }

    public static function excluir($id){ // Comando SQL DELETE
    $pdo = Database::conectar();
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->execute(['id' =>$id]);
    
    }

}





?>

