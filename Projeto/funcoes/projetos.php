<?php
    declare(strict_types = 1);
    require_once '../config/dbconn.php';

    function listarProjetos(){
        global $pdo;

        $statement = $pdo->query("SELECT * FROM projetos");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarProjeto($nome, $descricao, $data_inicio, $data_fim){
        global $pdo;

        $statement = $pdo->prepare("INSERT INTO projetos (nome, descricao, data_inicio, data_fim)VALUES (?,?,?,?)");
        return $statement->execute([$nome, $descricao, $data_inicio, $data_fim]);
    }

    function buscarProjetoPorId(int $id){
        global $pdo;

        $statement = $pdo->prepare("SELECT * FROM projetos WHERE id = ?");
        $statement->execute([$id]);
        
        $projeto = $statement->fetch(PDO::FETCH_ASSOC);

        return $projeto ? $projeto : null;

    }

    function atualizarProjeto(int $id, string $nome, datetime $data_inicio, datetime $data_fim){
        global $pdo;

        $statement = $pdo->prepare("UPDATE projetos SET nome = ? WHERE id = ? AND data_inicio = ? AND $data_fim = ?");
        return $statement->execute([$nome, $id, $data_inicio, $data_fim]);
    }

    function excluirProjeto(int $id){
        global $pdo;

        $statement = $pdo->prepare("DELETE FROM projetos WHERE id = ?");
        return $statement->execute([$id]);
    }
?>