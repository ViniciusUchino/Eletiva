<?php
include_once '../config/dbconn.php';

function listarAgendas()
{
    global $pdo;

    $statement = $pdo->query("SELECT 
            a.id AS id_agenda,
            v.nome AS nome_voluntario,
            t.nome AS nome_atividade,
            p.nome AS nome_projeto,
            a.data AS data_agendada,
            a.horario AS horario_agendado
        FROM agenda_voluntarios a
        JOIN voluntarios v ON v.id = a.voluntario_id
        JOIN atividades t ON t.id = a.atividade_id
        JOIN projetos p ON p.id = t.projeto_id
    ");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function criarAgenda(int $voluntario_id, int $atividade_id, string $data, string $horario)
{
    global $pdo;

    $statement = $pdo->prepare("
    INSERT INTO agenda_voluntarios(voluntario_id, atividade_id, data, horario) 
    VALUES (?, ?, ?, ?)
    ");
    return $statement->execute([$voluntario_id, $atividade_id, $data, $horario]);
}

function retornarAgendaPorId(int $id)
{
    global $pdo;

    $statement = $pdo->prepare("SELECT 
            a.id AS id_agenda,
            v.nome AS nome_voluntario,
            t.nome AS nome_atividade,
            p.nome AS nome_projeto,
            a.data AS data_agendada,
            a.horario AS horario_agendado
        FROM agenda_voluntarios a
        JOIN voluntarios v ON v.id = a.voluntario_id
        JOIN atividades t ON t.id = a.atividade_id
        JOIN projetos p ON p.id = t.projeto_id
        WHERE a.id = ?
    ");
    $statement->execute([$id]);
    $agenda = $statement->fetch(PDO::FETCH_ASSOC);
    return $agenda ? $agenda : null;
}

function editarAgenda(int $id, int $voluntario_id, int $atividade_id, string $data, string $horario)
{
    global $pdo;
    $statement = $pdo->prepare("UPDATE agenda_voluntarios
        SET voluntario_id = ?, atividade_id = ?, data = ?, horario = ?
        WHERE id = ?
    ");

    return $statement->execute([$voluntario_id, $atividade_id, $data, $horario, $id]);
}

function excluirAgenda($id)
{
    global $pdo;

    $statement = $pdo->prepare("DELETE FROM agenda_voluntarios
        WHERE id = ?
    ");

    return $statement->execute([$id]);
}
