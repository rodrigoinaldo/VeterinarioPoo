<?php
    //criando um chamado para o config
    require_once 'config.php';

    // fazendo de teste sem usar a views
    //instanciando o animal
        // $animalController = new AnimalController();
        // //listando o animal
        // $listaTodosAnimais = $animalController->Listar();
        // //chava a lista
        // var_dump( $listaTodosAnimais[0]);

    //parametros de buscar um animal pelo nome
    $buscar = false;
    $valor = "";
    // verificando se tem um valor na url
    if(isset($_GET['valorBusca']))
    {
        $buscar = true;
        if($_GET['valorBusca'] != "")
        {
            $valor = $_GET['valorBusca'];
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinária</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    
    <form id="area-busca" action="index.php" method="get">
        
            <input type="text" name="valorBusca" placeholder="Informe nome do animal">
            <button>Buscar</button>
       
    </form>

    <section id="resultados">

            <?php
            //se buacar for vazio
            if($buscar)
            {   
                // instanciando 
                $animalView = new AnimalView();
                if($valor == "")
                {
                    $animalView->ExibirTodosAnimais();
                }
                else
                {
                    $animalView->BuscarPeloNome($valor);
                }
            }

            ?>

    </section> 
</body>
</html>