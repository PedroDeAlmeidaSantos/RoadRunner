<?php

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}
	



    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
   //var_dump($conexao);

    $nome = null;
    $celular = null;
    $email = null;
    $profissao = null;
    $sugestao = null;
    $telefone = null;
    $homepage = null;
    $facebook = null;
    $informacoes = null;

    if(isset($_GET['modo'])){
        $modo = $_GET ['modo'];
        $id = $_GET ['id'];
        
        
        if($modo == 'excluir'){
            $sql = "DELETE FROM tbl_faleconosco WHERE id=".$id;
            mysqli_query($conexao, $sql);
            
        } 
        else if($modo == 'consultar'){
            
             $sql = "SELECT * FROM tbl_faleconosco WHERE id=".$id;
             $select = mysqli_query($conexao, $sql); 
            
             if($dadoscliente=mysqli_fetch_array($select)){
                 
                 $nome = $dadoscliente['nome'];
                 $celular = $dadoscliente['celular'];
                 $email = $dadoscliente['email'];
                 $profissao = $dadoscliente['profissao'];   
                 $sugestao = $dadoscliente['sugestao'];
                 $telefone = $dadoscliente['telefone'];
                 $homepage = $dadoscliente['homepage'];
                 $facebook = $dadoscliente['facebook'];
                 $informacoes = $dadoscliente['informacoes'];
                 
                 
             } 
         }  
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>
            CMS - Road Runner
        </title>
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <script src="js/link.js" ></script>
        <script src="js/jquery.js" ></script>
        <script>
            $(document).ready(function(){
                $('.visualizar').click(function(){
                    $('#container').fadeIn(1000);
                });
            });
            
            function visualizarDados (idItem){
                $.ajax({
                    type: "GET",
                    url: "modal.php",
                    data: {id:idItem},
                    success: function(dados){
                       $('#modal').html(dados);
                        
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="container">
            <div id="modal">
            
            </div>         
        </div>
        <header>
            <div id="caixa_header" class="center">
                <div id="title_pag">
                    CMS - Sistema de Gerenciamento do Site
                </div>
                <div id="logo_pag">
                    <img src="imagem_logo/cmsLogo.png" alt="logo" title="logo">
                </div>
            </div>
        </header>
        <div id="conteudo_pag" class="center">
             <div id="caixa_nav">
                <?php
				if($_SESSION['nivel'] == 'Administrador'){
					require_once('menus/menu.php');
				}else if($_SESSION['nivel'] == 'Cataloguista'){
					require_once('menus/menucat.php');
				}else if($_SESSION['nivel'] == 'Operador Basico'){
					require_once('menus/menuop.php');	
				}
				
				?>
            </div>
            <div id="cadastro_fale">
                <div class="consulta">
                    CONSULTA DE CLIENTES
                </div>
                <table class="tabela">
                    <tr>
                        <td>NOME</td>
                        <td>CELULAR</td>
                        <td>EMAIL</td>
                        <td>OPÇÕES</td>
                    </tr>
                    <?php
                    
                    $sql = "select * from tbl_faleconosco order by id desc";
                    /*guarda o retorno do select do banco de dados em um variável local*/
                    $select = mysqli_query($conexao, $sql);
                    /*mysql_fetch_array - transforma uma lista de retorno do banco de dados em uma matriz de dados*/
                    while($dadoscliente = mysqli_fetch_array($select)){
                
                    ?>
                    <tr>
                        <td><span><?php echo($dadoscliente['nome']); ?></span></td>
                        <td><span><?php echo($dadoscliente['celular']); ?></span></td>
                        <td><span><?php echo($dadoscliente['email']); ?></span></td>
                        <td>
                            <a>
                                <img src="icones_fale/search.png" class="visualizar" onclick="visualizarDados(<?php echo($dadoscliente['id']); ?>)">
                            </a>
                            
                            <a href="cmsFale.php?modo=excluir&id=<?php echo($dadoscliente['id']);?>">
                                <img src="icones_fale/delete.png">
                            </a> 
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <footer>
            <div id="caixa_footer" class="center">
                <span>
                     Desenvolvido por : Pedro de Almeida Santos
                </span>
            </div>
        </footer>
    </body>
</html>