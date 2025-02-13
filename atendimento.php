<?php
    require_once 'config.php';

    //verificar se existe o parametro nome na url
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $animalView = new AtendimentoView();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $animalView->informacoes($_POST);
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica Veterinária</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estiloAtendimento.css">
</head>
<body>
    <section id="area-titulo">
        <h1>Atendimento</h1>
        <a href="index.html" class="botao">Voltar</a>
    </section>

    <section id="area-tratamento">
        <h1>Registro de atendimento</h1>
            <?php

            $animalView = new AtendimentoView();
            $animalView->informacaoTratamento($id);

            ?>
       <!-- <form>


             <div class="item-form">
                <label>Nome do animal:</label>
                <input type="text" disabled >
                
            </div>

            <div class="item-form">
                <label>Data:</label>
                <input type="date" value="2024-08-04">
            </div>-->

            
            <!-- <div class="item-form">
                <label>Tratamento:</label>
                <select>
                    <option selected disabled>Selecione o Tratamento</option>
                   
                        </option>
                  
                </select>
            </div>   


            <button class="botao">Salvar</button>
        </form>-->
    </section>

    <section id="area-historico">
        <h1>Histórico</h1>
        <table>
            <thead>
                <th>Data</th>
                <th>Tratamento</th>
                <th>Descrição do Tratamento</th>
            </thead>
            <tbody>
                <tr>
                    <td class="data">30/08/2024 às 11:35</td>
                    <td>Vermifugação</td>
                    <td>Houve reação alérgica e foi adminitrado Apoquel 6g</td>
                </tr>
                <tr>
                    <td class="data">30/08/2024 às 11:30</td>
                    <td>Vacina Antirrábica</td>
                    <td>Renovar em 1 ano</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>