<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/projetos.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Projetos</h2>
    <a href="novo_projeto.php" class="btn btn-success mb-3">Novo Projeto</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data Início</th>
                <th>Data Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $projetos = listarProjetos();
                foreach ($projetos as $p):
            ?>

            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nome'] ?></td>
                <td><?= $p['descricao'] ?></td>
                <td><?= $p['data_inicio'] ?></td>
                <td><?= $p['data_fim'] ?></td>
                <td>
                    <a href="excluir_projeto.php?id=<?= $p['id'] ?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_projeto.php?id=<?= $p['id'] ?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
