<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Registrar doação - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 

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

		#filas{
			margin-top: 56px;
			width: 610px;
			height: 460px;
			float:left;
		}

	</style>
</head>
<body>
<div class="geral">
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Registro de doação</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>
	<!-- Conteúdo -->
	<div id="conteudo">
		<!-- Campo CPF + Informações do doador -->
		<div id="conteudoEsquerda">
			<form action="{{Route('regDoacaoBuscarDoador')}}" method="post">
				{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
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
			<form action="{{Route('registrarDoacao')}}" method="post">
				{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
				<label>Tipo de doação</label>
				<select class="camposCadastro">
					<option>Selecione</option>
					<option>Doação de sangue</option>
					<option>Doação de medula óssea</option>
				</select>
				<br>
				<input type="submit" name="registrarDoacao" value="Registrar doação" class="botoesSimplesMaior" style="margin-top: 20px; margin-right: 10px;">
			</form>
		</div>

		<!-- Filas -->
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
			</div>
		</div>

	</div>
	<!-- Rodapé -->
	<footer>
		<div id="rodape"></div>
	</footer>
</div>

</body>
</html>