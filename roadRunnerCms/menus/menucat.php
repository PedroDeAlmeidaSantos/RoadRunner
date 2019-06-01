<nav id="menu">
	<div onclick="linkMenu('cmsProduto.php')" class="menu">
		<div class="image_menu">
			<img src="imagens_menu/produtos.png" alt="produtos" 	title="Produtos">
		</div>
		<div class="text_menu">
			Adm. Produtos
		</div>
	</div>
</nav>
<div id="logout">
	<div id="bemvindo">
		BEM VINDO,<span><?php echo($_SESSION['nome'])?></span>
	</div>
	<div id="caixa_logout">
		<a href="../roadRunnerCasa/index.php?modo=logout">
			LOGOUT
		</a>
	</div>
</div>