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

    //Chama a URL carregar-fila-{tipo}-{quantidade}, mandando o tipo e a quantidade via GET. Ela chamará um método do controller de fila.
     $.get('/carregar-fila-1-3', function (resultadoFila) { //Recebe o html montado de cada cidade
        //alert('teste');
        if(resultadoFila != "vazia"){
            //Remove os parágrafos da div com id "#filaTriagem" que já estão presentes. (Pra evitar que ao por outro cpf os parágrafos do cpf passado continuem.)
            $('#filaTriagem').find("p").remove();
            //montando os parágrafos da div informacoesDoador
            $('#filaTriagem').append(resultadoFila);
        } else {
            $('#filaTriagem').find("p").remove();
            $('#filaTriagem').append("<p><br/></p><p style=\"text-align: center;\"> - Fila vazia - </p><p><br/></p>");
            $('#filaTriagem').append("<p style=\"text-align: right; margin-right: 5px;\">Total: 0</p>");
        }
    });

    //Chama a URL carregar-fila-{tipo}-{quantidade}, mandando o tipo e a quantidade via GET. Ela chamará um método do controller de fila.
     $.get('/carregar-fila-2-3', function (resultadoFila) { //Recebe o html montado de cada cidade
        //alert('teste');
        if(resultadoFila != "vazia"){
            //Remove os parágrafos da div com id "#filaDoadorSangue" que já estão presentes. (Pra evitar que ao por outro cpf os parágrafos do cpf passado continuem.)
            $('#filaDoadorSangue').find("p").remove();
            //montando os parágrafos da div informacoesDoador
            $('#filaDoadorSangue').append(resultadoFila);
        } else {
            $('#filaDoadorSangue').find("p").remove();
            $('#filaDoadorSangue').append("<p><br/></p><p style=\"text-align: center;\"> - Fila vazia - </p><p><br/></p>");
            $('#filaDoadorSangue').append("<p style=\"text-align: right; margin-right: 5px;\">Total: 0</p>");
        }
    });

    //Chama a URL carregar-fila-{tipo}-{quantidade}, mandando o tipo e a quantidade via GET. Ela chamará um método do controller de fila.
     $.get('/carregar-fila-3-3', function (resultadoFila) { //Recebe o html montado de cada cidade
        //alert('teste');
        if(resultadoFila != "vazia"){
            //Remove os parágrafos da div com id "#filaDoadorMedulaOssea" que já estão presentes. (Pra evitar que ao por outro cpf os parágrafos do cpf passado continuem.)
            $('#filaDoadorMedulaOssea').find("p").remove();
            //montando os parágrafos da div informacoesDoador
            $('#filaDoadorMedulaOssea').append(resultadoFila);
        } else {
            $('#filaDoadorMedulaOssea').find("p").remove();
            $('#filaDoadorMedulaOssea').append("<p><br/></p><p style=\"text-align: center;\"> - Fila vazia - </p><p><br/></p>");
            $('#filaDoadorMedulaOssea').append("<p style=\"text-align: right; margin-right: 5px;\">Total: 0</p>");
        }
    });

};