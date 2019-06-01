<?php
	

    $nome_evento = null;
    $data_evento = null;
    $local_evento = null;
    $desc_evento = null;
    $foto_evento = null;
        
	require_once('bd/conexao.php');
	require_once('login/login.php');
	$conexao = conexaoMysql();

	


?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Road Runner Cross Bikes SA
        </title>
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <link rel="stylesheet" type="text/css"  href="css/styleR.css">
        <script src="slider/js/jquery-1.11.3.min.js" ></script>
        <script src="slider/js/jssor.slider-27.5.0.min.js"></script>
        <script src="slider/js/ajuste.js"></script>
    </head>
    <body>
        <header>
            <div id="caixa_header" class="center">
                <div id="caixa_logo">
                    <a href="index.php">
                        <img src="logo/bike.png" alt="logo" title="HOME">
                    </a>
                </div>

                <div id="caixa_assuntos">
                    <nav id="menu_principal">
                        <ul>
                            <li>
                                <a href="nossasNoticias.php">
                                    Notícias em Destaque 
                                </a>
                            </li>

                            <li>
                                <a href="sobreloja.php">
                                    Sobre a Loja
                                </a>
                            </li>

                            <li>
                                <a href="promocao.php">
                                    Promoções
                                </a>
                            </li>

                            <li>
                                <a href="nossaslojas.php">
                                    Nossas Lojas
                                </a>       
                            </li>

                            <li>
                                <a href="nossoseventos.php">
                                    Nossos Eventos
                                </a>
                            </li>
                            
                            <li>
                                <a href="faleconosco.php">
                                    Fale Conosco
                                </a>
                                
                            </li>
                        </ul>
                    </nav>
                </div>
                <div id="caixa_login">
                    <form name="frmlogin" method="post" action="index.php">
                        <div class="caixa_login">
            
                            <input type="text" name="txt_usuario" class="text" value="" placeholder="Usuario">
                        </div>
                        <div class="caixa_login">
                        
                            <input type="password" name="txt_senha" class="text" value="" placeholder="Senha">
                        </div>
                        <div class="btn_login">
                            <input type="submit" value="ENTRAR" class="btn">
                        </div>
                    </form>
                </div>
            </div>
            
        </header>
        <div id="ajuste">
            
        </div>
        
        <div id="caixa_eventos" class="center">
            <div id="title_eventos">
                Nossos eventos
            </div>
			<?php
				
				$sql = "SELECT * FROM tbl_evento WHERE status = '1'";
				$select = mysqli_query($conexao, $sql);
				
				while($dadosevento = mysqli_fetch_array($select)){
					$nome_evento = $dadosevento['nome_evento'];
					$data_evento = $dadosevento['data_evento'];
					$local_evento = $dadosevento['local_evento'];
					$desc_evento = $dadosevento['desc_evento'];
					$foto_evento = $dadosevento['foto_evento'];
				
				
			?>
            <div id="eventos">
                <div class="evento">
                    <div class="img_evento">
                        <img src="../roadRunnerCms/<?php echo($foto_evento);?>" alt="evento1">
                    </div>
                    <div class="inf_evento">
                        <div class="local_evento">
                            <h3>LOCAL:</h3><br>
							<?php echo($local_evento);?>
                        </div>
                        <div class="data_hora_evento">
                            <h3>DATA:</h3><br>
							<?php echo($data_evento);?>
                        </div>

                    </div>
                </div>
                <div class="desc_eventos">
                    <h3><?php echo($nome_evento);?></h3><br>
					<?php echo($desc_evento);?>
                </div>
            </div>
			<?php
                }
			?>
        </div>
        
       <footer>
            <div id="center_footer" class="center">
                <div>
                <ul id="footer_nav">
                    <li> 
                        Home 
                    </li>

                    <li> 
                        Sobre 
                    </li>

                    <li> 
                        Produtos 
                    </li>

                    <li> 
                        Imagens 
                    </li>

                    <li> 
                        Contatos  
                    </li>
                    
                </ul>
            </div>
            
            <div id="footer_logo">
                <a href="index.php">
                    <img src="logo/bike.png" alt="logo" title="logo">
                </a>
                <h1> ROAD RUNNER </h1>
            </div>
            
            <div>
                <ul id="footer_midia">
                    <li> 
                        Facebook 
                    </li>

                    <li> 
                        Instagram 
                    </li>

                    <li> 
                        Whatsapp
                    </li>

                    <li> 
                        Telefone 
                    </li>
                    <li> 
                        Celular
                    </li>
                </ul>
            </div>
            </div>
        </footer>
    </body>
</html>