<?php


class TratamentoView
{

    function informacoes($dados)
    {

        // $atendimentoController = new AtentimentoController();
        // $atendimentoController->processarForMulario($dados);

        echo "bateu";
    }

    function informacaoTratamento($nome)
    {
        $animalController = new AnimalController();
        $listaanimal = $animalController->BuscarPeloNome($nome);

        $tratamentoController = new TratamentoController();
        $listaTratamento = $tratamentoController->tratamentoIndex();

        if(count($listaanimal) == 0){
            echo "não tem nada para ser apresentado";
        }

        for ($i = 0; $i < count($listaanimal); $i++) {
            echo '
            <form method="POST" action="">
                <div class="item-form">
                    <label>Nome do animal:</label>
                    <input type="text" name="nome_animal" disabled value="' . $listaanimal[$i]->nome . '">
                </div>

                <div class="item-form">
                    <label>Data:</label>
                    <input type="date" name="data" value="' . date('Y-m-d') . '">
                </div>

                <div class="item-form">
                    <label>Tratamento:</label>
                    <select>
                        <option selected disabled>Selecione o Tratamento</option>';
                
                
                    // Exibe as opções de tratamento
                    foreach ($listaTratamento as $tratamento) {
                        echo '<option value="' . $tratamento->codigo . ' data-descricao="' . $tratamento->descricao . '">' . $tratamento->nome . '</option>';
                    }

                echo '
                    </select>
                </div>

                
                <div class="item-form-bloco">
                    <label>Descrição do Tratamento:</label>
                    <textarea rows="2" disabled>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere ducimus saepe eum ea id, ex, deleniti non repellendus impedit provident laborum perferendis excepturi voluptate voluptatum magnam dolor rerum, laudantium velit?</textarea>
                </div> 

                <div class="item-form-bloco">
                    <label>Descrição do Atendimento:</label>
                    <textarea name="descricao_atendimento" rows="6"></textarea>
                </div>

                 <button class="botao">Salvar</button>
            </form>
            ';
        }

        
    }
}