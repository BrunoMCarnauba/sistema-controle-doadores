<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cadastrar Funcionário - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 

</head>

<body>
<div class="geral">
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Cadastro de funcionário</h2>
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
		<form action="{{Route('cadastrarFuncionario')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}} <!-- Token para a comunicação do cliente com o servidor, para evitar ataque malicioso -->
			<div class="area_foto_cadastro">
				<img src="Imagens\Icones\Funcionario_Icone_250x336.png" style="border: solid 2px #cf0003;">
				<br/>
					<input type="file" name="fotoFuncionario">
			</div>

			<div class="area_campos_cadastro">
				<label>Nome*</label>
				<input type="text" name="nomeFunc" class="camposCadastro" size="50">
				<br/>
				<label>CPF*</label>
				<input type="text" name="cpfFunc" class="camposCadastro">
				<br/>
				<label>Email*</label>
				<input type="email" name="emailFunc" class="camposCadastro">
				<br/>
				<label>Telefone fixo</label>
				<input type="text" name="telFixoFunc" class="camposCadastro">
				<br/>
				<label>Telefone celular</label>
				<input type="text" name="telCelFunc" class="camposCadastro">
				<br/>
				<label>Data de admissão</label>
				<input type="date" name="dataAdmissaoFunc" class="camposCadastro">
				<br/>
				<label>Cargo*</label>
				<select name="cargoFunc" class="camposCadastro">
					<option value='Selecione'>Selecione</option>
				</select>
				<label>Salário*</label>
				<input type="number" name="salarioFunc" class="camposCadastro" style="width: 100px;">
				<br/>
				<label>CEP*</label>
				<input type="text" name="cepFunc" class="camposCadastro">
				<br/>
				<label>Estado</label>
				<select name="estadoFunc" class="camposCadastro">
					<option value='AL'>AL</option>
				</select>
				<label>Cidade</label>
				<select name="cidadeFunc" class="camposCadastro">
					<option value='Maceió'>Maceió</option>
				</select>
				<br/>
				<label>Logradouro</label>
				<input type="text" name="logradouroFunc" class="camposCadastro">
				<label>Nº Residência</label>
				<input type="text" name="numResidenciaFunc" class="camposCadastro" size="3">
				<br/>
				<label>Complemento</label>
				<input type="text" name="complementoFunc" class="camposCadastro">
				<br/>
				<label>Data de nascimento*</label>
				<input type="date" name="dataNascimentoFunc" class="camposCadastro">
				<br/>
				<label>Sexo*</label>
				<select name="sexoFunc" class="camposCadastro">
					<option value='M'>Masculino</option>
					<option value='F'>Feminino</option>
					<option value='O'>Outro</option>
				</select>
				<br/>
				<label>Usuário*</label>
				<input type="text" name="usuarioFunc" class="camposCadastro">
				<label>Senha*</label>
				<input type="password" name="senhaFunc" class="camposCadastro">
				<br/>
				<label>Confirmação senha*</label>
				<input type="password" name="confirmaSenhaFunc" class="camposCadastro">
				<br/>

				@if ($errrors->any()) <!-- Checa se houve erros -->
				<div class="erroCadastro"> 
					<strong>Erro!</strong> 
					@foreach ($errors->all() as  $error) <!-- Lista todos os erros -->
					<p>{{$error}}</p>
					@endforeach
				</div>
				@endif

				<input type="submit" value="Cadastrar funcionário" class="botoesSimples" style="margin-top: 20px;">
			</div>	
		</form>
	</div>

	<!-- Rodapé -->
	<footer>
		<div id="rodape"></div>
	</footer>
</div>

</body>
</html>