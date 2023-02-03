<?php 



if(isset($_GET['atualizarFront']) && $_GET['atualizarFront'] == true) {?>

           <script>

           let form = document.createElement('form');
           form.method = 'post';
           form.className = 'row';

           //Esta div armazena a tarefa
           let conteudo = document.createElement('div');
           conteudo.className = "ml-3";
           conteudo.style.textDecoration ="line-through";
           conteudo.innerHTML = tarefa;

           //Esta div armazena a informação de pendente e concluido
           let situacao = document.createElement('div');
           situacao.className = "ml-1 text-success";
           situacao.innerHTML = '(Concluido)';

           //Esta div envia o form;

           form.appendChild(conteudo);
           form.appendChild(situacao);

           if(id_status == 1){

           let tarefa_concluida = document.getElementById('tarefa_'+id);

           document.getElementById('tarefa_'+id).innerHTML = '';
           document.getElementById('excluir');

           tarefa_concluida.insertBefore(form, tarefa_concluida[0]);}

           console.log(id_status);

            </script>

<?php } ?>