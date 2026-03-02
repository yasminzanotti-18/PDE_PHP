<?php

class Produto{

    private $nome;
    private $preco;
    private $quantidade;
    private $validade;

    public function __construct($nome,$preco,$quantidade,$validade){
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->validade = $validade;
    }

    public function salvar(){

        if(!isset($_SESSION['produtos'])){
            $_SESSION['produtos'] = [];
        }

        $_SESSION['produtos'][] = [
            'nome'=>$this->nome,
            'preco'=>$this->preco,
            'quantidade'=>$this->quantidade,
            'validade'=>$this->validade
        ];
    }

    public static function listar(){
        return $_SESSION['produtos'] ?? [];
    }

    public static function excluir(){

    }
}

?>

