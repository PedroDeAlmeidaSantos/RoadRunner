<?php

	$txt_quemsomos = null;
	$txt_nossamissao = null;
	$txt_nossavisao = null;
	$txt_nossosvalores = null;

    require_once("bd/conexao.php");
	require_once('login/login.php');
    $conexao = conexaoMysql();
    
    $sql = "SELECT * FROM tbl_texto_sobreloja WHERE status='1'";
    $select = mysqli_query($conexao, $sql);

    
    if($dadostexto = mysqli_fetch_array($select)){
            $txt_quemsomos = $dadostexto['txt_quemsomos'];
            $txt_nossamissao = $dadostexto['txt_nossamissao'];
            $txt_nossavisao = $dadostexto['txt_nossavisao'];
            $txt_nossosvalores = $dadostexto['txt_nossosvalores'];
        
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
                            <input type="submit" value="ENTRAR" class="btn">
                        </div>
                    </form>
                </div>
            </div>
            
        </header>
        <div id="ajuste">
            
        </div>
        
        <section id="navPag" class="center">
                <a href="#quemSomosTitle">
                    <div class="img_nav">
                        <p>Quem Somos</p>
                        <h1>Road Runner</h1>
                    </div>
                </a>
                <a href="#nossaMissaoTitle">
                    <div class="img_nav">
                        <p>Nossa missão</p>
                        <img class="imgSobreLoja" src="imagensSobre/mission.png" alt="missao"   title="missão">
                    </div>
                </a>
                <a href="#nossaVisaoTitle">
                    <div class="img_nav">
                        <p>Nossa visão</p>
                        <img class="imgSobreLoja" src="imagensSobre/vision.png" alt="visao" title="visão">
                    </div>
                </a>
                <a href="#nossosValoresTitle">
                    <div class="img_nav">
                        <p>Nossos valores</p>
                        <img class="imgSobreLoja" src="imagensSobre/balance2.png" alt="valores" title="valores">
                    </div>
                </a>
        </section>
        <section id="sectionSobre" class="center">
            <div id="quemSomosTitle">
                Quem somos
            </div>
            <div id="quemSomosCont">
                <div class="cont">
                    <?php
                        echo($txt_quemsomos);    
                    ?>
                </div>
            </div>
            <div id="nossaMissaoTitle">
                Nossa missão
            </div>
            <div id="nossaMissaoCont">
                <div class="cont">
                    <?php
                        echo($txt_nossamissao);    
                    ?>
                </div>
            </div>
            <div id="nossaVisaoTitle">
                Nossa visão 
            </div>
            <div id="nossaVisaoCont">
                <div class="cont">
                    <?php
                        echo($txt_nossavisao);
                        
                    ?>
                </div>
            </div>
            <div id="nossosValoresTitle">
                Nossos valores 
            </div>
            <div id="nossosValoresCont">
                 <div class="cont">
                    <?php
                        echo($txt_nossosvalores);    
                    ?>
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
