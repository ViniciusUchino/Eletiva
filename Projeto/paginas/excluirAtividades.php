<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/atividades.php';
    require_once '../funcoes/projetos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            if (excluirAtividade($id)) {
                header('Location: atividades.php');
                exit();
            } else {
                $erro = "Erro ao excluir a atividade!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $atividade = buscarAtividadePorId($id);
            if ($atividade == null) {
                header('Location: atividades.php');
                exit();
            }
            $projeto = buscarProjetoPorId($atividade['projeto_id']);
        } else {
            header('Location: atividades.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Atividade</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir a atividade abaixo?</p>

    <ul>
        <li><strong>Nome: <?= $atividade['nome'] ?></strong></li>
        <li><strong>Descrição: <?= $atividade['descricao'] ?></strong></li>
        <li><strong>Projeto: <?= $projeto['nome'] ?></strong></li>
        <li><strong>Data de Início: <?= $atividade['data_inicio'] ?></strong></li>
        <li><strong>Data de Fim: <?= $atividade['data_fim'] ?></strong></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $atividade['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="atividades.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
