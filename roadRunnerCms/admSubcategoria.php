<?php

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}

	require_once('bd/conexao.php');
	$conexao = conexaoMysql();

	$botao = 'Enviar';
	$nome_subcategoria = null;


	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
		$id = $_GET['id'];
		$_SESSION['idregistro'] = $id;
		
		if($modo == 'excluir'){
			
			$sql = "DELETE FROM tbl_subcategoria WHERE id_subcategoria=".$id;
			mysqli_query($conexao, $sql);
			
		}else if($modo == 'buscar'){
			
			$sql = "SELECT tbl_subcategoria.*, tbl_categoria.* FROM tbl_subcategoria INNER JOIN tbl_categoria ON tbl_subcategoria.id_categoria = tbl_categoria.id_categoria WHERE tbl_subcategoria.id_subcategoria=".$id;
			$select = mysqli_query($conexao, $sql);
			
			if($dadossubcategoria = mysqli_fetch_array($select)){
				$nome_subcategoria = $dadossubcategoria['subcategoria'];
				$categoria = $dadossubcategoria['nome_categoria'];
				$id_categoria = $dadossubcategoria['id_categoria'];
				$botao = 'Editar';
				
			}
			
		}else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_subcategoria WHERE id_subcategoria=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadossubcategoria= mysqli_fetch_array($select)){
                $status = $dadossubcategoria['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_subcategoria SET status='0' WHERE id_subcategoria=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_subcategoria SET status='1' WHERE id_subcategoria=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:admSubcategoria.php');
        }
            
        }
		
	}


	if(isset($_POST['btnRegistrar'])){
		$txt_subcategoria = $_POST['txtnome'];
		$cod_categoria = $_POST['slcategoria'];
		
		if($_POST['btnRegistrar'] == 'Enviar'){
			
			$sql = "INSERT INTO tbl_subcategoria (id_categoria, subcategoria, status) VALUES ('".$cod_categoria."','".$txt_subcategoria."', '0')";
			
		}else if($_POST['btnRegistrar'] == 'Editar'){
			
			$sql = "UPDATE tbl_subcategoria SET subcategoria='".$txt_subcategoria."' WHERE id_subcategoria=".$_SESSION['idregistro'];
			
			
		}
		
		 if(mysqli_query($conexao, $sql)){
            header('location:admSubcategoria.php');
            
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
                        <form name="frmsubcategoria" method="post"   action="admSubcategoria.php" enctype="multipart/form-data">
                            <h1>Cadastro de Subcategorias</h1><br>
                            <div class="campos_cadastro">
                                <span>Nome da subcategoria:</span><br>
                                      
                                <input type="text" name="txtnome" class="txtForm" placeholder="Nome da subcategoria" value="<?php echo($nome_subcategoria)?>" required >
                            </div>
                            <div class="campos_cadastro">
                                    <span>Categoria:</span><br>
                                
                                <select name="slcategoria" class="txtForm" required>
									<?php
										
										if($modo == 'buscar'){
											
									
									?>
									
                                    <option value="<?php echo($id_categoria);?>"><?php echo($categoria);?></option> 
									
									<?php
									
										}else{
											
									?>
                                    
                                    <option value="">-- Selecione uma Categoria --</option>
									
									<?php
									
										}
						
										$sql= "SELECT * FROM tbl_categoria WHERE status <> '0'";
										$select = mysqli_query($conexao, $sql);
						
										while($dadoscategoria = mysqli_fetch_array($select)){
											
										
						
									?>
									
									<option value="<?php echo($dadoscategoria['id_categoria'])?>">
									
										<?php
										
											echo($dadoscategoria['nome_categoria']);
										
										?>
									
									</option>
									
									
									<?php
									
										}
											
									?>
                                
                                </select>
                                </div>
                                     
                            <input type="submit" name="btnRegistrar" class="btnRegistrar"  value="<?php echo($botao)?>">
                            
                        </form>
                    </div>
                    <div id="cadastro_usuarios">
                        <table class="tabela">
                            <tr>
                                <td>ID</td>
                                <td>Subcategoria</td>
								<td>Categoria</td>
                                <td>Status</td>
                            </tr>
							
							<?php
							
								$sql = "SELECT tbl_categoria.nome_categoria, tbl_subcategoria.* FROM tbl_categoria INNER JOIN tbl_subcategoria ON tbl_categoria.id_categoria = tbl_subcategoria.id_categoria";							
								 $select = mysqli_query($conexao, $sql);
								   
								   while($dadossubcategoria = mysqli_fetch_array($select)){
										  	
									   if($dadossubcategoria['status'] == 0){
										   $btnstatus = 'imagens_crud/off.png';
									   } 
									   else if($dadossubcategoria['status'] == 1){
										   $btnstatus = 'imagens_crud/on.png';
									   }
									  
									  
								   
								   
	
							?>
                        
                            <tr>
								<td><?php echo($dadossubcategoria['id_subcategoria']);?></td>
                                <td><?php echo($dadossubcategoria['subcategoria']);?></td>
                                <td><?php echo($dadossubcategoria['nome_categoria']);?></td>
                                <td>
                                    <a href="admSubcategoria.php?modo=status&id=<?php echo($dadossubcategoria['id_subcategoria']);?>">
                                        <img src="<?php echo($btnstatus)?>">
								    </a>
                                    <a href="admSubcategoria.php?modo=buscar&id=<?php echo($dadossubcategoria['id_subcategoria']);?>">
                                        <img src="imagens_crud/edit.png">
                                    </a>
                                    <a href="admSubcategoria.php?modo=excluir&id=<?php echo($dadossubcategoria['id_subcategoria']);?>">
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