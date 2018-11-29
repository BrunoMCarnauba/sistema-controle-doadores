<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Agendar doação - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
    <script type="text/javascript" src="{{asset('js/geral.js')}}"></script>

	<style type="text/css">

		#conteudo{
			margin-top: 10px;
			margin-left: 20%;;
		}

		#conteudoEsquerda{
			min-width: 610px;
			height: 360px;
			float: left;
		}

		#conteudoDireita{
			margin-top: 56px;
			width: 590px;
			height: 700px;
			float: left;
		}

	</style>
</head>
<body>
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Agendar doação</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<div class="notificacao"><p>Descrição da notificação</p></div>

	<!-- Conteúdo -->
	<div id="conteudo">
		<!-- Campo CPF + Informações do doador -->
		<div id="conteudoEsquerda">
			<form action="" method="post">
				<label style="font-size: 15pt;">CPF do doador:</label>
				<input type="text" name="cpfDoador" class="camposCadastro">
				<input type="submit" name="buscarDoador" value="Buscar" class="botoesSimplesv2">
			</form>

			<div class="retanguloTitulo" style="margin-top: 15px;">Informações do doador</div>
			<div class="retanguloConteudo" style="margin-bottom: 10px;">
				<p>Nome: Doador da Silva Santos</p>
				<p>Idade: 28 anos</p>
				<p>Doou 0 vez(es)</p>
			</div>
		<!-- Campo registro -->
			<form onchange="TelaMenu.html" method="post">

			</form>

			<div id="agendamento">
				<form action="" method="post">
					<label for="tipoDoacao" class="labelRegistro">Tipo de doação</label>
					<select class="camposCadastro" name="tipoDoacao">
						<option>Selecione</option>
						<option>Doação de sangue</option>
						<option>Doação de medula óssea</option>
					</select>
					<br/>
					<label for="data" class="labelRegistro">Data</label>
					<input type="date" name="data" class="camposCadastro">
					<br/>
					<label for="horario" class="labelRegistro">Horário</label>
					<select name="horario" class="camposCadastro">
						<option>7:30</option>
						<option>9:00</option>
						<option>11:00</option>
						<option>13:00</option>
						<option>15:00</option>
						<option>17:00</option>
						<option>19:00</option>
					</select>

					<div class="erroCadastro" style="max-width: 560px;"> 
						<strong>Erro!</strong> 
						<p>Descrição do erro</p>
					</div>

					<input type="submit" name="agendar" value="Agendar doação" class="botoesSimplesMaior" style="margin-top: 20px; margin-right: 10px;">

				</form>
			</div>
		</div> <!-- Fim conteudoEsquerda -->

		<!-- Conteudo direita -->
		<!-- Filas -->
		<div id="conteudoDireita">
			<div id="filas">
				<div class="retanguloTitulo">Fila de doadores para triagem</div>
					<div class="retanguloConteudo" style="margin-bottom: 10px;">
						<p>1 - Nome do doador</p>
						<p>2 - Nome do doador</p>
						<p>3 - Nome do doador</p>
						<p style="text-align: right; margin-right: 5px;">Total: 3</p>
					</div>

				<div class="retanguloTitulo">Fila de doadores de sangue</div>
					<div class="retanguloConteudo" style="margin-bottom: 10px;">
						<p>1 - Nome do doador</p>
						<p>2 - Nome do doador</p>
						<p>3 - Nome do doador</p>
						<p style="text-align: right; margin-right: 5px;">Total: 3</p>
					</div>
				
				<div class="retanguloTitulo">Fila de doadores de medula óssea</div>
					<div class="retanguloConteudo" style="margin-bottom: 10px;">
						<p><br/></p>
						<p style="text-align: center;">- Fila vazia -</p>
						<p><br/></p>
						<p style="text-align: right; margin-right: 5px;">Total: 0</p>
					</div>
			</div> <!-- Fim filas -->

			<div id="botoes">
				<a href=""><div class="botaoMedioVisualizarAgendamentos" style="float:right;"></div></a>
			</div>
		</div> <!-- Fim conteudoDireita -->

	</div> <!-- Fim conteudo -->
</body>
</html>