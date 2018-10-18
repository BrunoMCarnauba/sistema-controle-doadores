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
};