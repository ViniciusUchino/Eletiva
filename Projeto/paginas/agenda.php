<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/agendas.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Agenda</h2>
    <a href="nova_agenda.php" class="btn btn-success mb-3">Nova Agenda</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Voluntário</th>
                <th>Atividade</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $agendas = listarAgendas();
                foreach ($agendas as $a):
            ?>

            <tr>
                <td><?= $a['id'] ?></td>
                <td><?= $a['nome_voluntario'] ?></td>
                <td><?= $a['nome_atividade'] ?></td>
                <td><?= $a['data'] ?></td>
                <td><?= $a['horario'] ?></td>
                <td>
                    <a href="excluir_agenda.php?id=<?= $a['id'] ?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_agenda.php?id=<?= $a['id'] ?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
