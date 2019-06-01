<?php

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}

	$produto = 0;
 	$botao = 'Enviar';
	$btnstatus = 'imagens_crud/on.png';
	$promocao = null;
	$modo = null;
	require_once('bd/conexao.php');
    $conexao = conexaoMysql();



	if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        $_SESSION['idregistro'] = $id;
		
		if($modo == 'excluir'){
			$sql = "DELETE FROM tbl_promocao WHERE id_promocao=".$id;
			mysqli_query($conexao, $sql);
		}
		
		else if($modo == 'buscar'){
			$sql = "SELECT tbl_promocao.*, tbl_produto.* FROM tbl_promocao INNER JOIN tbl_produto ON tbl_promocao.id_produto = tbl_produto.id_produto WHERE tbl_promocao.id_promocao=".$id;
			$select = mysqli_query($conexao, $sql);
			if($dadospromocao = mysqli_fetch_array($select)){
				$produto = $dadospromocao['id_produto'];
				$botao = 'Editar';
				$promocao = $dadospromocao['porcentagem_promocao'];
				$nomeproduto = $dadospromocao['nome_produto'];
			}
		}
        
        else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_promocao WHERE id_promocao=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosproduto= mysqli_fetch_array($select)){
                $status = $dadosproduto['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_promocao SET status='0' WHERE id_promocao=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_promocao SET status='1' WHERE id_promocao=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:admPromocao.php');
        }
            
        }
		
	
		
	}


	if(isset($_POST['btnRegistrar'])){
		$promocao = $_POST['txtpromocao'];
		$produto = $_POST['slpromocao'];
		
		if($_POST['btnRegistrar'] == 'Enviar'){
			$sql = "INSERT INTO tbl_promocao (id_produto, porcentagem_promocao, status) VALUES (".$produto.", ".$promocao.", '1')";
			
		}else if($_POST['btnRegistrar'] == 'Editar'){
			$sql = "UPDATE tbl_promocao SET
			id_produto=".$produto.",
			porcentagem_promocao=".$promocao."
			WHERE id_promocao=".$_SESSION['idregistro'];
		}
		
		if(mysqli_query($conexao, $sql)){
            header('location:admPromocao.php');
            
        }else{
            echo("  <script>
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
        <script>
            function validar(caracter){
                if(window.event){
                   var letra = caracter.charCode; 
                }else{
                    var letra = caracter.which;
                }
                
                if(letra < 48 || letra > 57){
                        return false;
               }
            }
        
        </script>
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
            <div id="caixa_nossosEventos">
                <form name="frmPromocao" method="post" action="admPromocao.php" enctype="multipart/form-data" class="center_eventos">
                    <h1>Cadastro de Promoções</h1>
                     <div class="campos_cadastro">
						 
						 <div class="campos_cadastro">
							 <span>Produto da promoção:</span><br>
                             <select name="slpromocao" class="txtForm">
								 <?php
								 
								 	if($modo == 'buscar'){
								 
								 ?>
								 <option value="<?php echo($produto);?>"><?php echo($nomeproduto);?></option>
								 <?php
									}else{
								 ?>
								 <option>-- Selecione um produto --</option>
								 <?php
									}
								 
								 	$sql = "SELECT * FROM tbl_produto WHERE status <>'0'";
								 	$select = mysqli_query($conexao, $sql);
								 
								 	while($dadosproduto = mysqli_fetch_array($select)){
                                       
										
									
								 ?>
								 <option value="<?php echo($dadosproduto['id_produto'])?>">
								<?php
								
									echo($dadosproduto['nome_produto']);	 
									 
								?>
								 </option>
								 <?php
								 
									}
								 
								 ?>
							 </select>
                         </div>
						 
                         <div class="campos_cadastro">
                             <span>Promoção:</span><br>
                             <input type="text" name="txtpromocao" maxlength="2" class="txtForm" placeholder="Desconto" onkeypress="return validar(event)" value="<?php echo($promocao)?>">
                         </div>
                                
						 <input type="submit" name="btnRegistrar" value="<?php echo($botao)?>" class='btnRegistrar'>
						 
						 
                    </div>
                </form> 
                <div id="cadastro_eventos">
                    <table class="table_eventos">
                        <tr>
                            <td>Produto</td>
                            <td>Porcentagem</td>
                            <td>Status</td>
                        </tr>
					
						<?php
							$sql = "SELECT tbl_promocao.*, tbl_produto.nome_produto FROM tbl_promocao INNER JOIN tbl_produto ON tbl_promocao.id_produto = tbl_produto.id_produto";
							$select = mysqli_query($conexao, $sql);
						
							while($dadospromocao = mysqli_fetch_array($select)){
								if($dadospromocao['status'] == 0){
									$btnstatus = 'imagens_crud/off.png';
								}
								else if($dadospromocao['status'] == 1){
									$btnstatus = 'imagens_crud/on.png';
								}
						
						?>
			
                        <tr>
                            <td><?php echo($dadospromocao['nome_produto']); ?></td>
                            <td><?php echo($dadospromocao['porcentagem_promocao']); ?></td>
                            <td>
								<a href="admPromocao.php?modo=status&id=<?php echo($dadospromocao['id_promocao']);?>">
									<img src="<?php echo($btnstatus)?>">
								</a>
								<a href="admPromocao.php?modo=buscar&id=<?php echo($dadospromocao['id_promocao']);?>">
									<img src="imagens_crud/edit.png">
								</a>
								<a href="admPromocao.php?modo=excluir&id=<?php echo($dadospromocao['id_promocao']);?>">
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