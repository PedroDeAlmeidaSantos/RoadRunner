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

