<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Visualizar agendamentos - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
    <script type="text/javascript" src="{{asset('js/geral.js')}}"></script>

	<style type="text/css">

		#conteudo{
			margin-top: 10px;
			margin-left: 20%;
		}

		#busca{ /* retanguloBusca + filtros */
			margin-left: 8%;
		}

		#retanguloConteudoFiltros{
			height: 140px;
			width: 300px;
			background-color: #f4dbdb;
		}

		#retanguloConteudoFiltros input{ 
			margin-top: 7px; /*Para ficar com espaçamento entre as opções de filtro*/
			width: 50px;
		}

		#filtro{
			margin-top: 0px;
			height: 165px;
			float: left;
		}

		#conteudoResultado{
			margin-top: -125px;
			margin-left: 6.5%;
			min-width: 620px;
			height: 360px;
			float: left;
		}

		.retanguloNomeResultado{
			min-width: 455px;
			/*Continuação no estilo.css*/
		}

		.retanguloBotoesResultado{
			min-width: 130px;
			/*Continuação no estilo.css*/
		}

		.botoesSimples{
			font-size: 14pt;
			margin-top: 5px;
			margin-left: 17px;
			/*Continuação no estilo.css*/
		}

		#resultado{
			height: 41px;
			max-width: 603px;
			margin-top: 20px;
		}

	</style>
</head>
<body>
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Visualização de agendamentos</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<div class="notificacao"><p>Descrição da notificação</p></div>

	<div id="conteudo">
		<div id="busca" style="margin-left: 6.5%;">
			<form action="" method="post">
				<!-- Campo de busca -->
				<div class="retanguloBusca">
					<label for="tipoBusca" class="labelRegistro">Buscar por</label>
					<select name="tipoBusca" style="height: 25px; margin-left: 5px; margin-right: 5px;">
						<option>CPF</option>
						<option>Nome</option>
					</select>
					<label for="busca" class="labelRegistro">do cadastrado:</label>
					<input type="text" name="busca" style="height: 20px; width: 240px; margin-left: 5px;">
				</div>
					<input type="submit" name="buscar" value="Buscar" class="botaoBuscar" style="float: left; margin-right: 40px;">

				<!-- Filtro de busca -->
				<div id="filtro">
					<div class="retanguloTituloMenor" style="width: 300px;">Filtros</div>
					<div id="retanguloConteudoFiltros">
						<input type="checkbox" name="chkFuncionarios">
						<label for="radFuncionarios" class="labelRegistro">Doação de sangue</label>
						<br/>
						<input type="checkbox" name="chkDoadores">
						<label for="radDoadores" class="labelRegistro">Doação de medula óssea</label>
						<br/>
						<input type="checkbox" name="chkAnoCadastro">
						<label for="radAnoCadastro" class="labelRegistro">Ano de cadastro</label>
						<input type="number" name="anoCadastro" maxlength="4">
						<br/>
						<input type="checkbox" name="chkMesCadastro">
						<label for="radMesCadastro" class="labelRegistro">Mês de cadastro</label>
						<input type="number" name="mesCadastro" maxlength="2">
						<br/>
						<input type="checkbox" name="chkDiaCadastro">
						<label for="radDiaCadastro" class="labelRegistro">Dia de cadastro</label>
						<input type="number" name="diaCadastro" maxlength="2" style="margin-left: 4px;">
					</div>
				</div>
			</form>

		</div> <!-- Fim busca -->
		<!-- Resultado da pesquisa -->
		<div id="conteudoResultado">
			<p style="margin-top: 8px; margin-left: 5px; margin-bottom: 10px; max-width: 600px;">Resultados para: 123.123.123-22</p>
			
			<form action="" method="post" style="margin-top: 25px;">
				<label for="ordenacao" class="labelRegistro">Ordernar por</label>
				<select name="ordenacao" style="height: 25px; margin-left: 5px;">
					<option>Agendamento recente</option>
					<option>Agendamento antigo</option>
				</select>
			</form>

			<div id="resultado">
				<div class="retanguloNomeResultado">05/05/2018 - 15:50 - Henrique Fideles - Sangue</div>
				<div class="retanguloBotoesResultado">
					<button class="botoesSimples" style="font-size: 14pt;">Editar</button>
				</div>
			</div>

			<div id="resultado">
				<div class="retanguloNomeResultado">06/05/2018 - 15:50 - Meirelles Henrique - Medula óssea</div>
				<div class="retanguloBotoesResultado">
					<button class="botoesSimples">Editar</button>
				</div>
			</div>

			<div id="resultado">
				<div class="retanguloNomeResultado"">01/01/2001 - 10:00 - Nome do doador - Tipo doação</div>
				<div class="retanguloBotoesResultado">
					<button class="botoesSimples">Editar</button>
				</div>
			</div>

		</div>

	</div> <!-- Fim conteudo -->

</body>
</html>