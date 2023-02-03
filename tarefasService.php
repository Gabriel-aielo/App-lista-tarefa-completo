<?php

    class TarefaService {

        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa){ //dentro dos parametros se realiza a tipagem "conexao" e "tarefa"
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public  function inserir(){ //criar
            $query = 'insert into tb_tarefas(tarefa) values(:tarefa)'; //prepare contra sql injection
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa')); // ('qual o atributo', valor do atributo)
            $stmt->execute();

        }

        public function recuperar(){ //ler
            $query = 'select id, id_status, tarefa, data_cadastrado from tb_tarefas';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){//atualizar
            $query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
            $stmt->bindValue(':id', $this->tarefa->__get('id')); // ('qual o atributo', valor do atributo)

            return $stmt->execute();

        }

        public function concluir(){

            $query = "update tb_tarefas set id_status = ? where id = ?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->tarefa->__get('id_status'));
            $stmt->bindValue(2, $this->tarefa->__get('id'));
            return $stmt->execute();
        }

        public function concluirIndex(){

            $query = "update tb_tarefas set id_status = ? where id = ?";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(1, $this->tarefa->__get('id_status'));
            $stmt->bindValue(2, $this->tarefa->__get('id'));
            return $stmt->execute();
        }

        public function excluir(){
            $query = 'delete from tb_tarefas where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->tarefa->__get('id'));
            return $stmt->execute();
        }

        public function buttonPrincipalIndex(){
            $query = 'delete from tb_tarefas where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->tarefa->__get('id'));
            return $stmt->execute();
        }

        public function recuperarTarefasPendentes(){
            $query = 'select id, id_status, tarefa, data_cadastrado from tb_tarefas where id_status = :id_status';

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }


?>