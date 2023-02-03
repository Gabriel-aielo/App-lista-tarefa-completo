function editar(id, txt_tarefa){
    //Criar form de edicao
    let form = document.createElement('form');
    form.action = 'controladorDados.php?acao=atualizar'; //destino indefinido no momento
    form.method = 'post';
    form.className = 'row';

    //criar um input para entrada de texto
    let inputTarefa = document.createElement('input');
    inputTarefa.type = "text";
    inputTarefa.name = "tarefa";
    inputTarefa.className = "col-md-9 form-control"; //class do bootstrap
    inputTarefa.placeholder = txt_tarefa;

    //Guardando o id da tarefa
    let inputId = document.createElement('input');
    inputId.type = 'hidden';
    inputId.name = 'id';
    inputId.value = id;


    //button para envio do form
    let button = document.createElement('button');
    button.type = "submit";
    button.className = "col-md-3 btn btn-success"; //class bootstrap
    button.innerHTML = "Atualizar"; //elemento encapsulado dentro do botão(escrita visivel ao usuario)

    form.appendChild(inputTarefa); //basicamente: <form><input></input></form>

    form.appendChild(inputId);

    form.appendChild(button); //basicamente: <form><button></button></form>

    //console.log(form);

    //selecionar a div tarefa
    let tarefa = document.getElementById('tarefa_'+id);

    document.getElementById('tarefa_'+id).innerHTML = '';//limpando o coteudo anterior da tag

    tarefa.insertBefore(form, tarefa[0]); //InsertBefore espera dois parametros. Primeiro: Qual a arvore de elementos? Segundo: Qual a tag filha dessa classe de elementos, como
    //tarefa não possui tag child, o indice é 0.


}

function excluir(id) {

    location.href = 'controladorDados.php?acao=excluir&id='+id;
}

function buttonexcluirPrincipal(id) {
   location.href = 'controladorDados.php?acao=excluirIndex&id='+id;
}

function concluido(id_status, id, tarefa){

    location.href = 'controladorDados.php?acao=concluido&id='+id;

}

function concluirIndex(id_status, id, tarefa){
    location.href = 'controladorDados.php?acao=concluidoIndex&id='+id;
}