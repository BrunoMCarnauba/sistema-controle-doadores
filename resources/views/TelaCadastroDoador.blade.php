<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cadastrar Doador - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
    <script type="text/javascript" src="JScript.js"></script>

</head>

<body>
<div class="geral">
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Cadastro de doador</h2>
				<a href="TelaMenu.html" class="botaoInicio">Início</a>
				<a href="TelaLogin.html" class="botaoSair">Sair</a>
			</div>
		</div>
	</header>

	<!-- MENU -->
	<nav>
	<!-- IDEIA: FAZER UM MENU NA HORIZONTAL NAS OUTRAS TELAS (RECEPCAO, CADASTRAR FUNCIONARIO, ETC... COM FUNDO VERMELHO, LETRAS BRANCAS E QUE ABRE O MENU DA CATEGORIA PARA BAIXO) -->
	</nav>

	<!-- Campos -->
	<div class="area_cadastro">
		<div class="area_foto_cadastro">
			<img src="Imagens\Icones\Doadores.png" style="border: solid 2px #cf0003;">
		</div>
		<div class="area_campos_cadastro">
			<form name="camposDoador" action="" method="post">
				{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
				<label>Nome*</label>
				<input type="text" name="nomeDoador" class="camposCadastro" size="50">
				<br/>
				<label>CPF*</label>
				<input type="text" name="cpfDoador" class="camposCadastro">
				<br/>
				<label>Email*</label>
				<input type="email" name="emailDoador" class="camposCadastro">
				<br/>
				<label>Telefone fixo</label>
				<input type="text" name="telFixoDoador" class="camposCadastro">
				<br/>
				<label>Telefone celular</label>
				<input type="text" name="telCelDoador" class="camposCadastro">
				<br/>
				<label>CEP*</label>
				<input type="text" name="cepDoador" class="camposCadastro" onkeyup="mascaraCPF(this.value);">
				<br/>
				<label>Estado</label>
				<select name="estadoDoador" class="camposCadastro">
					<option value='AL'>AL</option>
				</select>
				<label>Cidade</label>
				<select name="cidadeDoador" class="camposCadastro">
					<option value='Maceió'>Maceió</option>
				</select>
				<br/>
				<label>Logradouro</label>
				<input type="text" name="logradouroDoador" class="camposCadastro">
				<label>Nº Residência</label>
				<input type="text" name="numResidenciaDoador" class="camposCadastro" size="3">
				<br/>
				<label>Complemento</label>
				<input type="text" name="complementoDoador" class="camposCadastro">
				<br/>
				<label>Data de nascimento*</label>
				<input type="date" name="dataNascimentoDoador" class="camposCadastro">
				<br/>
				<label>Sexo*</label>
				<select name="sexoDoador" class="camposCadastro">
					<option value='M'>Masculino</option>
					<option value='F'>Feminino</option>
					<option value='O'>Outro</option>
				</select>
				<br/>
				<label>Tipo sanguíneo</label>
				<select name="tipoSanguineoDoador" class="camposCadastro">
					<option value=''></option>
					<option value='A'>A</option>
					<option value='B'>B</option>
					<option value='AB'>AB</option>
				</select>
				<label>Fator RH</label>
				<select name="fatorRHDoador" class="camposCadastro">
					<option value=''></option>
					<option value='+'>Positivo</option>
					<option value='-'>Negativo</option>
				</select>
				<br/>

				@if($errors->any()) <!-- Checa se houve erros -->
				<div class="erroCadastro"> 
					<strong>Erro!</strong> 
					@foreach ($errors->all() as  $error) <!-- Lista todos os erros -->
					<p>$error</p>
					@endforeach
				</div>
				@endif

				<input type="submit" value="Cadastrar doador" class="botoesSimples" style="margin-top: 20px; margin-right: 10px;" onclick="actionCadastroDoador('Cadastrar');"> <!-- onClick direcionando para uma função em javaScript para alterar o action do form -->
				<input type="submit" value="Cadastrar doador e registrar doação" class="botoesSimples" style="margin-top: 20px;" onclick="actionCadastroDoador('Cadastrar e registrar');"> <!-- onClick direcionando para uma função em javaScript para alterar o action do form -->
			</form>
		</div>
	</div>

	<!-- Rodapé -->
	<footer>
		<div id="rodape"></div>
	</footer>
</div>

</body>
</html>