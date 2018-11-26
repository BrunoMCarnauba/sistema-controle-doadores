/*
 * Colocamos dentro de um evento window.onload para que comece a execução
 * somente após a página inteira carregar.
 */
window.onload = function() {
   //Quando o valor da combo de estado alterar ele vai executar essa linha. Obs: Usa JQuery.
    //https://github.com/lorysz/dropdown-dinamica-php/blob/master/combo%20estado-cidade.txt
    $('#input_cpf').blur(function () {
        //armazenando o "value" do select que contém a sigla do estado
        var cpf = document.getElementById("input_cpf").value;
            if((Object.keys(cpf).length) == 14){ // Se tiver informado todo o cpf
                //Chama a URL carregar-cidades-de-{siglaEstado}, mandando a siglaDoEstado via GET. Ela chamará um método do controller de cidade.
                 $.get('/existencia-doador-' + cpf, function (infosDoador) { //Recebe o html montado de cada cidade
                    //Remove os parágrafos da div com id "#informacoesDoador" que já estão presentes. (Pra evitar que ao por outro cpf os parágrafos do cpf passado continuem.)
                    if(infosDoador != "erro"){
                        $('#erroBusca').css({'display':'none'});
                        $('#informacoesDoador').find("p").remove();
                        //montando os parágrafos da div informacoesDoador
                        $('#informacoesDoador').append(infosDoador);
                    } else {
                        $('#informacoesDoador').find("p").remove();
                        $('#informacoesDoador').append("<p>Nome: </p><p>Idade: </p><p>Doou 0 vez(es): </p>");
                        $('#erroBusca').css({'display':'block'});
                    }
                });
            }
    });
}