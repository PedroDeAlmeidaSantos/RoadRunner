<?php

	$usuario= null;
	$senha= null;
	$btnlogin= null;
		
	session_start();
	require_once('bd/conexao.php');
	$conexao = conexaoMysql();
	require_once('login/login.php');

	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
		
		if($modo == 'logout'){
			session_destroy();
		}
	}


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
                            <input type="submit" name="btnEntrar" value="ENTRAR" class="btn">
                        </div>
                    </form>
                </div>
            </div>
            
        </header>
        <div id="ajuste">
            
        </div>
        <!-- Slider -->
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="slider/img/spin.svg" alt="carregando"/>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1400px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="slider/img/01.jpg" alt="imagem_slide1" title="imagem_slide1"/>
                <div data-u="thumb">Slide Description 001</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/02.jpg" alt="imagem_slide2" title="imagem_slide2"/>
                <div data-u="thumb">Slide Description 002</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/03.jpg" alt="imagem_slide3" title="imagem_slide3"/>
                <div data-u="thumb">Slide Description 003</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/04.jpg" alt="imagem_slide4" title="imagem_slide4"/>
                <div data-u="thumb">Slide Description 004</div>
            </div><div>
                <img data-u="image" src="slider/img/05.jpg" alt="imagem_slide5" title="imagem_slide5"/>
                <div data-u="thumb">Slide Description 005</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/06.jpg" alt="imagem_slide6" title="imagem_slide6"/>
                <div data-u="thumb">Slide Description 006</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/07.jpg" alt="imagem_slide7" title="imagem_slide7"/>
                <div data-u="thumb">Slide Description 006</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/08.jpg" alt="imagem_slide8" title="imagem_slide8"/>
                <div data-u="thumb">Slide Description 008</div>
            </div>
            <div>
                <img data-u="image" src="slider/img/09.jpg" alt="imagem_slide9" title="imagem_slide9"/>
                <div data-u="thumb">Slide Description 009</div>
            </div>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" style="position:absolute;bottom:0px;left:0px;width:1200px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:#000000;">
            <div data-u="slides">
                <div data-u="prototype" style="position:absolute;top:0;left:0;width:1200px;height:50px;">
                    <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-family:arial,helvetica,verdana;font-weight:normal;line-height:50px;font-size:16px;padding-left:500px;box-sizing:border-box;"></div>
                </div>
            </div>
        </div>
        <!-- Setas de Navegação -->
        <div data-u="arrowleft" class="jssora061" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11949,1919L5964.9,7771.7c-127.9,125.5-127.9,329.1,0,454.9L11949,14079"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora061" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M5869,1919l5984.1,5852.7c127.9,125.5,127.9,329.1,0,454.9L5869,14079"></path>
            </svg>
        </div>
        </div>
        <!-- Fim Slider -->
        
        <!-- CONTEUDO E MENU LATERAL -->
        <section id="menu_conteudo" class="center">
           
				<?php 
				
					$sql = "SELECT tbl_categoria.* FROM tbl_categoria WHERE status <> 0 ORDER BY tbl_categoria.nome_categoria ";
					$select = mysqli_query($conexao, $sql);
					
					
                        
				
				?>
            <div id="caixa_lateral">
                <?php
                
                while($dadoscategoria = mysqli_fetch_array($select)){
						$nome_categoria = $dadoscategoria['nome_categoria'];
						$id_categoria = $dadoscategoria['id_categoria'];
                
                ?>
                
                <a>
                    <div class="menu_lateral">
                        
                        <?php echo($nome_categoria);?>
                       
                        <?php
                        $sqlsub = "SELECT tbl_subcategoria.* FROM tbl_subcategoria  WHERE tbl_subcategoria.id_categoria =".$id_categoria;
						
                        $selectsub = mysqli_query($conexao, $sqlsub);
                        
                        
                        ?>
                        <div class="subitem">
                            <?php echo($nome_categoria);?>
                            
                        </div>
                        
                         <?php
                    while($dadossubcategoria = mysqli_fetch_array($selectsub)){
                        $nome_subcategoria = $dadossubcategoria['subcategoria'];
                    
                        ?>
                        <a>
                            <div class="subitem">
                                <?php echo($nome_subcategoria);?>
                            
                            </div>
                        </a>
                        
                        <?php 
                    
                    }
                    
                    ?>
				  
                    </div>
                </a>
               
                
				<?php
				
                }
				
				?>
            </div>
            <div id="caixa_produtos">
                <form name='frmpesquisa' method="post" action="index.php">
					<input type="text" class="txtForm2" placeholder="Pesquisar" maxlength="25">
                    <input type="submit" class="btnBuscar" value="Buscar">
				</form>
				<?php
				
				$sql= "SELECT * FROM tbl_produto WHERE status <> '0' ORDER BY rand()";
				$select = mysqli_query($conexao, $sql);
				
				while($dadosproduto = mysqli_fetch_array($select)){
					$nome_produto = $dadosproduto['nome_produto'];	
					$descicao_produto = $dadosproduto['descricao'];
					$preco_produto = $dadosproduto['precoantigo_produto'];
					$imagem_produto = $dadosproduto['imagem_produto'];
				
				?>
				<div class='produtos'>	    
					<div class='imagem_produto'>
						<img src='imagens/modelos_bike/speed1.jpg' alt='bikevenda' title='ModeloBike'>
					</div>
             	       
					<div class='sobre_produto'>
						<p>Nome:<?php echo($nome_produto)?></p>
						<p>Descrição:<?php echo($descicao_produto)?></p>
						<p>Preço:<?php echo($preco_produto)?></p>
					</div>
                    
					<div class='detalhe_produto'>
						<p>Detalhes</p>
					</div>
				</div>
				<?php
				
				}
				
				?>
            </div>
        <div id="redes_sociais">
            <div class="redes">
                <img src="imagens/redes_sociais/youtube.png" alt="youtube" title="youtube">
            </div> 
            
            <div class="redes">
                <img src="imagens/redes_sociais/instagram.png" alt="instagram" title="instagram">
            </div> 
            
            <div class="redes">
                <img src="imagens/redes_sociais/facebook.png" alt="facebook" title="facebook">
            </div>        
        </div>
        </section>
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