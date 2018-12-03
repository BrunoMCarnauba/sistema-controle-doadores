<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Agendar doação - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/registroDoacao.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/geral.js')}}"></script> -->


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
				<a href="{{Route('menu')}}" class="botaoInicio">Início</a>
				<a href="{{Route('login')}}" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	@if(session('notificacao')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'notificacao' -->
	<div class="notificacao"><p>{{session('notificacao')}}</p></div> <!-- Então, mostre a notificacao -->
	@endif

	<!-- Conteúdo -->
	<div id="conteudo">
		<!-- Campo CPF + Informações do doador -->
		<div id="conteudoEsquerda">
			<form action="{{Route('agendarDoacao')}}" method="post">
				{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
				<label style="font-size: 15pt;">CPF do doador:</label>
				<input id="input_cpf" type="text" name="cpfDoador" class="camposCadastro" size="15" maxlength="14">
				<input type="submit" name="buscarDoador" value="Buscar" class="botoesSimplesv2">

			<div class="retanguloTitulo" style="margin-top: 15px;">Informações do doador</div>
			<div id="informacoesDoador" class="retanguloConteudo" style="margin-bottom: 10px;">
				<!-- O contéudo dessa div (Os parágrafos) são controlados pelo javaScript RegistroDoacao.js -->
				<p>Nome: </p>
				<p>Idade:</p>
				<p>Doou 0 vez(es)</p>
			</div>

		<!-- Campo registro -->
			<div id="agendamento">
				<form action="" method="post">
					<label for="tipoDoacao" class="labelRegistro">Tipo de doação</label>
					<select class="camposCadastro" name="tipoDoacao">
						<option value="Selecione">Selecione</option>
						<option value="Doação de sangue">Doação de sangue</option>
						<option value="Doação de medula óssea">Doação de medula óssea</option>
					</select>
					<br/>
					<label for="data" class="labelRegistro">Data</label>
					<input type="date" name="data" class="camposCadastro">
					<br/>
					<label for="horario" class="labelRegistro">Horário</label>
					<select name="horario" class="camposCadastro">
						<option value="7:30">7:30</option>
						<option value="9:00">9:00</option>
						<option value="11:00">11:00</option>
						<option value="13:00">13:00</option>
						<option value="15:00">15:00</option>
						<option value="17:00">17:00</option>
						<option value="19:00">19:00</option>
					</select>

					@if ($errors->any()) <!-- Checa se houve erros -->
					<div class="erroCadastro" style="max-widht: 560px;"> 
						<strong>Erro!</strong> 
						@foreach ($errors->all() as  $error) <!-- Lista todos os erros -->
						<p>{{$error}}</p>
						@endforeach
					</div>
					@endif

					<!-- O display da div erroBusca (que permite deixá-la invisível) é controlado pelo javaScript registroDoacao.js -->
					<div id="erroBusca" class="erroCadastro" style="display: none; max-widht: 560px;"> 
						<strong>Erro!</strong> 
						<p>Não existe doador cadastrado com o cpf digitado</p>
					</div>
		
					<!-- OBSERVAÇÃO: Reduzir essas divs de erro de doador não cadastrado em uma só Div -->
					@if(session('erroBusca')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'notificacao' -->
					<div class="erroCadastro" style="max-widht: 560px;"> 
							<strong>Erro!</strong> 
							<p>Não existe doador cadastrado com o cpf digitado</p>
					</div>
					@endif

					<br/>
					<input type="submit" name="agendar" value="Agendar doação" class="botoesSimplesMaior" style="margin-top: 20px; margin-right: 10px;">

				</form>
			</div>
		</div> <!-- Fim conteudoEsquerda -->

		<!-- Conteudo direita -->
		<!-- Filas -->
		<div id="conteudoDireita">
			<div id="filas">
				<div class="retanguloTitulo">Fila de doadores para triagem</div>
					<div id="filaTriagem" class="retanguloConteudo" style="margin-bottom: 10px;">
						<!-- Preenchido pelo javaScript filas.js -->
					</div>

				<div class="retanguloTitulo">Fila de doadores de sangue</div>
					<div id="filaDoadorSangue" class="retanguloConteudo" style="margin-bottom: 10px;">
						<!-- Preenchido pelo javaScript filas.js -->
					</div>
				
				<div class="retanguloTitulo">Fila de doadores de medula óssea</div>
					<div id="filaDoadorMedulaOssea" class="retanguloConteudo" style="margin-bottom: 10px;">
						<!-- Preenchido pelo javaScript filas.js -->
					</div>
			</div> <!-- Fim filas -->
		
			<div id="botoes">
				<a href="{{Route('visualizarAgendamentos')}}}"><div class="botaoMedioVisualizarAgendamentos" style="float:right;"></div></a>
			</div>
		</div> <!-- Fim conteudoDireita -->

	</div> <!-- Fim conteudo -->
</body>
</html>