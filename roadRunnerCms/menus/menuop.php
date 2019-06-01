<nav id="menu">
	<div onclick="linkMenu('cmsConteudo.php')" class="menu">
		<div class="image_menu">
			<img src="imagens_menu/conteudo.png" alt="conteudo" 	title="Conteudo">
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
	<div onclick="linkMenu('cmsUsuario.php')" class="menu">
		<div class="image_menu">
			<img class="image_user" src="imagens_menu/user.png" 	alt="usuario" title="Usuarios">
		</div>
		<div class="text_menu">
			Adm. Usuários
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