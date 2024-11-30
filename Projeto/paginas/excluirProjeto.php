<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/projetos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            if (excluirProjeto($id)) {
                header('Location: projetos.php');
                exit();
            } else {
                $erro = "Erro ao excluir o projeto!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $projeto = buscarProjetoPorId($id);
            if ($projeto == null) {
                header('Location: projetos.php');
                exit();
            }
        } else {
            header('Location: projetos.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Projeto</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir o projeto abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $projeto['nome'] ?></strong></li>
        <li><strong>Descrição: <?= $projeto['descricao'] ?></strong></li>
        <li><strong>Data de Início: <?= $projeto['data_inicio'] ?></strong></li>
        <li><strong>Data de Fim: <?= $projeto['data_fim'] ?></strong></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $projeto['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="projetos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
