<?php
 
    require "../../App_lista_tarefas_protected/tarefas.php"; //tarefa.model
    require "../../App_lista_tarefas_protected/tarefasService.php"; // tarefa.service
    require "../../App_lista_tarefas_protected/conexaoservidor.php"; // conexao

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao; //tipo de if

	if($acao == 'inserir'){
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);
	
		$conexao = new Conexao();
	
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();
	
		header('location: ../../App_Lista_Tarefas/nova_tarefa.php?cadastro=enviado');

	} else if($acao == 'recuperar') {

		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();

	} else if($acao == 'atualizar'){
		
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao(); //nova instancia de conexao

		$tarefaService = new TarefaService($conexao, $tarefa);

		$tarefaService->atualizar();

		header('location:../../App_Lista_Tarefas/todas_tarefas.php?atualizado=TRUE');

	} else if($acao == 'concluido'){

		$tarefa = new Tarefa();

		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->concluir();

		header('location: todas_tarefas.php');

	} else if($acao == 'concluidoIndex'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2); // para id_status = 1(pendente)

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->concluirIndex();

		header('location: index.php');

	} else if($acao == 'excluir'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->excluir();

		header('location: todas_tarefas.php');

	} else if($acao == 'excluirIndex'){ 
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->buttonPrincipalIndex();

		header('location: index.php');
	
	}else if ($acao == 'recuperarTarefasPendentes') {
		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperarTarefasPendentes();
	} 

?>