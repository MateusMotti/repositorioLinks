<?php 

	$servidor = "localhost";
	$baco = "repositorioLinks";
	$usuario = "root";
	$senha = "";

	$conectaBDRL = mysqli_connect($servidor, $usuario, $senha) or print(mysql_error());
	$selectBDRL = mysqli_select_db($conectaBDRL, "repositorioLinks");

	$SQL = 'SELECT * FROM cadastrolinks';
	$RS = mysqli_query($conectaBDRL,$SQL);

	//transforma os dados em array
	$arrayDados = mysqli_fetch_assoc($RS);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="author" content="Mateus Motti">
		<meta charset="utf-8" />
		<title>Repositório de Links</title>
		<style type="text/css">
			#tabelaLinks {
				text-align: left;
			}

			th  {
				padding: 25px;
			}

			p {
				padding: 10px;
				border-bottom: 2px solid; 
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
				<label id="home"><a href="index.html">Home</a></label>
				<br/>
				<label id="home"><a href="cadastro.html">Cadastro de Links</a></label>
			</nav>
		</div>
		<!--fim da div para o menu lateral-->

		<br/>

		<!--Inicio da div para a tabela onde mostrara os links ja salvos-->
		<form id="formTabelaLinks" method="get" action="index.php">
			<div id="tabelaLinks">
				<table>
					<tr>
						<th>Nome do Site</th>
						<th>Url</th>
						<th>Descrição</th>
					</tr>
				</table>	
					<?php 
						// calcula quantos dados retornaram
						$totalDados = mysqli_num_rows($RS);

						if ($totalDados > 0) {
							
							do {
					?>

					<p><?=$arrayDados['nome']?> / <?=$arrayDados['url']?> / <?=$arrayDados['descricao']?></p>

					<?php 
						
							}while ($arrayDados = mysqli_fetch_assoc($RS));

						//fim do if	
						}

					?>
			</div>
		</form>	
		<!--fim da div da tabela dos links salvos-->
	</body>
</html>