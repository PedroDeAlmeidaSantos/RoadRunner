<?php
    
    session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}



    $nome_usuario = null;
    $login_usuario = null;
    $senha_usuario = null;
    $botao = 'Cadastrar';
	$btnstatus = 'imagens_crud/on.png';
	$codnivel = 0;

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){
        
        $modo = $_GET ['modo'];
        $id = $_GET ['id'];
        $_SESSION['idregistro'] = $id;
        
        if($modo == 'excluir'){
            $sql = "DELETE FROM tbl_usuario WHERE id_usuario=".$id;
            mysqli_query($conexao, $sql);
        
        }
        else if($modo == 'buscar'){
            $sql = "SELECT tbl_usuario.*, tbl_nivel_usuario.* FROM tbl_usuario INNER JOIN tbl_nivel_usuario ON tbl_usuario.id_nivel_usuario = tbl_nivel_usuario.id_nivel_usuario WHERE tbl_usuario.id_usuario=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosusuario= mysqli_fetch_array($select)){
                $nome_usuario = $dadosusuario['nome_usuario'];
                $senha_usuario = $dadosusuario['senha_usuario'];
                $login_usuario = $dadosusuario['login_usuario'];
                $codnivel = $dadosusuario['id_nivel_usuario'];
                $botao = 'Editar';
                $nivel = $dadosusuario['nivel_usuario'];
            }
            
        }
		
		else if($modo == 'status'){
            $sql = "SELECT status FROM tbl_usuario WHERE id_usuario=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($dadosstatus= mysqli_fetch_array($select)){
                $status = $dadosstatus['status'];
                $btnstatus = 'imagens_crud/on.png';
                
                if($status == "1"){
                    $sql = "UPDATE tbl_usuario SET status='0' WHERE id_usuario=".$_SESSION['idregistro'];
              
                       
                }else if($status == "0")
                    $sql = "UPDATE tbl_usuario SET status='1' WHERE id_usuario=".$_SESSION['idregistro'];
                   
                 
            }
            
            if(mysqli_query($conexao, $sql)){
            header('location:cmsCadastrarUsuario.php');
        }
            
        }
    }
    

    if(isset($_POST['btnRegistrar'])){
        $nome_usuario = $_POST ['txtnome'];
        $login_usuario = $_POST ['txtlogin'];
        $senha_usuario = $_POST ['txtsenha'];
        $codnivel = $_POST['slnivel'];
		$senha_crip = md5($senha_usuario);
        
        
        if($_POST['btnRegistrar'] == 'Cadastrar'){
            
            
            $sql="INSERT INTO tbl_usuario (id_nivel_usuario, nome_usuario, senha_usuario, login_usuario,  status) VALUES (".$codnivel.",'".$nome_usuario."','".$senha_crip."','".$login_usuario."', '1')";
            
        
        } 
        else if($_POST['btnRegistrar'] == 'Editar'){
            
            
            if($senha_usuario != null){
                 $sql = "UPDATE tbl_usuario SET 
                nome_usuario='".$nome_usuario."', 
                senha_usuario='".$senha_crip."', 
                login_usuario='".$login_usuario."',
                id_nivel_usuario=".$codnivel."
                WHERE id_usuario =".$_SESSION['idregistro'];
            }else{
                $sql = "UPDATE tbl_usuario SET 
                nome_usuario='".$nome_usuario."', 
                login_usuario='".$login_usuario."',
                id_nivel_usuario=".$codnivel."
                WHERE id_usuario =".$_SESSION['idregistro'];
            }
            
                
        }
        
        

        if(mysqli_query($conexao, $sql)){
            header('location:cmsCadastrarUsuario.php');
            
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
                <div id="caixa_usuario">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/user.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar usuário
                    </div>
                </div>
                <div onclick="linkMenu('cmsCadastrarNivel.php')"  id="caixa_nivel">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/level2.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar nivel
                    </div>
                </div>
                <div id="caixa_cadastro_usuario">
                    <div id="dados_usuario">
                            <form name="frmcadastrarusuario" method="post" action="cmsCadastrarUsuario.php">
                                <div class="campos_cadastro">
                                    <span>Nome:</span><br>
                                <input type="text" name="txtnome" class="txtForm" placeholder="Nome" value="<?php echo($nome_usuario); ?>" pattern="[a-z A-Z]*" onkeypress="return ValidarLetras(event)" required maxlength="80">
                                </div>
                                
                                <div class="campos_cadastro">
                                    <span>Login:</span><br>
                                
                                <input type="text" name="txtlogin" class="txtForm" placeholder="Login" value="<?php echo($login_usuario); ?>" required maxlength="80">
                                </div>
                                
                                <div class="campos_cadastro">
                                    <span>Senha:</span><br>
                                <input type="password" name="txtsenha" class="txtForm" placeholder="Senha" value=""  maxlength="80">
                                </div>
                                
                                <div class="campos_cadastro">
                                    <span>Nivel:</span><br>
                                
                                <select name="slnivel" class="txtForm">
                                    
                                    <?php
                                    
                                        if($modo == 'buscar'){
                                            
                                    ?>
                                    
                                    <option value="<?php echo($codnivel); ?>"><?php echo($nivel); ?></option>
                                    <?php
                                            
                                        }else{
                                            
                                    ?>
                                        <option>-- Selecione um nivel --</option>
                                    <?php 
                                            
                                        }
                                    
                                        
                                        $sql= "SELECT * FROM tbl_nivel_usuario WHERE status <> '0'";
                                        $select = mysqli_query($conexao, $sql);
                                    
                                        while($dadosusuario = mysqli_fetch_array($select)){
                                            
                                    ?>
                                    
                                    <option value="<?php echo($dadosusuario['id_nivel_usuario']); ?>">
                                    
                                        <?php 
                                            
                                            echo($dadosusuario['nivel_usuario']);
                                            
                                        ?>
                                        
                                    </option>
                                    <?php
                                    
                                        }
                                            
                                    ?>
                                </select>
                                </div>
                                
                                <input type="submit" name="btnRegistrar" class="btnRegistrar"  value="<?php echo($botao); ?>">
                        </form>
                    </div>
                    <div id="cadastro_usuarios">
                        <table class="tabela">
                            <tr>
                                <td>NOME</td>
                                <td>LOGIN</td>
                                <td>NIVEL</td>
                                <td>OPÇÕES</td>
                            </tr>
                            
                            
                            <?php 
                            
                                $sql = "SELECT tbl_usuario.*, tbl_nivel_usuario.nivel_usuario FROM tbl_usuario INNER JOIN tbl_nivel_usuario ON tbl_nivel_usuario.id_nivel_usuario = tbl_usuario.id_nivel_usuario ORDER BY id_usuario DESC";

                                $select = mysqli_query($conexao, $sql);
                                       
                                while($dadosusuario = mysqli_fetch_array($select)){
									if($dadosusuario['status'] == 0){
										$btnstatus = 'imagens_crud/off.png';
									} 
									else if($dadosusuario['status'] == 1){
										$btnstatus = 'imagens_crud/on.png';
									}
										
                                       
                            ?>    
                            <tr>
                                <td><?php echo($dadosusuario['nome_usuario']); ?></td>
                                <td><?php echo($dadosusuario['login_usuario']); ?></td>
                                <td><?php echo($dadosusuario['nivel_usuario']); ?></td>

                                <td>
                                    <a href="cmsCadastrarUsuario.php?modo=status&id=<?php echo($dadosusuario['id_usuario']);?>">
										<img src="<?php echo($btnstatus)?>">
									</a>
                                    <a href="cmsCadastrarUsuario.php?modo=buscar&id=<?php echo($dadosusuario['id_usuario']) ?>">
                                        <img src="imagens_crud/edit.png">
                                    </a>
                                    <a href="cmsCadastrarUsuario.php?modo=excluir&id=<?php echo($dadosusuario['id_usuario']) ?>">
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