<?php

    session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}



    $txt_quemsomos = null;
    $txt_nossamissao = null;
    $txt_nossavisao = null;
    $txt_nossosvalores = null;
    $botao = 'Enviar';
    

    $btnstatus = 'imagens_crud/on.png';

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        $_SESSION['idregistro'] = $id;
        
        if($modo == 'excluir'){
            $sql = "DELETE FROM tbl_texto_sobreloja WHERE id_texto_loja=".$id;
            mysqli_query($conexao, $sql);
        }
        else if($modo == 'buscar'){
            $sql = "SELECT * FROM tbl_texto_sobreloja WHERE id_texto_loja=".$id;
            $select=mysqli_query($conexao, $sql);
            
            if($dadossobre = mysqli_fetch_array($select)){
                $txt_quemsomos = $dadossobre['txt_quemsomos'];
                $txt_nossamissao = $dadossobre['txt_nossamissao'];
                $txt_nossavisao = $dadossobre['txt_nossavisao'];
                $txt_nossosvalores = $dadossobre['txt_nossosvalores'];
                $botao = 'Editar';
            }
            
        }else if($modo == 'status'){
                
                $id = $_GET['id'];
                $status = $_GET['status'];
                $btnstatus = 'imagens_crud/off.png';
                
                if($status == '1'){
                    
                    $sql= "UPDATE tbl_texto_sobreloja SET status='0' WHERE id_texto_loja=".$id;
                    
                }else if($status == '0'){
                    
                    $sql= "UPDATE tbl_texto_sobreloja SET status='0'";
                    
                    if(mysqli_query($conexao, $sql)){
                    
                        $sql= "UPDATE tbl_texto_sobreloja SET status='1' WHERE id_texto_loja=".$id;
                        
                    }
                   
                    
                }
                
                if(mysqli_query($conexao, $sql)){
                    header('location:admSobrenos.php');
                }
            }
        }

    if(isset($_POST['btnEnviar'])){
        
        $txt_quemsomos = $_POST['txt_quemsomos'];
        $txt_nossamissao = $_POST['txt_nossamissao'];
        $txt_nossavisao = $_POST['txt_nossavisao'];
        $txt_nossosvalores = $_POST['txt_nossosvalores'];
        
        if($_POST['btnEnviar'] == 'Enviar'){
            $sql="INSERT INTO tbl_texto_sobreloja (txt_quemsomos, txt_nossamissao, txt_nossavisao, txt_nossosvalores, status) VALUES ('".$txt_quemsomos."', '".$txt_nossamissao."', '".$txt_nossavisao."', '".$txt_nossosvalores."', '0')";
            
            
        }
        else if($_POST['btnEnviar'] == 'Editar'){
            
            $sql= "UPDATE tbl_texto_sobreloja SET
            txt_quemsomos='".$txt_quemsomos."', txt_nossamissao='".$txt_nossamissao."', txt_nossavisao='".$txt_nossavisao."', txt_nossosvalores='".$txt_nossosvalores."'
            WHERE id_texto_loja =".$_SESSION['idregistro'];
        }
        
        if(mysqli_query($conexao, $sql)){
            header('location:admSobrenos.php');
            
        }else{
            echo("<script>
                    alert('Erro no Cadastro');
                 </script>
                ");
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
    </head>
    <body>
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
            <div id="caixa_sobrenos">
                <form name="frmSobrenos" method="post" action="admSobrenos.php">
                    <div class="text_sobrenos">
                        <div class="titulo_campo">
                            Insira o texto:<br>
                            Quem somos
                        </div>
                        <div class="caixa_campo">
                            <textarea name="txt_quemsomos" class="textarea" required><?php echo($txt_quemsomos)?></textarea>
                        </div>
                    </div>
                    <div class="text_sobrenos">
                        <div class="titulo_campo">
                            Insira o texto:<br>
                            Nossa missão
                        </div>
                        <div class="caixa_campo">
                            <textarea name="txt_nossamissao" class="textarea" required><?php echo($txt_nossamissao)?></textarea>
                        </div>
                    </div>
                    <div class="text_sobrenos">
                        <div class="titulo_campo">
                            Insira o texto:<br>
                            Nossa visão
                        </div>
                        <div class="caixa_campo">
                            <textarea name="txt_nossavisao" class="textarea" required><?php echo($txt_nossavisao)?></textarea>
                        </div>
                    </div>
                    <div class="text_sobrenos">
                        <div class="titulo_campo">
                            Insira o texto:<br>
                            Nossos valores
                        </div>
                        <div class="caixa_campo">
                            <textarea name="txt_nossosvalores" class="textarea" required><?php echo($txt_nossosvalores)?></textarea>
                        </div>
                    </div>
                        <input type="submit" name="btnEnviar" class="btn" value="<?php echo($botao);?>">
                </form>
                
                <div id="cadastro_sobreloja">
                    <table class="table_sobrenos">
                        <tr>
                            <td>Quem Somos</td>
                            <td>Nossa missão</td>
                            <td>Nossa visão</td>
                            <td>Nossos valores</td>
                            <td>Status</td>
                        </tr>
                        
                        <?php
                        
                            $sql="SELECT * FROM tbl_texto_sobreloja";
                            $select = mysqli_query($conexao, $sql);
                        
                            while($dadossobre = mysqli_fetch_array($select)){
                                if($dadossobre['status'] == 0){
                                    $btnstatus = 'imagens_crud/off.png';
                                }
                                else if($dadossobre['status'] == 1){
                                    $btnstatus = 'imagens_crud/on.png';
                                }
                                
                        ?>
                        <tr>
                            <td><textarea readonly><?php echo($dadossobre['txt_quemsomos'])?></textarea></td>
                            <td><textarea readonly><?php echo($dadossobre['txt_nossamissao'])?></textarea></td>
                            <td><textarea readonly><?php echo($dadossobre['txt_nossavisao'])?></textarea></td>
                            <td><textarea readonly><?php echo($dadossobre['txt_nossosvalores'])?></textarea></td>
                            <td>
                                <a href="admSobrenos.php?modo=status&id=<?php echo($dadossobre['id_texto_loja']);?>&status=<?php echo($dadossobre['status']);?>">
                                    <img src="<?php echo($btnstatus)?>">
                                </a>
                                <a href="admSobrenos.php?modo=buscar&id=<?php echo($dadossobre['id_texto_loja']);?>">
                                    <img src="imagens_crud/edit.png">
                                </a>
                                <a href="admSobrenos.php?modo=excluir&id=<?php echo($dadossobre['id_texto_loja']);?>">
                                    <img src="imagens_crud/delete.png">
                                </a>
                            </td>
                        </tr>
                        
                        <?php
                            }
                        ?>
                    </table>

                </div>
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