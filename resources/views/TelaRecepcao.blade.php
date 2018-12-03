<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Recepção - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/recepcao.js')}}"></script>
	
    <!-- <script type="text/javascript" src="{{asset('js/geral.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{asset('js/filas.js')}}"></script> -->

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
				<a href="{{Route('menu')}}" class="botaoInicio">Início</a>
				<a href="{{url('logout')}}" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<!-- Menu -->
	<nav>
		
	</nav>

	@if(session('notificacao')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'notificacao' -->
	<div class="notificacao"><p>{{session('notificacao')}}</p></div> <!-- Então, mostre a notificacao -->
	@endif

	<!-- Conteudo -->
	<div id="conteudoEsquerda">
		<!-- Filas -->
		<div id="filas">
			<div class="retanguloTitulo">Fila de doadores para triagem</div>
				<div id="filaTriagem" class="retanguloConteudo">
					<!-- Preenchido pelo javaScript filas.js -->
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href="{{Route('chamarDoadorTriagem')}}"><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>

			<div class="retanguloTitulo" style="clear: both;">Fila de doadores de sangue</div>
				<div id="filaDoadorSangue" class="retanguloConteudo">
					<!-- Preenchido pelo javaScript filas.js -->
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href="{{Route('chamarDoadorSangue')}}"><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>

			<div class="retanguloTitulo" style="clear: both;">Fila de doadores de medula óssea</div>
				<div id="filaDoadorMedulaOssea" class="retanguloConteudo">
					<!-- Preenchido pelo javaScript filas.js -->
				</div>
			<div class="retanguloRodape" style="margin-bottom: 25px;">
				<div id="botoesFila">
					<a href="{{Route('chamarDoadorMedulaOssea')}}"><div class="botaoChamarDoadorDaFila" style="float: left;"></div></a>
					<a href=""><div class="botaoTrocarPosicaoDaFila" style="margin-left: 5px; float: left;"></div></a>
					<a href=""><div class="botaoRemoverDaFila" style="margin-left: 5px; float: left;"></div></a>
				</div>
			</div>
		</div>
	</div>
	
	<div id="conteudoDireita">
		<!-- Botões -->
		<div id="botoesRecepcao">
			<a href="{{Route('cadastroDoador')}}"><div class="botaoMedioCadastrarDoador" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href="{{Route('registroDoacao')}}"><div class="botaoMedioRegistrarDoacao" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href=""><div class="botaoMedioBuscarCadastros" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href="{{Route('agendamentoDoacao')}}"><div class="botaoMedioAgendarDoacao" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<a href="{{Route('visualizarAgendamentos')}}"><div class="botaoMedioVisualizarAgendamentos" style="margin-bottom: 25px; margin-left: 10px;"></div></a>
			<br clear=“both”/>
		</div>
	</div>	

	<!-- Rodapé -->
	<footer>
		<div id="rodape">
			<p style="margin-left: 10px;">Usuário: {{session('usuario')}}</p>
		</div>
	</footer>

</body>
</html>