<?php 

    $nome = null;
    $celular = null;
    $email = null;
    $profissao = null;
    $sugestao = null;
    $telefone = null;
    $homepage = null;
    $facebook = null;
    $informacoes = null;

    require_once('bd/conexao.php');

	require_once('login/login.php');
    $conexao = conexaoMysql();


    if(isset($_POST['btnEnviar'])){
        $nome = $_POST['txtnome'];
        $celular = $_POST['txtcelular'];
        $email = $_POST['txtemail'];
        $profissao = $_POST['txtprofissao'];
        $sugestao = $_POST['txtsugestao'];
        $telefone = $_POST['txttelefone'];
        $homepage = $_POST['txthomepage'];
        $facebook = $_POST['txtfacebook'];
        $informacoes = $_POST['txtinformacoes'];
        $sexo = $_POST['rdosexo'];
        
        
        $sql = "INSERT INTO tbl_faleconosco
                    (nome, celular, email, profissao, sugestao, telefone, homepage, facebook, informacoes, sexo)
                VALUES
                    ('".$nome."', '".$celular."', '".$email."', '".$profissao."', '".$sugestao."', '".$telefone."', '".$homepage."', '".$facebook."', '".$informacoes."', '".$sexo."')";
        
            mysqli_query($conexao, $sql);
        
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
        <script>
         function ValidarNumeros(caracter){
            if(window.event){
                var letra = caracter.charCode;
            }else{
                var letra = caracter.which;
            }

            if(letra < 48 || letra > 57){
                if(letra != 41 && letra != 40 && letra != 45 && letra != 32){
                    return false;
                }

            }

        }
            
        function ValidarLetras(caracter){
           if(window.event){
                var letra = caracter.charCode;
            }else{
                var letra = caracter.which;
            }
            if((letra < 65 || letra > 90) && (letra < 97 || letra > 122)){

                if(letra != 32){
                    return false;
                }
            }
        }
            
        function ValidarEspaco(caracter){
           if(window.event){
                var letra = caracter.charCode;
            }else{
                var letra = caracter.which;
            }
            if(letra == 32){
                 return false;
            }
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
        <section id="formulario" class="center">
            <div id="caixa_formulario">
                <div id="titulo_formulario">
                    Fale Conosco 
                </div>
                <div id="dados_formulario">
                    <form name="frmfaleconosco" method="post" action="faleconosco.php">
                    <table id="table_formulario">
                        <tr>
                            <td>
                               <p>Nome*:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtnome" class="txtForm" placeholder="Nome" value="" pattern="[a-z A-Z]*" onkeypress="return ValidarLetras(event)" required maxlength="80">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                               <p>Celular*:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="tel" name="txtcelular" class="txtForm" placeholder="00 XXXXX-XXXX" value="" pattern="[0-9]{2} [0-9]{5}-[0-9]{4}" onkeypress="return ValidarNumeros(event)" maxlength="13" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p>Email*:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="txtemail" class="txtForm" placeholder="Email" value="" onkeypress="return ValidarEspaco(event)" required maxlength="100">
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td>
                                <p>Profissão*:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <input type="text" name="txtprofissao" class="txtForm" placeholder="Profissão" value="" required maxlength="50">
                            </td>
                        </tr>
                       
                         <tr>
                            <td>
                                <p class="txtSugestao">Sugestão/Crítica:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <textarea class="textarea" name="txtsugestao" maxlength="600"></textarea>
                            </td>
                        </tr>
                       
                    </table>
                    <table id="table_formulario2">
                        <tr>
                            <td>
                               <p>Telefone:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txttelefone" class="txtForm" placeholder="00 XXXX-XXXX" pattern="[0-9]{2} [0-9]{4}-[0-9]{4}" maxlength="12" onkeypress="return ValidarNumeros(event)"  value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p>Home Page:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txthomepage" class="txtForm" placeholder="Home Page" onkeypress="return ValidarEspaco(event)"
                                       value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p>Link Facebook:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtfacebook" class="txtForm" placeholder="Url Facebook" onkeypress="return ValidarEspaco(event)" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <p>Informações sobre o produto:</p> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="txtinformacoes" class="txtForm" placeholder="Informações" maxlength="600" value="">
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <p class="txtSexo">Sexo*:</p>       
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" name="rdosexo" class="rdo" value="M" required> Masculino
                                <input type="radio" name="rdosexo" class="rdo" value="F" required> Feminino
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input type="submit" name="btnEnviar" class="btnEnviar"  value="Enviar">
                            </td>
                        </tr>
                    </table>
                    </form>
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