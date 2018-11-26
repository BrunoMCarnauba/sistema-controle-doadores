function actionCadastroDoador(Valor){ /* Para mudar o action do form de cadastro do doador (Pois tem 2 submits no mesmo form) */
    if(Valor=="Cadastrar"){
       document.camposDoador.action = "{{Route('cadastrarDoador', ['id' => 1])}}"; /* No documento, no form camposDoador, mudar a ação para ... chama a rota e manda o id */
    }else if(Valor=="Cadastrar e registrar"){
        document.camposDoador.action = "{{Route('cadastrarDoador', ['id => 2])}}";
    }
}

/*
 * Colocamos dentro de um evento window.onload para que comece a execução
 * somente após a página inteira carregar.
 */
window.onload = function() {
    setTimeout(function(){
        // nome da classe do objeto que deseja manipular
        var e = "notificacao"; 

        // obtém o objeto pelo nome da classe
        var o = document.getElementsByClassName(e);                 

       /* 
        * Define a visibilidade como "none". 
        * Dá o mesmo efeito visual de como se estivesse removido.
        * Note que getElementsByClassName retornará uma lista de nós(NodeList).
        * Portanto, para acessar o elemento desejado, é necessário especificar 
        * qual a chave onde ele se encontra. 
        * No exemplo é obviamente a chave 0 (zero) pois é único.
        */
 
        o[0].style.display = 'none';
        
    }, 5000); // O tempo em milisegundos. 1 segundo = 1000 milisegundos.

    //Quando o valor da combo de estado alterar ele vai executar essa linha. Obs: Usa JQuery.
    //https://github.com/lorysz/dropdown-dinamica-php/blob/master/combo%20estado-cidade.txt
    $('#select_estados').change(function () {
        //armazenando o "value" do select que contém a sigla do estado
        var siglaEstado = document.getElementById("select_estados").value;
            if(siglaEstado!="Selecione"){ // Se tiver selecionado realmente um estado.
                //Chama a URL carregar-cidades-de-{siglaEstado}, mandando a siglaDoEstado via GET. Ela chamará um método do controller de cidade.
                 $.get('/carregar-cidades-de-' + siglaEstado, function (cidades) { //Recebe o html montado de cada cidade
                    //Remove as options do select com id "#select_cidades" que já estão presentes. (Pra evitar que ao selecionar outro estado, as options do estado passado continuem.)
                    $('#select_cidades').find("option").remove();
                    //montando a combo da cidade
                    $('#select_cidades').append(cidades);
                });
            }else{ // Se tiver selecionado o option "Selecione".
                $('#select_cidades').find("option").remove();
                $('#select_cidades').append("<option value=\"Selecione\">Selecione</option>");
            }
    });

};



    
