<?php

	$link = null;
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
		<script src="js/jquery.js"></script>
		

		<script>
		
		function abrirMapa(link){
			$.ajax({
			type: "GET",
			url: "mapa.php",
			data: {link:link},
			success: function(dados){
				$('#caixa_localizacao').html(dados);
		}

		});
		}


		
		</script>
		
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
        <div id="caixa_nossasLojas" class="center">
            <div id="title_lojas">
                Nossas lojas
            </div>
            <div id="lojas">
				<?php
					$sql = "SELECT * FROM tbl_loja WHERE status ='1'";
					$select = mysqli_query($conexao, $sql);
				
					while($dadosloja = mysqli_fetch_array($select)){
						$nome_loja = $dadosloja['nome_loja'];
						$endereco_loja = $dadosloja['endereco_loja'];
						$telefone_loja = $dadosloja['telefone_loja'];
						$cidade_loja = $dadosloja['cidade_loja'];
						$imagem_loja = $dadosloja['imagem_loja'];
						$link = $dadosloja['iframe_loja'];
					
				
				?>
                <div class="caixa_loja" onclick="abrirMapa('<?php echo($link);?>')">
                    <div class="img_loja">
						<img src="../roadRunnerCms/<?php echo($imagem_loja);?>" alt="loja1" title="loja1">
                    </div>
                    <div class="inf_loja">
                        <div class="nome_loja">
                            <?php echo($nome_loja);?>
                        </div>
                        <div class="desc_loja">
                            Endereço: <?php echo($endereco_loja);?><br>
                            Cidade: <?php echo($cidade_loja);?><br>
                            Telefone: <?php echo($telefone_loja);?>
                        </div>
                    </div>
				</div>
				<?php
				
					}
						
				?>
            </div>
            <div id="title_map">
                Localização
            </div>
   
            <div id="caixa_localizacao">
		
				<?php
					if($link == null){		   
					
				?>
				CLIQUE NA LOJA PARA ABRIR O MAPA<br>
				<?php
				}else{
						
					}
				?>
            </div>
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