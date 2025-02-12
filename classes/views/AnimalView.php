<?php

// require_once '../controller/AnimalController.php';
// require_once 'POO php/';

class AnimalView{

    function ExibirTodosAnimais()
    {
        $animalController = new AnimalController();
        //listando o animal
        $listaTodosAnimais = $animalController->Listar();
        //chava a lista
        for ($i=0; $i < count($listaTodosAnimais) ; $i++) { 
            //fazendo o caminho para achar a imagem
            $caminho_completo = 'images/'.  $listaTodosAnimais[$i]->nome. '.png'  ; 
            // echo $caminho_completo ;

            // nesse caso estou verificando se a imagem salva, se nao ouver ele vai colocar uma padrão, quem esta fazendo isso é o file_exists
            echo '
                <div class="caixaAnimal">
                    <a href="atendimento.php?nome='.$listaTodosAnimais[$i]->nome. '">
                        <img src="'.(file_exists($caminho_completo) ? $caminho_completo : 'images/patas.png') .'"> 
                        
                        <div>
                            <h1>'. $listaTodosAnimais[$i]->nome .'</h1>
                            <p>'. $listaTodosAnimais[$i]->especie->nome .'</p>
                  
                        </div>
                    </a>
                </div>
            ';
        }

    }

    function BuscarPeloNome($nome)
    {
        $animalController = new AnimalController();
        $listaanimal = $animalController->BuscarPeloNome($nome);

        if(count($listaanimal) == 0){
            echo "não tem nada para ser apresentado";
        }

        for ($i=0; $i < count($listaanimal) ; $i++) { 
            //fazendo o caminho para achar a imagem
            $caminho_completo = 'images/'.  $listaanimal[$i]->nome. '.png'  ; 
            // echo $caminho_completo ;
            // nesse caso estou verificando se a imagem salva, se nao ouver ele vai colocar uma padrão, quem esta fazendo isso é o file_exists
            echo '
                <div class="caixaAnimal">
                    <a href="atendimento.php?nome='.$listaanimal[$i]->nome. '">
                        <img src="'.(file_exists($caminho_completo) ? $caminho_completo : 'images/patas.png') .'"> 
                        
                        <div>
                            <h1>'. $listaanimal[$i]->nome .'</h1>
                            <p>'. $listaanimal[$i]->especie->nome .'</p>
                  
                        </div>
                    </a>
                </div>
            ';
        }
    }


}