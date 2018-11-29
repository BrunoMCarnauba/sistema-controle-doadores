//Esse javascript contém: As funções do viaCep e lá pra baixo tem a função que altera o combobox de cidades de acordo com o estado selecionado.
    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value=("");
        //document.getElementById('bairro').value=("");
        document.getElementById('select_estados').value=("Selecione");
        //document.getElementById('select_cidades').value=("");
        //document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value=(conteudo.logradouro);
        //document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('select_estados').value=(conteudo.uf);
        alterarCidades(conteudo.localidade);    //Passa a cidade do cep, para que o select seja carregado e a cidade do cep seja selecionada.
        //document.getElementById('select_cidades').value=(conteudo.localidade);
        //document.getElementById('ibge').value=(conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
    }

    function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouro').value="...";
            //document.getElementById('bairro').value="...";
            document.getElementById('select_estados').value="...";
            document.getElementById('select_cidades').value="...";
            //document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
    };
/*
 * Colocamos dentro de um evento window.onload para que comece a execução
 * somente após a página inteira carregar.
 */
window.onload = function() {
    //Quando o valor da combo de estado alterar ele vai executar essa linha. Obs: Usa JQuery.
    //https://github.com/lorysz/dropdown-dinamica-php/blob/master/combo%20estado-cidade.txt
    $('#select_estados').change(function () { //Quando seleciona outro item no select de estados
        alterarCidades('null'); //Passa null pois quem está chamando essa função não é o viaCep. Apenas houve onChange no estado.
    });
}

    function alterarCidades(cidadeDoCep){ //Esse parâmetro é usado para quando essa função for chamada pelo viaCep, ele mandar qual foi a cidade do cep.
        //armazenando o "value" do select que contém a sigla do estado
        var siglaEstado = document.getElementById("select_estados").value;
            if(siglaEstado!="Selecione"){ // Se tiver selecionado realmente um estado.
                //Chama a URL carregar-cidades-de-{siglaEstado}, mandando a siglaDoEstado via GET. Ela chamará um método do controller de cidade.
                $.get('/carregar-cidades-de-' + siglaEstado, function (cidades) { //Recebe o html montado de cada cidade
                    //Remove as options do select com id "#select_cidades" que já estão presentes. (Pra evitar que ao selecionar outro estado, as options do estado passado continuem.)
                    $('#select_cidades').find("option").remove();
                    //montando a combo da cidade
                    $('#select_cidades').append(cidades);
                    if(cidadeDoCep != 'null'){  //Se essa função tiver sido chamada pelo viaCep
                        document.getElementById('select_cidades').value=(cidadeDoCep);
                    }
                });
            }else{ // Se tiver selecionado o option "Selecione".
                $('#select_cidades').find("option").remove();
                $('#select_cidades').append("<option value=\"Selecione\">Selecione</option>");
            }
    }