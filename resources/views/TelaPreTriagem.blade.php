<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Realizar pré-triagem - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/triagem.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/geral.js')}}"></script> -->
	<!-- <script type="text/javascript" src="{{asset('js/filas.js')}}"></script> -->

    <style type="text/css">
		#conteudo{
			margin-top: 10px;
			margin-left: 23%;
		}

		#conteudoEsquerda{
			min-width: 610px;
			height: 510px;
			float: left;
		}

		#conteudoDireita{
			min-width: 425px;
			height: 510px;
			float:left;
		}

		#informativo{
			margin-top: 15px;
			width: 425px;
			height: 133px;
		}
    </style>

</head>
<body>
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Pré-triagem</h2>
				<a href="{{Route('menu')}}" class="botaoInicio">Início</a>
				<a href="{{Route('login')}}" class="botaoSair">Sair</a>
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
	<div id="conteudo">
		<!-- Conteúdo esquerda - Registro e informações doador-->
		<div id="conteudoEsquerda">
			<!-- Informações sobre o doador -->
			<div class="retanguloTitulo" style="margin-top: 15px;">Informações do doador</div>
			<div class="retanguloConteudo" style="margin-bottom: 10px;">
				@if(session('infosDoador')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'infosDoador' -->
				<p>Nome: {{session('infosDoador')['nome']}}</p>
				<p>Idade: {{session('infosDoador')['idade']}} anos</p>
				<p>Doou {{session('infosDoador')['vezesDoou']}} vez(es)</p>
				@endif
			</div>

			<!-- Registro pré-triagem -->
			<form action="{{Route('registrarPreTriagem')}}" method="post">
				{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
				<label for="pressaoArterial" class="labelRegistro">Pressão arterial (mmHg)</label>
				<input type="text" name="pressaoArterial" class="camposCadastro" size="5" maxlength="7">
				<br/>
				<label for="temperaturaCorporal" class="labelRegistro">Temperatura corporal (Celsius)</label>
				<input type="number" name="temperaturaCorporal" class="camposCadastro" style="width: 50px;" maxlength="2">
				<br/>
				<label for="peso" class="labelRegistro">Peso (Kg)</label>
				<input type="number" name="peso" class="camposCadastro" style="width: 50px;" maxlength="3">
				<br/>
				<label for="altura" class="labelRegistro">Altura (Cm)</label>
				<input type="number" name="altura" class="camposCadastro" style="width: 50px;" maxlength="3">
				<br/>
				<label for="pulso" class="labelRegistro">Pulso (Bpm)</label>
				<input type="number" name="pulso" class="camposCadastro" style="width: 50px;" maxlength="3">
				<br/>

				@if ($errors->any()) <!-- Checa se houve erros -->
				<div class="erroCadastro"> 
					<strong>Erro!</strong> 
					@foreach ($errors->all() as  $error) <!-- Lista todos os erros -->
					<p>{{$error}}</p>
					@endforeach
				</div>
				@endif

				<input type="submit" value="Registrar pré-triagem" class="botoesSimples" style="margin-top: 20px;">
			</form>
		</div> <!-- Fim conteudo esquerda -->

		<!-- Conteudo direita - Fila, outras opções -->
		<div id="conteudoDireita">
			<!-- Informações sobre a fila -->
			<div id="informativo">
				<div class="retanguloTituloMenor">Quantidade de doadores na fila</div>
				<div class="retanguloConteudoMenor" style="margin-bottom: 10px;">
					<label class="retanguloQtdFila">4</label>
					<p class="retanguloNomeFila">Doador(es) de sangue</p>
					<label class="retanguloQtdFila">0</label>
					<p class="retanguloNomeFila">Doador(es) de medula óssea</p>
				</div>
			</div>

			<!-- Infos requisitos para ser aprovado -->
			<div id="informativo">
				<div class="retanguloTituloMenor">Requisitos para aprovação</div>
				<div class="retanguloConteudoMenor">
					<ul style="margin-top: 0px;">
						<li>Pressão sistólica menor ou igual a 180mmHg</li>
						<li>Pressão diastólica entre 60mmHg e 100mmHg</li>
						<li>Temperatura axilar menor ou igual a 37ºc</li>
						<li>Peso maior ou igual a 50kg</li>
						<li>Pulso entre 50bpm e 100bpm</li>
					</ul>
				</div>
			</div>

			<!-- Botões -->
			<div id="botoes">
				<a href=""><div class="botaoMedioHistoricoDoador" style="margin-top: 15px; margin-right: 5px; float:right;"></div></a>
			</div>

		</div> <!-- Fim conteudo direita -->
	</div> <!-- Fim conteudo -->

	<!-- Rodapé -->
	<footer>
		<div id="rodape"></div>
	</footer>

</body>
</html>