<!DOCTYPE html>

<?php 
$acao = 'recuperarTarefasPendentes';
require "controladorDados.php";//recuperação do controlador de dados do lado público 

?>

<html>
    <head lang="pt-br">
        <!--Meta-->
        <meta charset="utf-8">
        <meta charset="viewport" content="width=device-width,initial-scale=1">

        <!--Style tags-->
        <linl rel="stylesheet" type="text/css" href="arquivocss/index.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <title>App lista tarefas</title>
        
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
        </style>
        
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

        <div class="container mt-4">

            <div class="row">

                <div class="col-md-3 menu mt-3">
                    <ul class="list-group shadow" type="none">
                        <li class="list-group-item active"><a href="#">Tarefas Pendentes</a></li>
                        <li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
                        <li class="list-group-item"><a href="todas_tarefas.php">Todas tarefas</a></li>
                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="container pagina border rounded shadow mt-3">
                        <div class="row">
                            
                            <div class="col">
                                <h4 class="text-success">Tarefas Pendentes</h4><hr>

                            <?php foreach ($tarefas as $key){ ?>
                            
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-sm-9" id="tarefa_<?php print_r($key->id)?>"> 
                                
                                        <?php print_r($key->tarefa); ?>

                                    </div>
                                    
                                    <div class="col-sm-3 ml-auto d-flex justify-content-between">

                                    <!-----------------------------------------Excluir-------------------------------------------------->
                                        <i class="fas fa-trash-alt text-danger" onclick="buttonexcluirPrincipal(<?php print_r($key->id)?>)"></i>

									<!-----------------------------------------Concluir-------------------------------------------------->	
                                        <i class="fas fa-check text-success" onclick="concluirIndex(<?php print_r($key->id_status)?>, <?php print_r($key->id)?>, '<?php print_r($key->tarefa)?>')"></i>
                                    </div>
                                </div>

                                <hr>

                            <?php } ?>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>