<?php

class TratamentoController{

    function tratamentoIndex()
    {
        //instancianado o banco de dados
        $database = new Database();
        $pdo = $database->connect();

        $lista = [];

        try {
            
            $cSQL = $pdo->prepare('SELECT * FROM tratamento');
            // ezecutando a pesquisa
            $cSQL->execute();
            //transformando os dados em um array
            while($dados = $cSQL->fetch(PDO::FETCH_ASSOC)){
                            //separandos os dados
                $codigo = $dados['cd_tratamento'];
                $tratamento = $dados['nm_tratamento'];
                $descricao = $dados['ds_tratamento'];
                
                $tratamento = new Tratamento($codigo,$tratamento,$descricao);
                array_push($lista, $tratamento);
            };

            $pdo =null;

        } catch (\Throwable $th) {
            
            echo 'Erro' . $th->getMessage();

        }

        return $lista;
    }
}