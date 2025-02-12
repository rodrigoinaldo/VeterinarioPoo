<?php

class Especie{

    // definindo o nome do atributo
    public $codigo;
    public $nome;

    // um contrutor pode dar um valor ou nao a uma variavel
    function __construct($codigo = null, $nome =null)
    {
        //estou colocando o valor que estiver sendo passado de fora desse contrutor
        $this->codigo = $codigo;
        $this->nome = $nome;
    }

}