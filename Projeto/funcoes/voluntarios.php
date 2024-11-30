<?php
include_once '../config/dbconn.php';

    function listarVoluntarios()
    {
        global $pdo;
        $statement = $pdo->query("SELECT * FROM voluntarios");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function criarVoluntario($nome, $email, $telefone)
    {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO voluntarios (nome, email, telefone) VALUES (?, ?, ?)");
        return $statement->execute([$nome, $email, $telefone]);
    }

    function buscarVoluntarioPorId($id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM voluntarios WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function atualizarVoluntario($id, $nome, $email, $telefone)
    {
        global $pdo;
        $statement = $pdo->prepare("UPDATE voluntarios SET nome = ?, email = ?, telefone = ? WHERE id = ?");
        return $statement->execute([$nome, $email, $telefone, $id]);
    }

    function excluirVoluntario($id)
    {
        global $pdo;
        $statement = $pdo->prepare("DELETE FROM voluntarios WHERE id = ?");
        return  $statement->execute([$id]);
    }
?>