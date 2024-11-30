<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/voluntarios.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            if (excluirVoluntario($id)) {
                header('Location: voluntarios.php');
                exit();
            } else {
                $erro = "Erro ao excluir o voluntário!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $voluntario = buscarVoluntarioPorId($id);
            if ($voluntario == null) {
                header('Location: voluntarios.php');
                exit();
            }
        } else {
            header('Location: voluntarios.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Voluntário</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir o voluntário abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $voluntario['nome'] ?></strong></li>
        <li><strong>Email: <?= $voluntario['email'] ?></strong></li>
        <li><strong>Telefone: <?= $voluntario['telefone'] ?></strong></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $voluntario['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="voluntarios.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
