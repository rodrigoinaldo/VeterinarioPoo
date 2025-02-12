<!-- nesse arquivo de config, vai fica toda a configuração geral do paciente  -->
<?php

    //vai procurar dentro das cloases o dado passado por ele
    spl_autoload_register(function($nomeClasse){

        $pastaClasses = 'classes/';

        $possiveisCaminhosPasta = [
            $pastaClasses,
            $pastaClasses . 'model/',
            $pastaClasses . 'controller/',
            $pastaClasses . 'views/',
            $pastaClasses . 'config/'
        ];

        // foi feito para trabalhar em coletçãoes sem ordem definida, só vai testar 
        foreach ($possiveisCaminhosPasta as $pastaAtual){
                            //ele vai montar um arquivo da url, ex: classe.Animal.php
            $nomeArquivo = $pastaAtual . $nomeClasse . '.php';

            //adicionando um debug 
                //echo "PROCURANDO EM:" . $nomeArquivo . "<br>";

            //conferindo se esta nesse arquivo
            if (file_exists($nomeArquivo)){
                require_once $nomeArquivo;
                //parar de procurar
                break;
            }
        }


    });

