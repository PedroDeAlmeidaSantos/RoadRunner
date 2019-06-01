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
            <div id="caixa_usuario_nivel">
                <div onclick="linkMenu('cmsCadastrarUsuario.php')" id="caixa_cadastrar_usuario">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/user.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar usuário
                    </div>
                </div>
                <div onclick="linkMenu('cmsCadastrarNivel.php')" id="caixa_cadastrar_nivel">
                    <div class="img_cadastro">
                        <img src="imagens_cadastro/level2.png">
                    </div>
                    <div class="txt_cadastro">
                        Cadastrar nivel
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