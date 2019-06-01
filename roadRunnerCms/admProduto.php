<?php

    
    $botao = 'Enviar';
    $nome_produto = null;
    $preco_produto = null;
    $descricao_produto = null;

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
    session_start();

    if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}

    if(isset($_GET['modo'])){	
        
		$modo = $_GET['modo'];
		$id = $_GET['id'];
        $_SESSION['idregistro'] = $id;
        
		if($modo == 'excluir'){
			$sql = "DELETE FROM tbl_produto WHERE id_produto=".$id;
			mysqli_query($conexao, $sql);
            
		}else if($modo == 'buscar'){
            
			$sql = "SELECT * FROM tbl_produto WHERE id_produto=".$id;
            $select = mysqli_query($conexao, $sql);
    	        
			if($dadosproduto = mysqli_fetch_array($select)){
                
				$nome_produto = $dadosproduto['nome_produto'];
				$preco_produto = $dadosproduto['precoantigo_produto'];
                $descricao_produto = $dadosproduto['descricao'];
				$botao = 'Editar';
                
			}
		}else if($modo == 'status'){
				
			$sql = "SELECT status FROM tbl_produto WHERE id_produto=".$id;
			$select = mysqli_query($conexao, $sql);
            
			if($dadosstatus= mysqli_fetch_array($select)){
				$status = $dadosstatus['status'];
				$btnstatus = 'imagens_crud/off.png';
                
				if($status == "1"){
					$sql = "UPDATE tbl_produto SET status='0' WHERE 		id_produto=".$_SESSION['idregistro'];
					mysqli_query($conexao, $sql);
                      
				}else if($status == "0"){
					$sql = "UPDATE tbl_produto SET status='1' WHERE id_produto=".$_SESSION['idregistro'];
					mysqli_query($conexao, $sql);
				}
           	      
			}
			
			if(mysqli_query($conexao, $sql)){
				header('location:admProduto.php');
			}
 			 		          
		}
      
	}

    if(isset($_POST['btnRegistrar'])){
        
        $nome_produto = $_POST['txtnome'];
        $preco_produto = $_POST['txtpreco'];
        $descricao_produto = $_POST['txtdescricao'];
        /*$arquivo = $_FILES['file_foto'];*/
        
        if($_POST['btnRegistrar'] == 'Enviar'){
            
            /*if($arquivo != null){
                $foto = imagem($arquivo);
            }*/
            
            $sql = "INSERT INTO tbl_produto (nome_produto, precoantigo_produto, descricao, status) VALUES ('".$nome_produto."', '".$preco_produto."', '".$descricao_produto."', '0')";
            mysqli_query($conexao, $sql);
            
        }else if($_POST['btnRegistrar'] == 'Editar'){
            
            $sql="UPDATE tbl_produto SET nome_produto='".$nome_produto."', precoantigo_produto='".$preco_produto."', descricao='".$descricao_produto."' WHERE id_produto=".$_SESSION['idregistro'];           
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
                    <div id="dados_produto">
                        <form name="frmproduto" method="post"   action="admProduto.php" enctype="multipart/form-data">
                            <h1>Cadastro de produtos</h1><br>
                            <div class="campos_cadastro">
                                <span>Nome do produto:</span><br>
                                      
                                <input type="text" name="txtnome" class="txtForm" placeholder="Nome do Produto" value="<?php echo($nome_produto)?>" required maxlength="40">
                            </div>
                                
                            <div class="campos_cadastro">
                                <span>Preço:</span><br>
                                
                                <input type="text" name="txtpreco" class="txtForm" placeholder="Preço" value="<?php echo($preco_produto)?>" required maxlength="100">
                            </div><br>
                            
                            <div class="campos_cadastro">
                                <span>Descrição</span><br>
                                
                                <textarea class="textarea" name="txtdescricao" maxlength="225"><?php echo($descricao_produto)?></textarea><br><br>
                                
                            </div>
                               
                            <div class="campos_cadastro">
                            <span>Foto:</span>
                            <input type="file" name="file_fotos" class="foto" ><br><br>
                            </div>
                                     
                            <input type="submit" name="btnRegistrar" class="btnRegistrar"  value="<?php echo($botao)?>">
                        </form>
                    </div>
                    <div id="cadastro_usuarios">
                        <table class="tabela">
                            <tr>
                                <td>Nome</td>
                                <td>Preço</td>
                                <td>Desc.</td>
                                <td>Status</td>
                            </tr>
                               
                            <?php
                                
                                $sql = "SELECT * FROM tbl_produto";
                                $select = mysqli_query($conexao, $sql);
                        
                                while($dadosproduto = mysqli_fetch_array($select)){
                                    
                                    if($dadosproduto['status'] == 0){
                                        $btnstatus = 'imagens_crud/off.png';
                                    }else if($dadosproduto['status'] == 1){
                                        $btnstatus = 'imagens_crud/on.png';
                                    }
                            ?>
                            
                            <tr>
                                <td><?php echo($dadosproduto['nome_produto']);?></td>
                                <td><?php echo($dadosproduto['precoantigo_produto']);?></td>
                                <td><textarea style="resize:none;" readonly><?php echo($dadosproduto['descricao']);?></textarea></td>
                                <td>
                                    <a href="admProduto.php?modo=status&id=<?php echo($dadosproduto['id_produto']);?>">
                                        <img src="<?php echo($btnstatus)?>">
								    </a>
                                    <a href="admProduto.php?modo=buscar&id=<?php echo($dadosproduto['id_produto']);?>">
                                        <img src="imagens_crud/edit.png">
                                    </a>
                                    <a href="admProduto.php?modo=excluir&id=<?php echo($dadosproduto['id_produto']);?>">
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