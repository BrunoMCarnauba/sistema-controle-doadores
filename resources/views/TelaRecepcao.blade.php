<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Recepção - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 

	<style type="text/css">
		#conteudoEsquerda{
			margin-top: 41px;
			margin-left: 22%;
			width: 610px;
			float:left;
		}

		#filas{
			height: 540px;
		}

		#botoesFila{
			height: 25px;
			width: 484px;
			margin: 0 auto; /* Centralizar na horizonal "top e bottom = 0 e left e right = igual"*/
			padding-top: 3px; /* Pra ficar com um espaçozinho em cima */
		}

		#conteudoDireita{
			margin-top: 41px;
			float:left;
			width: 440px;
		}

		@media (max-width: 1596px){ /*Para quando a largura da tela chegar em 1596px, qnd o conteudoDireita 
			descer (por causa do float), ficar com margin-left pra não ficar colado na esquerda. */
			#conteudoDireita{
				margin-left: 22%;
			}
		}

		#botoesRecepcao{

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
				<h2 style="margin-top: 0px; color: white">Recepção</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<!-- Menu -->
	<nav>
		
	</nav>

	<!-- Conteudo -->
	<div id="conteudoEsquerda">
		<!-- Filas -->
		<div id="filas">
			<div class="retanguloTitulo">Fila de doadores para triagem</div>
				<div class="retanguloConteudo">
					<p>1 - Nome do doador</p>
					<p>2 - Nome do doador</p>
					<p>3 - Nome do doador</p>
					<p style="text-align: right; margin-right: 5px;">Total: 3</p>
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href=""><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>

			<div class="retanguloTitulo" style="clear: both;">Fila de doadores de sangue</div>
				<div class="retanguloConteudo">
					<p>1 - Nome do doador</p>
					<p>2 - Nome do doador</p>
					<p>3 - Nome do doador</p>
					<p style="text-align: right; margin-right: 5px;">Total: 3</p>
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href=""><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>

			<div class="retanguloTitulo" style="clear: both;">Fila de doadores de medula óssea</div>
				<div class="retanguloConteudo">
					<p><br/></p>
					<p style="text-align: center;">- Fila vazia -</p>
					<p><br/></p>
					<p style="text-align: right; margin-right: 5px;">Total: 0</p>
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href=""><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>
		</div>
	</div>
	
	<div id="conteudoDireita">
		<!-- Botões -->
		<div id="botoesRecepcao">
			<a href="TelaCadastroDoador.html"><div class="botaoMedioCadastrarDoador" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href="TelaRegistroDoacao.html"><div class="botaoMedioRegistrarDoacao" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href=""><div class="botaoMedioBuscarCadastros" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href=""><div class="botaoMedioAgendarDoacao" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href=""><div class="botaoMedioVisualizarAgendamentos" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<br clear=“both”/>
		</div>
	</div>	

	<!-- Rodapé -->
	<footer style="clear:both">
		<div id="rodape"></div>
	</footer>
</div>

</body>
</html>