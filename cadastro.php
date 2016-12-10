<?php 

	//RL = repositorioLinks
	
	//função para fazer a conexão com o banco de dados
	$conectaBDRL = mysql_connect("localhost:8080", "root", "") or print(mysql_error());
	
	if (isset($_POST['enviar'])) {
		
		$nameSite = $_POST['inputName'];
		$urlSite = $_POST['inputUrl'];
		$descricaoSite = $_POST['inputDescricao'];


	}

?>