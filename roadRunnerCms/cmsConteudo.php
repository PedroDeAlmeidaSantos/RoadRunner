<?php

	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
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
            <div id="caixa_icones">
                <div id="caixa_centralizar">
                    <div class="icones_conteudo" onclick="linkMenu('admSobrenos.php')">
                        <div class="txt_conteudo">
                            <img  src="imagens_icon/sobrenos.png">
                        </div>
                        
                        <div class="img_conteudo">
                            <span class="icon_conteudo">Sobre nós</span>
                        </div>
                    </div>
                    <div class="icones_conteudo" onclick="linkMenu('admNossaslojas.php')" >
                        <div class="txt_conteudo">
                           <img src="imagens_icon/nossaslojas.png">
                        </div>
                        
                        <div class="img_conteudo">
                            <span class="icon_conteudo">Nossas lojas</span>
                        </div>
                    </div>
                    <div class="icones_conteudo" onclick="linkMenu('admPromocao.php')" >
                        <div class="txt_conteudo">
                          <img class="promo" src="imagens_icon/promocoes.png">
                        </div>
                        
                        <div class="img_conteudo">
                           <span class="icon_conteudo">Promoções</span>
                        </div>
                    </div>
                    <div class="icones_conteudo"  onclick="linkMenu('admNossoseventos.php')" >
                        <div class="txt_conteudo">
                            <img src="imagens_icon/nossoseventos.png">
                        </div>
                        
                        <div class="img_conteudo">
                           <span class="icon_conteudo">Nossos eventos</span>
                        </div>
                    </div>
                    <div class="icones_conteudo" onclick="linkMenu('admNoticias.php')" >
                        <div class="txt_conteudo">
                           <img class="promo" src="imagens_icon/noticias.png">
                        </div>
                        
                        <div class="img_conteudo">
                            <span class="icon_conteudo">Nossas noticias</span>
                        </div>
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