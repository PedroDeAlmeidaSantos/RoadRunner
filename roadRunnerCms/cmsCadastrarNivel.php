<?php 

   session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}



    $nivel = null;
    $botao = 'Registrar';
    $nome_nivel = 'Nivel';
    $placeholder = 'Nivel';
    $btnstatus = 'imagens_crud/on.png';

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();
    


    if(isset($_GET['modo'])){
        
        $modo = $_GET ['modo'];
        $id = $_GET ['id'];
        
        $_SESSION['idregistro'] = $id;
        
        if($modo == 'excluir'){
            $sql = "DELETE FROM tbl_nivel_usuario WHERE id_nivel_usuario=".$id;
            mysqli_query($conexao, $sql);
        }
        else if($modo == 'buscar'){
            $sql = "SELECT nivel_usuario FROM tbl_nivel_usuario WHERE id_nivel_usuario=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosniveis= mysqli_fetch_array($select)){
                $nivel_usuario = $dadosniveis['nivel_usuario'];
                $botao = 'Editar';
                $nome_nivel = 'Editar o nivel : '.$dadosniveis['nivel_usuario'];
                $placeholder = 'Novo nome para o nivel';
            }
            
        }
        
        else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_nivel_usuario WHERE id_nivel_usuario=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosstatus= mysqli_fetch_array($select)){
                $status = $dadosstatus['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_nivel_usuario SET status='0' WHERE id_nivel_usuario=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_nivel_usuario SET status='1' WHERE id_nivel_usuario=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:cmsCadastrarNivel.php');
        }
            
        }
    }

    if(isset($_POST['btnRegistrar'])){
        $nivel = $_POST['txtnivel'];
        
        
        if($_POST['btnRegistrar']=='Registrar'){
            $sql = "INSERT INTO tbl_nivel_usuario (nivel_usuario, status) VALUES('".$nivel."', '1')";
            
        }
        
        else if($_POST['btnRegistrar']=='Editar'){
            $sql = "UPDATE tbl_nivel_usuario SET nivel_usuario='".$nivel."' WHERE id_nivel_usuario=".$_SESSION['idregistro'];
        }
        
        if(mysqli_query($conexao, $sql)){
            header('location:cmsCadastrarNivel.php');
        }else{
            echo("<script>
                    alert('Erro no cadastro');
                </script>");
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
                <div onclick="linkMenu('cmsCadastrarUsuario.php')"  id="caixa_usuario">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/user.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar usuário
                    </div>
                </div>
                <div id="caixa_nivel">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/level2.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar nivel
                    </div>
                </div>
                <div id="dados_nivel">
                    <div class="dados_formulario">
                       <form name="frmcadastrarnivel" method="post" action="cmsCadastrarNivel.php">
                          <div class="campos_cadastro">
                               <span><?php echo($nome_nivel)?></span><br>
                          <input type="text" name="txtnivel" class="txtForm" placeholder="<?php echo($placeholder)?>" value="" required maxlength="80">
                          </div>
                           <input type="submit" name="btnRegistrar" class="btnRegistrar"  value="<?php echo($botao);?>">
                        </form>
                    </div>
                </div>                
            </div>
            <div id="cadastro_niveis">
               <table class="tabela">
                    <tr>
                        <td>ID</td>
                        <td>NÍVEL</td>
                        <td>OPÇÕES</td>
                   </tr>
                   <?php
                    $sql = "SELECT * FROM tbl_nivel_usuario";
                    $select = mysqli_query($conexao, $sql);
                   
                   while($dadosniveis = mysqli_fetch_array($select)){
                   
                       if($dadosniveis['status'] == 0){
                            $btnstatus = 'imagens_crud/off.png';
                       }
                       else if($dadosniveis['status'] == 1){
                           $btnstatus = 'imagens_crud/on.png';
                       }
                       
                   
                   ?>
                   
                   <tr>
                        <td><?php echo($dadosniveis['id_nivel_usuario'])?></td>
                        <td><?php echo($dadosniveis['nivel_usuario'])?></td>
                        <td>
                            <a href="cmsCadastrarNivel.php?modo=status&id=<?php echo($dadosniveis['id_nivel_usuario']);?>">
                                <img src="<?php echo($btnstatus)?>">
                            </a>
                            <a href="cmsCadastrarNivel.php?modo=buscar&id=<?php echo($dadosniveis['id_nivel_usuario']);?>">
                                <img src="imagens_crud/edit.png">
                            </a>
                            <a href="cmsCadastrarNivel.php?modo=excluir&id=<?php echo($dadosniveis['id_nivel_usuario']);?>">
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
        <footer>
            <div id="caixa_footer" class="center">
                <span>
                     Desenvolvido por : Pedro de Almeida Santos
                </span>
            </div>
        </footer>
    </body>
</html>