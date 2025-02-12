<?php


class AnimalController{

    function Listar()
    {
        //fvariaveis para conecção com banco
        $database = new Database();
        $pdo = $database->connect();
        // arry para armazenar os dados
        $lista = [];

        try{

            //vai fazer o select no banco de dados
                // SELECT animal.cd_animal, animal.nm_animal, especie.cd_especie , especie.nm_especie FROM animal INNER JOIN especie ON animal.cd_especie = especie.cd_especie
            $cSQL = $pdo->prepare('SELECT cd_animal, nm_animal, cd_especie FROM animal');
            $cSQL->execute();

            //esta pegando os dados que veio do select e transformandos eles em array
            while ($dados = $cSQL->fetch(PDO::FETCH_ASSOC))
            {
                // colocando os dados que esta vindo do select em variaveis 
                $codigo = $dados['cd_animal'];
                $nome = $dados['nm_animal'];
                $codigoEspecie = $dados['cd_especie'];

                // estou fazendo outra busca no banco, o : se refere a variavel colocada no sistema
                $cSQL_Especie = $pdo->prepare('SELECT nm_especie FROM especie WHERE cd_especie = :codigo');
                //nesse caso estou passando o valorque é agoramazenado a variavel
                $cSQL_Especie->bindParam('codigo', $codigoEspecie);
                $cSQL_Especie->execute();

                //esta pegando os dados que veio do select e transformandos eles em array
                $dadosEspecies = $cSQL_Especie->fetch(PDO::FETCH_ASSOC);
                $nomeEspecie = $dadosEspecies['nm_especie'];

                // intanciando a especie
                $especie = new Especie($codigoEspecie, $nomeEspecie);

                // gravando o animal dentro da model Animal
                $animal = new Animal($codigo, $nome, $especie);
                // essa função esta armazenado os aimalis dentro de uma lista vazia 
                array_push($lista, $animal);
            }

            //fechando o PDO(banco de dados)
            $pdo = null;


        }catch(PDOException $e){

            echo 'Erro' . $e->getMessage();

        }

        //estou solicitando a lista "no lado de fora"
        return $lista;

    }

    function BuscarPeloNome($nome)
    {

        //fvariaveis para conecção com banco
        $database = new Database();
        $pdo = $database->connect();
         // arry para armazenar os dados
         $lista = [];
 
         try{
             
             //vai fazer o select no banco de dados
                 // SELECT animal.cd_animal, animal.nm_animal, especie.cd_especie , especie.nm_especie FROM animal INNER JOIN especie ON animal.cd_especie = especie.cd_especie
             $cSQL = $pdo->prepare('SELECT cd_animal, nm_animal, cd_especie FROM animal WHERE nm_animal =  :nome');
             $cSQL->bindParam('nome', $nome);
             $cSQL->execute();
 
            //  echo $cSQL;
             //esta pegando os dados que veio do select e transformandos eles em array
             while ($dados = $cSQL->fetch(PDO::FETCH_ASSOC))
             {
                 // colocando os dados que esta vindo do select em variaveis 
                 $codigo = $dados['cd_animal'];
                 $nome = $dados['nm_animal'];
                 $codigoEspecie = $dados['cd_especie'];
 
                 // estou fazendo outra busca no banco, o : se refere a variavel colocada no sistema
                 $cSQL_Especie = $pdo->prepare('SELECT nm_especie FROM especie WHERE cd_especie = :codigo');
                 //nesse caso estou passando o valorque é agoramazenado a variavel
                 $cSQL_Especie->bindParam('codigo', $codigoEspecie);
                 $cSQL_Especie->execute();
 
                 //esta pegando os dados que veio do select e transformandos eles em array
                 $dadosEspecies = $cSQL_Especie->fetch(PDO::FETCH_ASSOC);
                 $nomeEspecie = $dadosEspecies['nm_especie'];
 
                 // intanciando a especie
                 $especie = new Especie($codigoEspecie, $nomeEspecie);
 
                 // gravando o animal dentro da model Animal
                 $animal = new Animal($codigo, $nome, $especie);
                 // essa função esta armazenado os aimalis dentro de uma lista vazia 
                 array_push($lista, $animal);
             }
 
             //fechando o PDO(banco de dados)
             $pdo = null;
 
 
         }catch(PDOException $e){
 
             echo 'Erro' . $e->getMessage();
 
         }
 
         //estou solicitando a lista "no lado de fora"
         return $lista;
 

    }

}