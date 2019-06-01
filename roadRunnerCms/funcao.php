<?php

    function imagem($arquivo){

             /* $_FILES : Para recuperar o objeto que foi selecionado utilizamos o $_FILES ao invés de POST */ 
             /* $arquivo = $_FILES['filefotos'] */

            /* Arquivos permitidos no upload de imagem */
            $arquivos_permitidos = array('.jpg', '.jpeg', '.png');

            /* Diretório que será enviado os arquivos */
            $diretorio = 'arquivos/';

            /* Guarda o nome do arquivo a ser upado para o servidor */
            $arquivo = $_FILES['file_fotos']['name'];

            /* Guarda o tamanho do arquivo */
            $tamanho_arquivo = $_FILES['file_fotos']['size'];


            /* A divisão de 1024 converte a unidade de medida de bytes para kbytes */
            /* round : permite fazer apenas a parte inteira do valor */
            $tamanho_arquivo = round($tamanho_arquivo/1024);

            /* Retorna a extensão do arquivo (busca a string de tras para frente) */
            $extensao_arquivo = strrchr($arquivo, '.');


            /* Retorna somente o nome do arquivo */
            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);

            /* Usamos o md5 para criptografar o nome do arquivo, alem de gerar um ID unico que nunca irá se repetir (uniqid e usamos a função time()) */
            $nome_arquivo_cryt = md5(uniqid(time()).$nome_arquivo);

            /* Validação das extensões permitidas */
            if(in_array($extensao_arquivo, $arquivos_permitidos)){

                if($tamanho_arquivo <= 5000){

                    /* local que a imagem foi guardada pelo post do form  */
                    $arquivo_tmp =  $_FILES['file_fotos']['tmp_name'];

                    /* Criamos o novo nome do arquivo com a sua extensão */
                    $foto = $diretorio . $nome_arquivo_cryt . $extensao_arquivo;


                    /* Move para o servidor o arquivo escolhido pelo usuario */
                    if(move_uploaded_file($arquivo_tmp, $foto)){
                        
                        return $foto;

                    }
                    else{
                        echo("Erro ao enviar o arquivo para o servidor");
                    }

                }
                else{
                    echo("Tamanho do arquivo inválido");
                }

            }
            else{
                echo("Extensão inválida!");
            }

        }


   
?>

