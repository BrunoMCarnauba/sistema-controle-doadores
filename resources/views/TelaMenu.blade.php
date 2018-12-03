<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Menu - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
	<style type="text/css">
	
	</style>
</head>
<body>
<div class="geral">
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Menu - Administração</h2>
				<a href="{{Route('login')}}" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<!-- Botões -->
	<div style="margin: 0 auto; width: 80%;">
		<a href="{{Route('recepcao')}}"><div class="botaoRecepcao" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href="{{Route('cadastroDoador')}}"><div class="botaoCadastrarDoador" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href="{{Route('cadastroFuncionario')}}"><div class="botaoCadastrarFuncionario" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href=""><div class="botaoBuscarCadastros" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href="{{Route('agendamentoDoacao')}}"><div class="botaoAgendarDoacao" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href="{{Route('registroDoacao')}}"><div class="botaoRegistrarDoacao" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<a href=""><div class="botaoEstatisticas" style="margin-top: 30px; margin-left: 2%;"></div></a>
		<br clear=“both”/>
	</div>

	<!-- Rodapé -->
	<footer>
		<div id="rodape"></div>
	</footer>
</div>

</body>
</html>