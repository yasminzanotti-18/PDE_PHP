<?php

class Produto { // Atributos privados do produto
    // Só podem ser acessados dentro da classe
    private $nome;
    private $descricao;
    private $quantidade;
    private $data;

    public function __construct($nome, $descricao, $quantidade, $data) { // Executa automaticamente quando cria um objeto Produto
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->data = $data;
    }

    public function Salvar() {
        if(!isset ($_SESSION['produtos'])){  // Verifica se ainda não existe a lista de produtos na sessão
            $_SESSION['produtos'] = [];
        }

        $_SESSION['produtos'][] = [ // Adiciona um novo produto no array da sessão
            'nome' => $this->nome,
            'descricao' =>$this->descricao,
            'quantidade' =>$this->quantidade,
            'data' =>$this->data
        ];
    }

    public static function listar () {
      // Retorna todos os produtos salvos
        // ?? [] → se não existir retorna array vazio
        return $_SESSION['produtos'] ?? [];
    }

    public static function buscar($id) {
        // Retorna a edição de um usuario
        
        return $_SESSION['produtos'] [$id] ?? null;  // Retorna o produto específico pelo índice
    }

    public function atualizar($id){
        if(isset($_SESSION['produtos'][$id])) { // Verifica se o produto existe
        $_SESSION['produtos'][$id] = [ // Atualiza os novos dados
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'quantidade' => $this->quantidade,
            'data' => $this->data
        ];
    }
}

    public static function excluir($id){  // Remove o produto da sessão
        if(isset($_SESSION['produtos'][$id])) {
            unset($_SESSION['produtos'][$id]);
        }
    }

}