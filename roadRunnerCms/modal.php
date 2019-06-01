<?php

    require_once('bd/conexao.php');
	
	session_start();
	if($_SESSION['nome'] == null){
		header('location:../roadRunnerCasa/index.php');
	}

    if(isset($_GET['id'])){
        $conexao = conexaoMysql();
        
        $id = $_GET ['id'];
        $sql = "SELECT * FROM tbl_faleconosco WHERE id=".$id;
        $select = mysqli_query($conexao, $sql);
        
        
        if($dadoscliente = mysqli_fetch_array($select)){
             $nome = $dadoscliente['nome'];
             $celular = $dadoscliente['celular'];
             $email = $dadoscliente['email'];
             $profissao = $dadoscliente['profissao'];
             $sugestao = $dadoscliente['sugestao'];
             $telefone = $dadoscliente['telefone'];
             $homepage = $dadoscliente['homepage'];
             $facebook = $dadoscliente['facebook'];
             $informacoes = $dadoscliente['informacoes'];
        }
    }

?>

    <script>
        /*inicio programacao com jquery*/
        $(document).ready(function(){
           //alert("alo");
            $('#fechar').click(function(){
                $('#container').fadeOut(1000);
            });
        });
    </script>

<div id="caixa_fechar">
    <a href="#" id="fechar">
        <img src="imagens_modal/close.png.png" alt="close" title="fechar">
    </a>
</div>
<br>
<div id="caixa_dados">
    <div class="dados_cliente">
        <span>Nome:</span>
        <?php echo($nome);?>
    </div>
    <div class="dados_cliente">
        <span>Celular:</span>
        <?php echo($celular);?>
    </div>
    <div class="dados_cliente">
        <span>Telefone:</span>
        <?php echo($telefone);?>
    </div>
    <div class="dados_cliente">
        <span>Email:</span>
        <?php echo($email);?>
    </div>
    <div class="dados_cliente">
        <span>Profissão:</span>
        <?php echo($profissao);?>
    </div>
    <div class="dados_cliente">
        <span>Homepage:</span>
        <?php echo($homepage);?>
    </div>
    <div class="dados_cliente">
        <span>Facebook:</span>
        <?php echo($facebook);?>
    </div>
    <div class="dados_cliente">
        <span>Infoemações:</span>
        <?php echo($informacoes);?>
    </div>
    <div class="dados_cliente">
        <span>Sugestão:</span>
        <?php echo($sugestao);?>
    </div>
</div>















