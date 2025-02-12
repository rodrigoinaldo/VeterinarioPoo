<?php

class Tratamento{
        // definindo o nome do atributo
        public $codigo;
        public $nome;
        public $descricao;
    
        // um contrutor pode dar um valor ou nao a uma variavel
        function __construct($codigo = null, $nome =null, $descricao = null)
        {
            //estou colocando o valor que estiver sendo passado de fora desse contrutor
            $this->codigo = $codigo;
            $this->nome = $nome;
            $this->descricao = $descricao;
        }
}