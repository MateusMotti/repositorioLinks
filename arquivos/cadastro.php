<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de Links</title>
		<style type="text/css">
			.inputText {
				position: absolute;
				left: 180px;
				width: 300px;
			}

			#enviar {
				position: absolute;
				left: 250px;
			}
		</style>
	</head>
	<body>
		<h2 id="tituloMainPage">Repositório de Links</h2>

		<hr>
			
		<br/>

		<!--Inicio da div para o menu lateral-->
		<div id="menuLateral" style="width: 20%;">
			<nav>
				<label id="home"><a href="index.php">Home</a></label>
				<label> | </label>
				<label id="home"><a href="cadastro.php">Cadastro de Links</a></label>
			</nav>
		</div>
			<!--fim da div para o menu lateral-->

		<br/>

		<form id="cadastroLinks" method="post" action="cadastro.php">

			<h3>Cadastro de Site (Links)</h3>

			<label id="labelName" >Nome do Site (ou Título): </label>
			<input type="text" name="inputName" id="inputName" class="inputText" placeholder="Youtube, Video do Portas dos Fundos, etc..." />

			<br/>
			<br/>

			<label id="labelUrl" >Url (Link): </label>
			<input type="text" name="inputUrl" id="inputUrl" class="inputText" placeholder="http://www.youtube.com.br" />

			<br/>
			<br/>

			<label id="labelDescricao" >Descrição: </label>
			<input type="text" name="inputDescricao" id="inputDescricao" class="inputText" placeholder="Ler as mudanças da att do PHP 7..." />

			<br/>
			<br/>

			<input type="submit" name="enviar" id="enviar" />
		</form>
	</body>	
</html>
<?php 
	
	if (isset($_POST['enviar'])) {
		

		//conexão com o banco de dados
		$host = "localhost";
		$user = "root";
		$pwd  = "";
		$bd   = "repositoriolinks";
		 
		$conexao = mysqli_connect($host, $user, $pwd);
		mysqli_select_db($conexao,$bd);
		//conexão com o banco de dados
		
		//variaveis para pegar os dados do formulário	
		$nameSite = $_POST['inputName'];
		$urlSite = $_POST['inputUrl'];
		$descricaoSite = $_POST['inputDescricao'];
		//variaveis para pegar os dados do formulário

		//inserção dos dados do formulario no banco de dados
		$sql = "INSERT INTO cadastrolinks (nome, url, descricao) VALUES ('".$nameSite."', '".$urlSite."', '".$descricaoSite."')";
		$cadastro = mysqli_query($conexao,$sql) or die(mysql_error());
		//inserção dos dados do formulario no banco de dados

		if ($cadastro) {
			echo "<br/>Link salvo com sucesso!";
		}else {
			echo "<br/>Falha ao tentar salvar o link";
		}


	}	

?>