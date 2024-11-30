<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/atividades.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Atividades</h2>
    <a href="nova_atividade.php" class="btn btn-success mb-3">Nova Atividade</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Projeto</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $atividades = listarAtividades();
                foreach ($atividades as $a):
            ?>

            <tr>
                <td><?= $a['id'] ?></td>
                <td><?= $a['nome'] ?></td>
                <td><?= $a['descricao'] ?></td>
                <td><?= $a['nome_projeto'] ?></td>
                <td><?= $a['data_inicio'] ?></td>
                <td><?= $a['data_fim'] ?></td>
                <td>
                    <a href="excluir_atividade.php?id=<?= $a['id'] ?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_atividade.php?id=<?= $a['id'] ?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
