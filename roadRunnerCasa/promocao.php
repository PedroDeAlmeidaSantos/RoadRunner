
<?php
	
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
        
        <!-- Slider -->
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1200px;height:380px;overflow:hidden;visibility:hidden;margin-bottom:50px;margin-top:50px;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="slider/img/spin.svg" alt="carregar"/>
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1400px;height:380px;overflow:hidden;">
            <div>
                <img data-u="image" src="slider/img/04.jpg" alt="promocao1" title="promocao1"/>
                <div data-u="thumb">PATATI  PATATA</div>
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
        <div id="caixa_promocao" class="center">
            <div id="title_promocao">
                PROMOÇÕES !!!
            </div>
             <?php
                $sql = "SELECT tbl_produto.*, tbl_promocao.* FROM tbl_produto INNER JOIN tbl_promocao ON tbl_produto.id_produto = tbl_promocao.id_produto WHERE tbl_produto.status <>0 AND tbl_promocao.status <> 0";
                $select = mysqli_query($conexao, $sql);
                
                while($dadosproduto = mysqli_fetch_array($select)){
                    $porcentagem = $dadosproduto['porcentagem_promocao'];
                    $valor_antigo = $dadosproduto['precoantigo_produto'];
                    $preco_desconto = $valor_antigo*($porcentagem/100);
                
            
            ?>
            <div class="produto_promocao">
                <div class="porc_desconto"> 
                    <?php echo($porcentagem)?>% OFF
                </div>
                <div class='imagem_promocao'>
                   <img src="imagens/modelos_bike/speed1.jpg" alt="produtopromo">
                 </div>
                <div class="valor_desconto">
                    <div class="valores_desconto">
                        de <h2>R$<?php echo($valor_antigo)?></h2> por
                        <h1>R$<?php echo($valor_antigo - $preco_desconto)?></h1>
                    </div>
        
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