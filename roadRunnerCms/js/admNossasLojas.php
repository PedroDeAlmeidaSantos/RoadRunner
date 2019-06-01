<?php

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();

    $btnstatus = 'imagens_crud/on.png';
    
    require_once('funcoes/funcao.php');
    

    if(isset($_POST['btnSalvar'])){
        
        $txtrua = $_POST['txtrua'];
        $txtnumero = $_POST['txtnumero'];
        $txtcidade = $_POST['txtcidade'];
        $txttelefone = $_POST['txttelefone'];
        $txtiframe = $_POST['txtiframe'];
        $txtnome = $_POST['txtnome'];
        
        if($_POST['btnSalvar'] == 'Salvar'){
            $arquivo = $_FILES['file_fotos'];
            
            if($arquivo != null){
                $foto = imagem($arquivo);
                if($foto == true){
                    
                    $sql= "INSERT INTO tbl_";
                    
                }
            }
            
            
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
                <nav id="menu">
                    <div onclick="linkMenu('cmsConteudo.php')" class="menu">
                        <div class="image_menu">
                            <img src="imagens_menu/conteudo.png" alt="conteudo" title="Conteudo">
                        </div>
                        <div class="text_menu">
                            Adm. Conteúdo
                        </div>
                    </div>
                    <div onclick="linkMenu('cmsFale.php')" class="menu">
                            <div class="image_menu">
                                <img src="imagens_menu/fale.png" alt="faleconosco" title="Fale Conosco">
                            </div>
                            <div class="text_menu">
                                Adm. Fale Conosco
                            </div>
                    </div>
                    <div onclick="linkMenu("")" class="menu">
                        <div class="image_menu">
                            <img src="imagens_menu/produtos.png" alt="produtos" title="Produtos">
                        </div>
                        <div class="text_menu">
                            Adm. Produtos
                        </div>
                    </div>
                    <div onclick="linkMenu('cmsUsuario.php')" class="menu">
                        <div class="image_menu">
                            <img class="image_user" src="imagens_menu/user.png" alt="usuario" title="Usuarios">
                        </div>
                        <div class="text_menu">
                            Adm. Usuários
                        </div>
                    </div>
                </nav>
                <div id="logout">
                    <div id="bemvindo">
                        BEM VINDO,<span>XXXXX</span>
                    </div>
                    <div id="caixa_logout">
                        LOGOUT
                    </div>
                </div>
            </div>
            <div id="caixa_noticias">
            
              
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