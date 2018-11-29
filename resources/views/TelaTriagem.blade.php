<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/ >
	<title>Realizar triagem - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
    <script type="text/javascript" src="{{asset('js/geral.js')}}"></script>

    <style type="text/css">
		#conteudo{
			margin-top: 10px;
			margin-left: 23%;
		}

		#conteudoEsquerda{
			min-width: 610px;
			height: 720px;
			float: left;
		}

		#perguntas{
			max-width: 590px;
			background-color: #f4dbdb;
		}

		#perguntas p{
			height: 510px;
			overflow: auto;
			margin-top: 0px;
			margin-bottom: 0px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		#conteudoDireita{
			margin-top: 15px;
			min-width: 425px;
			height: 720px;
			float:left;
		}
    </style>

</head>
<body>
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Triagem</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<!-- Menu -->
	<nav>
		
	</nav>

	@if(session('notificacao')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'notificacao' -->	
	<div class="notificacao"><p>Descrição da notificação</p></div>
	@endif

	<!-- Conteudo -->
	<div id="conteudo">
		<!-- Conteúdo esquerda - Perguntas e informações doador-->
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

			<!-- Perguntas -->
			<div class="retanguloTitulo" style="margin-top: 15px;">Perguntas</div>
			<div id="perguntas">
				<p>1) <b>Já</b> doou sangue? <b>Há</b> quanto tempo? <b>Sentiu-se</b> mal? <b>O que</b> houve?
				   <b>Já</b> foi recusado ou apresentou testes alterados em alguma doação? <b>Qual</b> o motivo? 
                   <br><br>
                   2) <b>Está</b> doando para fazer algum exame? <b>Qual?</b> 
                   <br><br>
                   3) <b>Está</b> alimentado? <b>Que</b> tipo de alimento ingeriu? <b>Há</b> quanto tempo? <b>Dormiu</b> bem? <b>Está</b> descansado? <b>Está</b> se sentindo bem? <b>Perdeu</b> peso recentemente sem motivo aparente ou fez dieta ou tomou remédio? <b>Quando</b>? 
                   <br><br>
                   4) <b>Quando</b> ingeriu bebida alcóolica pela última vez? <b>Bebeu</b> o que? <b>Quanto</b>? <b>Tem</b> hábito de tomar bebida alcoólica? <b>Que</b> tipo? <b>Quanto</b> e com que freqüência? 
                   <br><br>
                   5) <b>Está grávida?</b> <b>Está</b> amamentando? <b>Teve</b> aborto ou parto nos últimos 3 meses?
                   <b>Está</b> menstruada? <b>O</b> fluxo menstrual está muito intenso? <b>Quando</b> foi a última menstruação? 
                   <br><br>
                   6) <b>Tomou</b> alguma vacina recentemente? Qual?
                   <br><br>
                   7) <b>Usou</b> algum medicamento recentemente? <b>Qual</b>? <b>Quando</b>? <b>Por que</b>?
                   <b>Está</b> fazendo tratamento de pele ou fez nos últimos 30 dias?
                   <b>Que</b> tipo de produto usou ou está usando? 
                   <br><br>
                   8) <b>Tem</b> alergia? <b>A</b> que? <b>Quando</b> foi a última crise? <b>Faz</b> tratamento? <b>Qual</b>? 
                   <br><br>
                   9) <b>Esteve</b> gripado, resfriado, com dor de garganta, febre ou diarréia, na última semana? <b>Quando</b>? 
                   <br><br>
                   10) <b>Fez</b> tratamento dentário na última semana? <b>Qual</b>? 
                   <br><br>
                   11) <b>Já</b> foi operado? <b>Quando</b>? <b>De</b> que? <b>Precisou</b> tomar sangue? <b>Já</b> voltou às suas atividades normais? 
                   <br><br>
                   12) <b>Tem</b> ou teve convulsões? <b>Quando</b>? 
                   <br><br>
                   13) <b>Tem</b> ou teve problema do coração, rins, pulmões, fígado, estômago, intestino, pele, psiquiátrico, de coagulação? <b>Qual</b>? <b>Tem</b>/teve anemia, diabetes, reumatismo? <b>Já</b> teve alguma doença grave? <b>Qual</b>? 
                   <br><br>
                   14) <b>Tem</b> doença de Chagas? <b>Conhece</b> inseto/barbeiro que transmite a doença de Chagas? <b>Já</b> foi picado? <b>Morou</b> em casa de pau a pique? <b>Teve</b> malária? <b>Quando</b>? <b>Fez</b> tratamento e foi considerado (a) curado (a) há quanto tempo? <b>Viajou</b> nos últimos 6 meses? <b>Para</b> onde? - <b>se</b> a viagem foi para área endêmica para malária perguntar: há quanto tempo voltou? <b>Já</b> morou em outra estado/cidade? (<b>se</b> for região endêmica para malária-perguntar há quanto tempo se mudou?) <b>Teve</b> tuberculose? <b>Teve</b> Hanseníase? <b>Teve</b> filariose? 
                   <br><br>
                   15) <b>Recebeu</b> hormônio do crescimento? <b>Quando</b>? Lembra-se do nome/marca? 
                   <br><br>
                   16) <b>Recebeu</b> transfusão de sangue? Quando? <b>Por que</b>? 
                   <br><br>
                   17) <b>Já</b> teve hepatite ou icterícia? <b>Quando</b>? <b>Teve</b> contato íntimo com pessoas que tiveram hepatite no último ano?
                   <br><br>
                   18) <b>Fez</b> tatuagem a agulha e a tinta? <b>Quando</b>? <b>Fez</b> acupuntura? <b>Quando</b>? Com profissional registrado? <b>Fez</b> piercing com agulha? <b>Quando</b>?
                   <br><br>
                   19) <b>Sofreu</b> algum contato acidental envolvendo cortes na sua pele com instrumentos contaminados com sangue de outra pessoa, como por exemplo agulhas, bisturi? <b>Teve</b> contato acidental de mucosas (olho, boca) com material biológico (sangue e secreções)? 
                   <br><br>
                   20) <b>Já</b> teve alguma doença venérea? <b>Qual</b>? <b>Quando</b>? <b>Fez</b> tratamento e foi considerado (a) curado(a) há quanto tempo? Teve relação sexual com profissional do sexo? <b>Quando</b>? <b>Teve</b> relação sexual com parceiro ocasional, ou seja, "ficou e manteve relações sexuais"? <b>Teve</b> relação sexual com parceiro desconhecido? 
                   <br><br>
                   21) <b>Tem</b> parceiro fixo? <b>Quantos</b>? <b>Quantos</b> parceiros teve nos últimos 12 meses? <b>Teve</b> ou tem relações sexuais com pessoa do mesmo sexo que você? <b>Quando</b>? 
                   <br><br>
                   22) <b>Usou</b> ou usa algum tipo de droga? <b>Qual</b>? <b>Quando</b>? <b>Você</b> já deu ou recebeu droga ou dinheiro para manter relações sexuais? <b>Quando</b>? <b>Já</b> esteve preso ou em clínicas de recuperação? <b>Quando</b> e por quanto tempo? <b>E</b> seu parceiro já esteve ou está preso ou em clínicas de recuperação? <b>Quando</b> e por quanto tempo? 
                   <br><br>
                   23) <b>Teve</b> ou tem contato sexual com pessoa suspeita de ter o vírus da Aids? <b>Quando</b>? <b>Já</b> teve ou tem relação sexual com pessoa que recebeu sangue ou faz hemodiálise? <b>Quando</b>? <b>Tem</b> ou teve relação com parceiro que já usou ou usa droga? <b>Quando</b>? <b>Tem</b> ou teve relação com parceiro que já teve hepatite, doença venérea? <b>E</b> a vida sexual do seu parceiro? Tem mais alguma informação importante sobre ela? 
                   <br><br>
                   24) <b>Você</b> gostaria de fazer mais alguma pergunta? Tem alguma dúvida? 
                   <br><br>
                   25) <b>Você</b> gostaria de alterar alguma de suas respostas anteriores?
				</p>
			</div>

		</div> <!-- Fim conteudo esquerda -->

		<!-- Conteudo direita - Fila, outras opções -->
		<div id="conteudoDireita">
			<!-- Informações sobre a fila -->
			<div id="informativo">
				<div class="retanguloTituloMenor">Quantidade de doadores na fila</div>
				<div class="retanguloConteudoMenor" style="margin-bottom: 10px;">
					<label class="retanguloQtdFila">4</label>
					<p id="qtdDoadoresSangue" class="retanguloNomeFila">Doador(es) de sangue</p>
					<label class="retanguloQtdFila">0</label>
					<p id="qtdDoadoresMedulaOssea" class="retanguloNomeFila">Doador(es) de medula óssea</p>
				</div>
			</div>

			<div id="observacoes" style="max-width: 430px;">
				<div class="retanguloTituloMenor">Observações</div>
				<div>
					<form id="formObservacoes" action="" method="post">
						{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
						<textarea name="observacoes" style="width: 414px; height: 305px; font-size: 12pt; resize: vertical;"></textarea>

						<input type="submit" name="aprovar" value="Aprovar" class="botoesSimplesMaior" style="background-color: rgb(0,153,0); width: 208px;" onclick="actionTriagem(\"aprovar\",{{session('infosDoador')['id_registro_doacao']}});">
						<input type="submit" name="reprovar" value="Reprovar" class="botoesSimplesMaior" style="width: 208px;" onclick="actionTriagem(\"reprovar\",{{session('infosDoador')['id_registro_doacao']}});">
					</form>
				</div>
			</div>

			<!-- Botões -->
			<div id="botoes" style="clear: both;">
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