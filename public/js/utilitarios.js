function actionTriagem(acao){ /* Para mudar o action do form de cadastro do doador (Pois tem 2 submits no mesmo form) */
    alert('teste');
    alert(acao);
    if(acao == "aprovar"){
        alert('Entrou em aprovar');
        document.getElementById('formObservacoes').action=("{{Route('aprovarDoadorTriagem')}}");
        //document.getElementById("formObservacoes").submit();
    } else if (acao == "reprovar") {
        alert('Entrou em reprovar');
        document.getElementById('formObservacoes').action="{{Route('reprovarDoadorTriagem')}}";
    }
    alert('Action modificado para = '+(document.getElementById('formObservacoes').action));
    //{{Route('registrarPreTriagem', ['id_registro_doacao' => session('infosDoador')['id_registro_doacao']])}}
    //document.camposDoador.action = rota; /* No documento, no form camposDoador, mudar a ação para ... chama a rota e manda o id */
}

   //Baseado em: https://github.com/lorysz/dropdown-dinamica-php/blob/master/combo%20estado-cidade.txt
     //Chama a URL /testes, que chamará o método de um controller que dará echo em algo para ser feito o teste.
     $.get('/testes', function (resultadoFila) { //Recebe o retorno do método correspondente à rota
        alert('teste');
        alert(resultadoFila);
    });