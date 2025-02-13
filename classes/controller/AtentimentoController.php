<?php

class AtentimentoController{

    function processarForMulario($dados)
    {
        $database = new Database();
        $pdo = $database->connect();

        $id_animal = intval($dados['id_animal']); // Supondo que a data venha do formulário
        $tratamento = intval($dados['tratamento']); // Supondo que a observação venha do formulário
        $dt_tratamento = $dados['data'];
        $ds_observacao = $dados['descricao_atendimento'];

        try {

            // TODO fazer uma proteção contrar SQL injecton
         
            $prontuario = new Prontuario($id_animal,$tratamento,$dt_tratamento,$ds_observacao);

            $cSQL = $pdo->prepare('INSERT INTO prontuario (cd_animal, cd_tratamento, dt_tratamento, ds_observacao) VALUES (:cd_animal, :cd_tratamento, :dt_tratamento, :ds_observacao);');
            $cSQL->execute([
                ':cd_animal' => $id_animal,
                ':cd_tratamento' => $tratamento,
                ':dt_tratamento' => $dt_tratamento,
                ':ds_observacao' => $ds_observacao
            ]);

            return true;

        } catch (\Throwable $th) {
            echo 'Errp' . $th->getMessage();
            return false;
        }
    }

}