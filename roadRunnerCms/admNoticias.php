<?php
    
	$titulo_noticia = null;
	$texto_noticia = null;
	$modo = null;

    session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}


    $botao = 'Enviar';

    
    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
   

	if(isset($_GET['modo'])){
		
		$modo = $_GET['modo'];
		$id = $_GET['id'];
		$_SESSION['idregistro'] = $id;
		
		if($modo == "excluir"){
			$sql = "DELETE FROM tbl_noticia WHERE id_noticia=".$id;
			mysqli_query($conexao, $sql);
		
		}else if($modo == "buscar"){
			$sql = "SELECT * FROM tbl_noticia WHERE id_noticia=".$id;
			$select = mysqli_query($conexao, $sql);
			
			if($dadosnoticias = mysqli_fetch_array($select)){
				$titulo_noticia = $dadosnoticias['titulo_noticia'];
				$texto_noticia = $dadosnoticias['texto_noticia'];
				$botao = 'Editar';
				
			}
			
		}
		
		else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_noticia WHERE id_noticia=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosstatus= mysqli_fetch_array($select)){
                $status = $dadosstatus['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_noticia SET status='0' WHERE id_noticia=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_noticia SET status='1' WHERE id_noticia=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:admNoticias.php');
        }
            
        }
		
	}




    if(isset($_POST['btnEnviar'])){
        $txt_titulo = $_POST['txt_titulo'];
        $txt_noticia = $_POST['txt_noticia'];
        
        if($_POST['btnEnviar'] == 'Enviar'){
            
            $sql = "INSERT INTO tbl_noticia (titulo_noticia, texto_noticia, status) VALUES ('".$txt_titulo."', '".$txt_noticia."', '1')";
 
        }
        else if($_POST['btnEnviar'] == 'Editar'){
            
            $sql = "UPDATE tbl_noticia SET 
			titulo_noticia='".$txt_titulo."',
			texto_noticia='".$txt_noticia."'
			WHERE id_noticia =".$_SESSION['idregistro'];

            
        }
	
		mysqli_query($conexao, $sql);
        
     
        
        
    

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
            <div id="caixa_noticias">
                <form name="frmadmnoticias" method="post" action="admNoticias.php">
                    <div id="titulo_noticia">
                        Insira o titulo da noticia<br>
                        <input type="text" name="txt_titulo" class="txtForm" placeholder="Titulo" value="<?php echo($titulo_noticia);?>" required maxlength="80">
                    </div>
                    <div id="texto_noticia">
                        Insira o texto da noticia<br>
                        <textarea name="txt_noticia" class="textarea" required><?php echo($texto_noticia);?></textarea>
                    </div>
                    <div id="posicao_noticia">
                        <input type="submit" name="btnEnviar" class="btnRegistrar"  value="<?php echo($botao); ?>"> 
                    </div>
                </form>
                <div id="cadastro_noticias">
                    <table class="table_noticias">
                        <tr>
                            <td>TITULO</td>
                            <td>NOTICIA</td>
                            <td>STATUS</td>
                        </tr>
                        <?php
                        
                        $sql = "SELECT * FROM tbl_noticia";
                        $select = mysqli_query($conexao, $sql);
                        
                        while($dadosnoticias = mysqli_fetch_array($select)){
                            if($dadosnoticias['status'] == 0){
                                $btnstatus = 'imagens_crud/off.png';
                            }
                            else if($dadosnoticias['status'] == 1){
                                $btnstatus = 'imagens_crud/on.png';
                            }
                     
                        
                        
                        ?>
                        <tr>
                            <td><textarea readonly><?php echo($dadosnoticias['titulo_noticia'])?></textarea></td>
                            <td><textarea readonly><?php echo($dadosnoticias['texto_noticia'])?></textarea></td>
                            <td>
                                <a href="admNoticias.php?modo=status&id=<?php echo($dadosnoticias['id_noticia']);?>">
                                    <img src="<?php echo($btnstatus)?>">
                                </a>
                                <a href="admNoticias.php?modo=buscar&id=<?php echo($dadosnoticias['id_noticia']); ?>">
                                    <img src="imagens_crud/edit.png">
                                </a>
                                <a href="admNoticias.php?modo=excluir&id=<?php echo($dadosnoticias['id_noticia']); ?>">
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