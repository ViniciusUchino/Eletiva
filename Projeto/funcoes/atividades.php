<?php
function listarAtividades()
{
    global $pdo;
    try {
        $sql = "SELECT * FROM atividades";
        $result = $pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao listar atividades: " . $e->getMessage();
        return [];
    }
}

function retornarAtividades()
{
    global $pdo;

    $statement = $pdo->query("SELECT 
            a.id AS id_atividade, 
            a.nome AS nome_atividade, 
            a.descricao AS descricao_atividade, 
            a.data_inicio, 
            a.data_fim, 
            p.nome AS nome_projeto
        FROM atividades a
        JOIN projetos p ON p.id = a.projeto_id
    ");

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function criarAtividade(int $projeto_id, string $nome, string $descricao, string $data_inicio, string $data_fim)
{
    global $pdo;

    $statement = $pdo->prepare("INSERT INTO atividades (projeto_id, nome, descricao, data_inicio, data_fim)
        VALUES (?, ?, ?, ?, ?)
    ");

    return $statement->execute([$projeto_id, $nome, $descricao, $data_inicio, $data_fim]);
}

function buscarAtividadePorId(int $id)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT 
            a.id AS id_atividade, 
            a.nome AS nome_atividade, 
            a.descricao AS descricao_atividade, 
            a.data_inicio, 
            a.data_fim, 
            p.nome AS nome_projeto
        FROM atividades a
        JOIN projetos p ON p.id = a.projeto_id
        WHERE a.id = ?
    ");

    $statement->execute([$id]);
    $atividade = $statement->fetch(PDO::FETCH_ASSOC);

    return $atividade ? $atividade : null;
}

function atualizarAtividade(int $id, int $projeto_id, string $nome, string $descricao, string $data_inicio, string $data_fim)
{
    global $pdo;

    $statement = $pdo->prepare("UPDATE atividades
        SET projeto_id = ?, nome = ?, descricao = ?, data_inicio = ?, data_fim = ?
        WHERE id = ?
    ");

    return $statement->execute([$projeto_id, $nome, $descricao, $data_inicio, $data_fim, $id]);
}

function excluirAtividade(int $id)
{
    global $pdo;

    $statement = $pdo->prepare("DELETE FROM atividades
        WHERE id = ?
    ");

    return $statement->execute([$id]);
}
