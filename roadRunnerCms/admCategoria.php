<?php

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();

    $botao = 'Enviar';
    $nome_categoria = null;

    session_start();
    if($_SESSION['nome'] == null){
        header('location:../roadRunnerCasa/index.php');
	}


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        $_SESSION['idregistro'] = $id;
        
        if($modo == 'excluir'){
            
            $sql = "DELETE FROM tbl_categoria WHERE id_categoria=".$id;
            mysqli_query($conexao, $sql);
			
            
        }else if($modo == 'buscar'){
            $sql = "SELECT * FROM tbl_categoria WHERE id_categoria=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadoscategoria = mysqli_fetch_array($select)){
                
                $nome_categoria = $dadoscategoria['nome_categoria'];
                $botao = 'Editar';
                
            }
        }
		else if($modo == 'status'){
				
			$sql = "SELECT status FROM tbl_categoria WHERE id_categoria=".$id;
			$select = mysqli_query($conexao, $sql);
            
			if($dadosstatus = mysqli_fetch_array($select)){
				$status = $dadosstatus['status'];
				$btnstatus = 'imagens_crud/off.png';
                
				if($status == "1"){
					$sql = "UPDATE tbl_categoria SET status='0' WHERE 		id_categoria=".$_SESSION['idregistro'];
					mysqli_query($conexao, $sql);
                      
				}else if($status == "0"){
					$sql = "UPDATE tbl_categoria SET status='1' WHERE id_categoria=".$_SESSION['idregistro'];
					mysqli_query($conexao, $sql);
				}
           	      
			}
			
			if(mysqli_query($conexao, $sql)){
				header('location:admCategoria.php');
			}
 			 		          
		}
	}

    if(isset($_POST['btnRegistrar'])){
        
        $nome_categoria = $_POST['txtnome'];
        
        if($_POST['btnRegistrar'] == 'Enviar'){
            
            $sql = "INSERT INTO tbl_categoria (nome_categoria, status) VALUES ('".$nome_categoria."', '0')";
            
            mysqli_query($conexao, $sql);
            
        }else if($_POST['btnRegistrar'] == 'Editar'){
            
            $sql = "UPDATE tbl_categoria SET nome_categoria='".$nome_categoria."' WHERE id_categoria=".$_SESSION['idregistro'];
            
            mysqli_query($conexao, $sql);
            	
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
            <div id="caixa_usuario_nivel">
                <div id="caixa_cadastro_usuario">
                    <div id="dados_categoria">
                        <form name="frmcategoria" method="post"   action="admCategoria.php" enctype="multipart/form-data">
                            <h1>Cadastro de categorias</h1><br>
                            <div class="campos_cadastro">
                                <span>Nome da categoria:</span><br>
                                      
                                <input type="text" name="txtnome" class="txtForm" placeholder="Nome da categoria" value="<?php echo($nome_categoria);?>" required maxlength="30">
                            </div>
                            
                                     
                            <input type="submit" name="btnRegistrar" class="btnRegistrar"  value="<?php echo($botao)?>">
                            
                        </form>
                    </div>
                    <div id="cadastro_usuarios">
                        <table class="tabela">
                            <tr>
                                <td>ID</td>
                                <td>Nome</td>
                                <td>Status</td>
                            </tr>
                            
                            <?php
                                
                                $sql = "SELECT * FROM tbl_categoria";
                                $select = mysqli_query($conexao, $sql);
                                
                                while($dadoscategoria = mysqli_fetch_array($select)){
                                    
                                $id_categoria = $dadoscategoria['id_categoria'];
                                $nome_categoria = $dadoscategoria['nome_categoria'];
                                    
                                    if($dadoscategoria['status'] == 0){
                                        $btnstatus = 'imagens_crud/off.png';
                                    }else if($dadoscategoria['status'] == 1){
                                        $btnstatus = 'imagens_crud/on.png';
                                    }
                        
                            ?>
                            
                            <tr>
                                <td><?php echo($id_categoria);?></td>
                                <td><?php echo($nome_categoria);?></td>
                                <td>
                                    <a href="admCategoria.php?modo=status&id=<?php echo($dadoscategoria['id_categoria']);?>">
                                        <img src="<?php echo($btnstatus)?>">
								    </a>
                                    <a href="admCategoria.php?modo=buscar&id=<?php echo($dadoscategoria['id_categoria']);?>">
                                        <img src="imagens_crud/edit.png">
                                    </a>
                                    <a href="admCategoria.php?modo=excluir&id=<?php echo($dadoscategoria['id_categoria']);?>">
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