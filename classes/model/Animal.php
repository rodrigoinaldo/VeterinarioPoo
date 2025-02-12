<?php

class Animal{

    // definindo as variaveis 
    public $codigo;
    public $nome;
    public $especie;


    // colocando um construtor onde ele pode passar um valor ou nao
    // na especie estou definindo que ele é um lor de outra classe, onde o valor sempre vai vir sendo instanciado
    function __construct($codigo = null, $nome = null, Especie $especie = null)
    {
        //colocando um valor nas variaveis
        $this->codigo = $codigo;
        $this->nome = $nome;
        // cosneferindo se ele nao for vazio, se for ele vai fazer um nova especie
        $this->especie = $especie ?? new Especie();
    }


}