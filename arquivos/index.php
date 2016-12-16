<?php 

	//conexão com o banco de dados
	$host = "localhost";
	$user = "root";
	$pwd  = "";
	$bd   = "repositoriolinks";
		 
	$conexao = mysqli_connect($host, $user, $pwd);
	mysqli_select_db($conexao,$bd);
	//conexão com o banco de dados

	//pega os links ja cadastrados
	$sql = 'SELECT * FROM cadastrolinks';
	$buscando = mysqli_query($conexao,$sql);

	//organizar os links em array
	$arrayDados = mysqli_fetch_assoc($buscando);

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
				text-align: center;
			}

			td {
				border: 1px solid;
				text-align: center;
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

		<!--Inicio da div para a tabela onde mostrara os links ja salvos-->
		<form id="formTabelaLinks" method="get" action="index.php">
			<div id="tabelaLinks">
				<table>
					<tr>
						<th>Nome do Site</th>
						<th>Url</th>
						<th>Descrição</th>
						<th>Deletar</th>
					</tr>
					<?php

						//conta quantos dados tem salvos na tabela
						$numDados = mysqli_num_rows($buscando);

						$totalDados = $numDados;

						if ($totalDados > 0) {

							//organiza e coloca todos os dados cadastrados em uma tabela
							do {

								echo "<tr>";
									echo "<td>".$arrayDados['nome']."</td>";
									echo "<td>";
										echo "<a href=".$arrayDados['url']." target='_blank'>";
											echo $arrayDados['url'];
										echo '</a>';
									echo "</td>";
									echo "<td>".$arrayDados['descricao']."</td>";
									echo "<td>";
					?>				
										<form method="post" action="index.php">
											<!--gambiarra para pegar o ID do link para ser efetuado a exclusão-->
											<?php echo "<input type='hidden' name='inputId' value=".$arrayDados["id"]." />"?>
											<input type="submit" name="deletar" id="deletar" value="x" />
										</form>
					<?php					
									echo "</td>";
								echo "</tr>";

							}while ($arrayDados = mysqli_fetch_assoc($buscando));

						}

					?>
				</table>	
			</div>
		</form>	
		<!--fim da div da tabela dos links salvos-->
	</body>
</html>

<?php
	
	

	if (isset($_POST['deletar'])) {

		$idLink = $_POST['inputId'];

		//função para deletar links ja lidos
		$sqlDelete = "DELETE FROM cadastrolinks WHERE ID =".$idLink;
		$deletando = mysqli_query($conexao,$sqlDelete) or die(mysql_error());

		//verificar se o link foi apagado com sucesso
		if ($deletando) {
			echo "Link removido com sucesso.";
		}else {
			echo "Falha ao tentar apagar o link. ";
		}

	}

?>