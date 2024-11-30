<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/voluntarios.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Voluntários</h2>
    <a href="novo_voluntario.php" class="btn btn-success mb-3">Novo Voluntário</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $voluntarios = listarVoluntarios();
                foreach ($voluntarios as $v):
            ?>

            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['nome'] ?></td>
                <td><?= $v['email'] ?></td>
                <td><?= $v['telefone'] ?></td>
                <td>
                    <a href="excluir_voluntario.php?id=<?= $v['id'] ?>" class="btn btn-danger">Excluir</a>
                    <a href="editar_voluntario.php?id=<?= $v['id'] ?>" class="btn btn-success">Editar</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
