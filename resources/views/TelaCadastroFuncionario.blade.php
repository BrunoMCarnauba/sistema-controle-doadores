<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cadastrar Funcionário - Sis Controle de Doadores</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}"> 
    <script type="text/javascript" src="{{asset('js/geral.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/endereco.js')}}"></script>

</head>

<body>
<div class="geral">
	<!-- Cabeçalho -->
	<header>
		<div id="cabecalho_pt1">
			<div id="cabecalho_pt2">
				<h1 style="margin-top: 0px; margin-bottom: 0px; color: white;">Sistema de controle de doadores</h1>
				<h2 style="margin-top: 0px; color: white">Cadastro de funcionário</h2>
				<a href="{{Route('menu')}}" class="botaoInicio">Início</a>
				<a href="{{Route('login')}}" class="botaoSair">Sair</a>
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
				<img src="{{asset('Imagens\Outros\Funcionario_Icone_250x336.png')}}" style="border: solid 2px #cf0003;">
				<br/>
					<input type="file" name="fotoFuncionario">
			</div>

			<div class="area_campos_cadastro">
				<label>Nome*</label>
				<input type="text" name="nome" class="camposCadastro" size="50">
				<br/>
				<label>CPF*</label>
				<input type="text" name="cpf" class="camposCadastro" size="15" maxlength="14">
				<br/>
				<label>Email*</label>
				<input type="email" name="email" class="camposCadastro">
				<br/>
				<label>Telefone fixo</label>
				<input type="text" name="telefoneFixo" class="camposCadastro">
				<br/>
				<label>Telefone celular</label>
				<input type="text" name="telefoneCelular" class="camposCadastro">
				<br/>
				<label>Data de admissão</label>
				<input type="date" name="dataAdmissao" class="camposCadastro">
				<br/>
				<label>Cargo*</label>
				<select name="cargo" class="camposCadastro">
					<option value='Selecione'>Selecione</option>
					@foreach ($cargos as $cargo) <!-- Existem vários cargos, em cada repetição ele pega um cargo e cria a <option> com o nome dele -->
						<option value="{{$cargo->id_cargo}}">{{$cargo->nome}}</option>
					@endforeach
				</select>
				<br/>
				<label>CEP*</label>
				<input type="text" name="cep" class="camposCadastro" size="10" maxlength="9" onblur="pesquisacep(this.value);">
				<br/>
				<label>Estado</label>
				<select id="select_estados" name="estado" class="camposCadastro">
						<option value="Selecione">  </option>
					@foreach ($estados as $estado) <!-- Existem vários estados, em cada repetição ele pega um estado e cria a <option> com a sigla dele -->
						<option value="{{$estado->sigla}}">{{$estado->sigla}}</option>
					@endforeach
				</select>
				<label>Cidade</label>
				<!-- O select "select_cidades" é controlado pelo javaScript "endereco.js" -->
				<select id="select_cidades" name="cidade" class="camposCadastro">
					<option value='Selecione'>Selecione</option>
				</select>
				<br/>
				<label>Logradouro</label>
				<input id="logradouro" type="text" name="logradouro" class="camposCadastro">
				<label>Nº Residência</label>
				<input type="text" name="numeroResidencia" class="camposCadastro" size="3">
				<br/>
				<label>Complemento</label>
				<input type="text" name="complemento" class="camposCadastro">
				<br/>
				<label>Data de nascimento*</label>
				<input type="date" name="dataNascimento" class="camposCadastro">
				<br/>
				<label>Sexo*</label>
				<select name="sexo" class="camposCadastro">
					<option value='M'>Masculino</option>
					<option value='F'>Feminino</option>
					<option value='O'>Outro</option>
				</select>
				<br/>
				<label>Usuário*</label>
				<input type="text" name="usuario" class="camposCadastro">
				<label>Senha*</label>
				<input type="password" name="senha" class="camposCadastro">
				<br/>
				<label>Confirmação senha*</label>
				<input type="password" name="confirmaSenha" class="camposCadastro">
				<br/>

				@if ($errors->any()) <!-- Checa se houve erros -->
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