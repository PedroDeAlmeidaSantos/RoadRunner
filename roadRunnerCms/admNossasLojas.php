<?php

	$nome_loja = null;
	$endereco_loja = null;
	$cidade_loja = null;
	$telefone_loja = null;
	$iframe_loja = null;
	require_once('bd/conexao.php');
	require_once('funcoes/funcao.php');
	$conexao = conexaoMysql();

 	$botao = 'Enviar';

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}

	

	if(isset($_GET['modo'])){
	
		$modo = $_GET['modo'];
		$id = $_GET['id'];
		$_SESSION['idregistro'] = $id;
		
		if($modo == 'excluir'){
			
			$sql = "DELETE FROM tbl_loja WHERE id_loja =".$id;
			mysqli_query($conexao, $sql);
			
		}else if($modo == 'buscar'){
			
			$sql = "SELECT * FROM tbl_loja WHERE id_loja=".$id;
			$select = mysqli_query($conexao, $sql);
			
			if($dadosloja = mysqli_fetch_array($select)){
				$nome_loja = $dadosloja['nome_loja'];
				$endereco_loja = $dadosloja['endereco_loja'];
				$cidade_loja = $dadosloja['cidade_loja'];
				$telefone_loja = $dadosloja['telefone_loja'];
				$iframe_loja = $dadosloja['iframe_loja'];
				$imagem_loja = $dadosloja['imagem_loja'];
				
				$botao = 'Editar';
			}
			
		}
		 else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_loja WHERE id_loja=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosloja= mysqli_fetch_array($select)){
                $status = $dadosloja['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_loja SET status='0' WHERE id_loja=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_loja SET status='1' WHERE id_loja=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:admNossasLojas.php');
        }
            
        }
		
	}

	if(isset($_POST['btnRegistrar'])){
		
		$txt_nome = $_POST['txtnome'];
		$txt_endereco = $_POST['txtendereco'];
		$txt_cidade = $_POST['txtcidade'];
		$txt_telefone = $_POST['txttelefone'];
		$txt_iframe = $_POST['txtiframe'];
		$arquivo = $_FILES['file_fotos'];
		
		if($_POST['btnRegistrar'] == 'Enviar'){	
			
			if($arquivo != null){
				$foto = imagem($arquivo);
				
				if($foto == true){
				$sql = "INSERT INTO tbl_loja (nome_loja, endereco_loja, cidade_loja, telefone_loja, iframe_loja, imagem_loja, status) VALUES ('".$txt_nome."','".$txt_endereco."','".$txt_cidade."','".$txt_telefone."','".$txt_iframe."', '".$foto."', '1')";
								  
				mysqli_query($conexao, $sql);
			}
				
				
			}
			
		}else if($_POST['btnRegistrar'] == 'Editar'){
			if($arquivo != null){
				$foto = imagem($arquivo);
				
				if($foto == true){
				$sql = "UPDATE tbl_loja SET nome_loja='".$txt_nome."', endereco_loja='".$txt_endereco."', cidade_loja='".$txt_cidade."', telefone_loja='".$txt_telefone."', iframe_loja='".$txt_iframe."', imagem_loja='".$foto."' WHERE id_loja=".SESSION['idregistro'];
								  
				mysqli_query($conexao, $sql);
			}
				
				
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
                <form name="frmNossasLojas" method="post" action="admNossasLojas.php" enctype="multipart/form-data" class="center_eventos">
                    <h1>Cadastro de Lojas</h1>
                     <div class="campos_cadastro">
                         <div class="campos_cadastro">
                             <span>Nome da Loja:</span><br>
                             <input type="text" name="txtnome" class="txtForm" placeholder="Nome da loja" value="<?php echo($nome_loja);?>" required maxlength="30">
                         </div>
                                
                         <div class="campos_cadastro">
                             <span>Endereço:</span><br>
                             <input type="text" name="txtendereco" class="txtForm" placeholder="Endereço" value="<?php echo($endereco_loja);?>" required maxlength="40">
                         </div>
                                
                         <div class="campos_cadastro">
                             <span>Cidade:</span><br>
                             <input type="text" name="txtcidade" class="txtForm" placeholder="Cidade" value="<?php echo($cidade_loja);?>" required maxlength="40">
                         </div>
                          
                          <div class="campos_cadastro">
                             <span>Telefone:</span><br>
                             <input type="text" name="txttelefone" class="txtForm"  placeholder="Telefone" value="<?php echo($telefone_loja);?>" required maxlength="20">
                         </div>
						 
						 <div class="campos_cadastro">
                             <span>Iframe:</span><br>
                             <input type="text" name="txtiframe" class="txtForm"  placeholder="Iframe" value="<?php echo($iframe_loja);?>" required maxlength="500">
                         </div>
                         
                         <span>Foto:</span>
						 <input type="file" name="file_fotos" class='foto' required><br><br>
						 <input type="submit" name="btnRegistrar" value="<?php echo($botao);?>" class='btnRegistrar'>
                    </div>
                </form> 
                <div id="cadastro_eventos">
                    <table class="table_eventos">
                        <tr>
                            <td>Nome</td>
                            <td>Local</td>
                            <td>Telefone</td>
                            <td>Status</td>
                        </tr>
						
						<?php
						
						$sql = "SELECT * FROM tbl_loja";
						$select = mysqli_query($conexao, $sql);
						
						while($dadosloja = mysqli_fetch_array($select)){
							
						 if($dadosloja['status'] == 0){
                            $btnstatus = 'imagens_crud/off.png';
						   }
						   else if($dadosloja['status'] == 1){
							   $btnstatus = 'imagens_crud/on.png';
						   }
                       
						
						?>
						
                        <tr>
                            <td><textarea readonly><?php echo($dadosloja['nome_loja']);?></textarea></td>
                            <td><textarea readonly><?php echo($dadosloja['endereco_loja']);?></textarea></td>
                            <td><textarea readonly><?php echo($dadosloja['telefone_loja']);?></textarea></td>
							<td>
								<a href="admNossasLojas.php?modo=status&id=<?php echo($dadosloja['id_loja']);?>">
									<img src="<?php echo($btnstatus)?>">
								</a>
								<a href="admNossasLojas.php?modo=buscar&id=<?php echo($dadosloja['id_loja']);?>">
									<img src="imagens_crud/edit.png">
								</a>
								<a href="admNossasLojas.php?modo=excluir&id=<?php echo($dadosloja['id_loja']);?>">
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