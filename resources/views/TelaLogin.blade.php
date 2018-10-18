<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> <!-- Para pegar acentos -->
	<title>Entrar no Sis. Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
	<style type="text/css">

		#planoDeFundo{
			opacity: 0.5; 
			position: absolute;
			top: 80px;
			left:0px;
			background-attachment: fixed; /* Para não se mover com o scroll */
			height: 91.6%;
			width: 100%;
			min-width: 696px;
			min-height: 464px;
			z-index: -1; /* É como se fosse a definição da camada do componente. Se ficará por baixo, por cima de algum outro, etc... */
		}

		#camposLogin{
			font-size: 20pt;
			text-align: center;
			color: white;
			width: 289px;
			height: 237px;
			min-width: 202px;
			background-color: rgba(0,0,0,0.5);
			margin: auto;
		}

		#erroLogin{
			background-color: #aa0002;
			width: 299px;
			min-width: 202px;
			color: white; /* Cor da fonte */
			margin: 5px auto; /* Centraliza horizontalmente (top e bottom ficam com 5px e left e right ficam iguais) */
			padding: 10px 15px; /* Padding para top e bottom, e left e right*/
			border-radius: 5px; /* Cria curva para as bordas */
		}

	</style>
</head>
<body>
	<!-- Cabeçalho -->
	<div> <!-- Inicio Div -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Faça o seu login</h2>
			</div>
		</div>
			<img src="{{asset('Imagens\Outros\Logotipo-sistema.png')}}" style="margin: auto; display: block;"> <!-- Mudando display de elemento em linha para elemento block para ocupar toda a largura disponível e então poder centralizar -->
	</header>
		

	<!-- Campos para login -->
	<form action="{{url('logar')}}" method="post"> <!-- Foi o código "url" ao invés de "Route" porque não foi definido nome para a rota /logar  -->
		{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
		<fieldset id="camposLogin"> <!-- Agrupar campos em um quadro -->
			<div style="margin-top: 20px;">
				<label><b>Usuário</b></label>
				<br/>
				<input type="text" name="usuarioLogin" style="height: 25px;">
				<br/>
					<div style="margin-top: 15px;">
						<label><b>Senha</b></label>
						<br/>
						<input type="password" name="senhaLogin" style="height: 25px;">
						<br/>
						<input type="submit" name="Entrar" value="Entrar" class="botoesSimples" style="margin-top:30px;">
					</div>		
			</div>
		</fieldset>
	</form>
	@if(session('erro')) <!-- Se essa página tiver vindo de um redirecionamento junto com a variável 'erro' -->
		<div id="erroLogin"><strong>Erro!</strong> {{session('erro')}}</div> <!-- Então, mostre o erro -->
	@endif

	</div> <!-- Fim Div -->
	
	<!-- Plano de fundo -->
	<div><img src="{{asset('imagens\Plano-de-fundo\Login.jpg')}}" id="planoDeFundo"></div>
</body>
</html>