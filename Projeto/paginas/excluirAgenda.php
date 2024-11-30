<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/agendas.php';
    require_once '../funcoes/voluntarios.php';
    require_once '../funcoes/atividades.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $id = intval($_POST['id']);
            if (excluirAgenda($id)) {
                header('Location: agendas.php');
                exit();
            } else {
                $erro = "Erro ao excluir a agenda!";
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    } else {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $agenda = retornarAgendaPorId($id);
            if ($agenda == null) {
                header('Location: agendas.php');
                exit();
            }
            $voluntario = buscarVoluntarioPorId($agenda['voluntario_id']);
            $atividade = buscarAtividadePorId($agenda['atividade_id']);
        } else {
            header('Location: agendas.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Agenda</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <p>Tem certeza de que deseja excluir a agenda abaixo?</p>

    <ul>
        <li><strong>Voluntário: <?= $voluntario['nome'] ?></strong></li>
        <li><strong>Atividade: <?= $atividade['nome'] ?></strong></li>
        <li><strong>Data: <?= $agenda['data'] ?></strong></li>
        <li><strong>Horário: <?= $agenda['horario'] ?></strong></li>
    </ul>

    <form method="post">
        <input type="hidden" name="id" value="<?= $agenda['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="agendas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
