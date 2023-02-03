<?php 

	$acao = 'recuperar';
	require "controladorDados.php";//recuperação do controlador de dados do lado público 
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	
<!-------------------------------------------------------------------------STYLE----------------------------------------------------------------------->

		<style>
            ul li.list-group-item.active{
                border-left:10px solid green ;
                background:#fff;
                border-color:green;
            }
            li a:hover{ 
                text-decoration: none !important;
            }
            i{
                font-size: 25px;
                padding: 5px;
            }

            .bordageral{
                border-bottom: 1px solid rgb(215, 215, 215);
            }

            .pagina{
                padding:25px !important;
            }

			.btn-custom{
				border:none;
				background:none;
			}
        </style>

<!-------------------------------------------------------------------------SCRIPT----------------------------------------------------------------------->

		<script src="index.js"></script>

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<?php require "mensagem_atualizacao.php"; ?>

		<div class="container mt-5">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group shadow">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9 border rounded shadow p-3">
					<div class="container">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />		

								<?php foreach($tarefas as $key) { ?> <!--Percorre o array $tarefas, recupera o indice e acessa cada uma delas-->

									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?php print_r($key->id) //a concatenação do id, permite que seja realizado um id exclusivbo para cada div ?>"> <?php print_r($key->tarefa) ?>  
										
										(<?php //condição if para realizar a modificação do Id_Status
											if($key->id_status == 1){
												print_r('Pendente'); 
											} else if($key->id_status == 2){
												print_r('Realizado'); 
											}
										
										?>)</div>

											<div class="col-sm-3 mt-2 d-flex justify-content-between">
												<!-----------------------------------------Excluir-------------------------------------------------->
												<i class="fas fa-trash-alt fa-lg text-danger" id="excluir" onclick="excluir(<?php print_r($key->id)?>)"></i>

												<?php if($key->id_status == 1){ ?>
												
												<!-----------------------------------------Editar-------------------------------------------------->
												<i class="fas fa-edit fa-lg text-info" id="editar" onclick="editar(<?php print_r($key->id)?>, '<?php print_r($key->tarefa)?>')"></i>

												<!-----------------------------------------Concluir-------------------------------------------------->	
												<i class="fas fa-check-square fa-lg text-success" onclick="concluido(<?php print_r($key->id_status)?>, <?php print_r($key->id)?>, '<?php print_r($key->tarefa)?>')"></i>

												<?php } ?>
												
											</div>
									</div>

								<?php } ?>
		
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>