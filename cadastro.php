<?php 

	//RL = repositorioLinks
	
	//função para fazer a conexão com o banco de dados
	$conectaBDRL = mysqli_connect("localhost", "root", "") or print (mysql_error()); 
	mysqli_select_db($conectaBDRL, "repositorioLinks") or print(mysql_error()); 
	 
	
	if (isset($_POST['enviar'])) {
		
		$nameSite = $_POST['inputName'];
		$urlSite = $_POST['inputUrl'];
		$descricaoSite = $_POST['inputDescricao'];

		$sql = 'INSERT INTO cadastrolinks VALUES ("nome", "url", "descricao")';
		$sql .= "('$nameSite', '$urlSite', '$descricaoSite')";
		$resultado = mysqli_query($conectaBDRL,$sql);

		echo "Link salvo com sucesso!";

	}

?>