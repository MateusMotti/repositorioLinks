<?php

	//conexão com o banco de dados
	$host = "localhost";
	$user = "root";
	$pwd  = "";
	$bd   = "repositoriolinks";
		 
	$conexao = mysqli_connect($host, $user, $pwd);
	mysqli_select_db($conexao,$bd);
	//conexão com o banco de dados

	// Verifica se foi feita alguma busca
	// Caso contrario, redireciona o visitante pra home
	if (!isset($_GET['search'])) {
		echo "Nenhum dado foi requisitado<br/>";
		echo "<a href='index.php'>Voltar para home</a";
		exit;
	}else if (isset($_GET['search'])) {

		//salva o que foi buscado em uma variavel
		$palavra = mysqli_real_escape_string($conexao,$_GET['palavraChave']);

		//consulta o banco de dados para ver se encontra um link com nome ou titulo com letra ou palavra parecida
		$sqlSearch = "SELECT * FROM cadastrolinks WHERE nome LIKE '%".$palavra."%' ORDER BY nome";
		$searchWord = mysqli_query($conexao,$sqlSearch);


		echo "<ul>";

			while ($resultado = mysqli_fetch_assoc($searchWord)) {
				
				$nome = $resultado['nome'];
				$url = $resultado['url'];
				$descricao = $resultado['descricao'];

				echo "<li>";
					echo "<p>".$nome."</p>";
					echo "<a href='".$url."' target='_blank'>".$url."</a>";
					echo "<p>".$descricao."</p>";
				echo "</li>";	

			}

		echo "</ul>";
		echo "<br/>";
		echo "<a href='index.php'>voltar para home</a>";
	}
?>