<?php
	
	$txt_nome = null;
	$txt_local = null;
	$txt_data = null;
	$txt_desc = null;
	$nome_evento = null;
	$desc_evento = null;	
	$data_evento = null;
	$local_evento = null;

		

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}
	$botao = 'Enviar';
	
	require_once('bd/conexao.php');
	$conexao = conexaoMysql();
	require_once('funcoes/funcao.php');
	

	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
		$id = $_GET['id'];
		$_SESSION['idregistro'] = $id;
		
		
		if($modo == 'excluir'){	
			
			$sql = "DELETE FROM tbl_evento WHERE id_eventos=".$id;
			mysqli_query($conexao, $sql);
			
		}else if($modo == 'buscar'){
		
			$sql = "SELECT * FROM tbl_evento WHERE id_eventos=".$id;
			$select = mysqli_query($conexao, $sql);
			
			if($dadosevento = mysqli_fetch_array($select)){
				$nome_evento = $dadosevento['nome_evento'];
				$desc_evento = $dadosevento['desc_evento'];
				$data_evento = $dadosevento['data_evento'];
				$local_evento = $dadosevento['local_evento'];
				
				$botao = 'Editar';
			}
			
		} else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_evento WHERE id_eventos=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosevento = mysqli_fetch_array($select)){
                $status = $dadosevento['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_evento SET status='0' WHERE id_eventos=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_evento SET status='1' WHERE id_eventos=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:admNossosEventos.php');
        }
            
        }
		
	}


	if(isset($_POST['btnRegistrar'])){
		
		$txt_nome = $_POST['txtnome'];
		$txt_local = $_POST['txtlocal'];
		$txt_data = $_POST['txtdata'];
		$txt_desc = $_POST['txtdesc'];
		$arquivo = $_FILES['file_fotos'];
		
		if($_POST['btnRegistrar'] == 'Enviar'){
			
			if($arquivo != null){
				$foto = imagem($arquivo);
				
				if($foto == true){
					$sql = "INSERT INTO tbl_evento (nome_evento, local_evento, data_evento, desc_evento, foto_evento, status) VALUES ('".$txt_nome."', '".$txt_local."', '".$txt_data."', '".$txt_desc."', '".$foto."', '1')";
					
					mysqli_query($conexao, $sql);
				}
			}
			
		}else if($_POST['btnRegistrar'] == 'Editar'){
			
			if($arquivo != null){
				$foto = imagem($arquivo);
				
				if($foto == true){
					$sql = "UPDATE tbl_evento SET nome_evento='".$txt_nome."',  local_evento='".$txt_local."', data_evento='".$txt_data."', desc_evento='".$txt_desc."', foto_evento='".$foto."' WHERE id_eventos=".$_SESSION['idregistro'];
					
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
                <form name="frmNossosEventos" method="post" action="admNossosEventos.php" enctype="multipart/form-data" class="center_eventos">
                    <h1>Cadastro de Eventos</h1>
                     <div class="campos_cadastro">
                         <div class="campos_cadastro">
                             <span>Nome do Evento:</span><br>
                             <input type="text" name="txtnome" class="txtForm" placeholder="Nome do evento" value="<?php echo($nome_evento);?>" required maxlength="100">
                         </div>
                                
                         <div class="campos_cadastro">
                             <span>Local:</span><br>
                             <input type="text" name="txtlocal" class="txtForm" placeholder="Local" value="<?php echo($local_evento);?>" required maxlength="100">
                         </div>
                                
                         <div class="campos_cadastro">
                             <span>Data:</span><br>
                             <input type="text" name="txtdata" class="txtForm" placeholder="Data" value="<?php echo($data_evento);?>" required maxlength="50">
                         </div>
						 <div class="campos_cadastro">
						 	<span>Descrição Evento:</span><br>
							 <textarea class="textarea" name="txtdesc" maxlength="500"><?php echo($desc_evento);?></textarea>
						 </div>
                         
                         <span>Foto:</span>
                        <input type="file" name="file_fotos" class='foto'><br><br>
						 <input type="submit"  name="btnRegistrar" value="<?php echo($botao);?>" class='btnRegistrar'>
						 
						 
                    </div>
                </form> 
                <div id="cadastro_eventos">
                    <table class="table_eventos">
                        <tr>
                            <td>Nome</td>
                            <td>Local</td>
                            <td>Data</td>
                            <td>Status</td>
                        </tr>
						<?php
						
							$sql = "SELECT * FROM tbl_evento";
							$select = mysqli_query($conexao, $sql);
						
							while($dadoseventos = mysqli_fetch_array($select)){
								
							if($dadoseventos['status'] == 0){
                            	$btnstatus = 'imagens_crud/off.png';
							}
							else if($dadoseventos['status'] == 1){
									$btnstatus = 'imagens_crud/on.png';
							}
						
						?>
                        <tr>
                            <td><textarea readonly><?php echo($dadoseventos['nome_evento']);?></textarea></td>
                            <td><textarea readonly><?php echo($dadoseventos['local_evento']);?></textarea></td>
                            <td><textarea readonly><?php echo($dadoseventos['data_evento']);?></textarea></td>
                            <td>
								<a href="admNossosEventos.php?modo=status&id=<?php echo($dadoseventos['id_eventos']);?>">
									<img src="<?php echo($btnstatus)?>">
								</a>
								<a href="admNossosEventos.php?modo=buscar&id=<?php echo($dadoseventos['id_eventos']);?>">
									<img src="imagens_crud/edit.png">
								</a>
								<a href="admNossosEventos.php?modo=excluir&id=<?php echo($dadoseventos['id_eventos']);?>">
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