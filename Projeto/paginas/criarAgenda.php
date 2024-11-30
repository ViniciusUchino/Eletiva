<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/voluntarios.php';
    require_once '../funcoes/atividades.php';

    $voluntarios = listarVoluntarios();
    $atividades = listarAtividades();

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $voluntario_id = $_POST["voluntario_id"];
            $atividade_id = $_POST["atividade_id"];
            $data = $_POST["data"];
            $horario = $_POST["horario"];

            if (empty($voluntario_id) || empty($atividade_id) || empty($data) || empty($horario)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarAgenda($voluntario_id, $atividade_id, $data, $horario)) {
                    header('Location: agendas.php');
                    exit();
                } else {
                    $erro = "Erro ao criar a agenda!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar nova Agenda</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="voluntario_id" class="form-label">Voluntários</label>
            <select name="voluntario_id" id="voluntario_id" class="form-select" required>
                <?php foreach($voluntarios as $voluntario): ?>
                    <option value=<?= $voluntario["id"]; ?>><?= $voluntario["nome"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="atividade_id" class="form-label">Atividades</label>
            <select name="atividade_id" id="atividade_id" class="form-select" required>
                <?php foreach($atividades as $atividade): ?>
                    <option value=<?= $atividade["id"]; ?>><?= $atividade["nome"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horário</label>
            <input type="time" name="horario" id="horario" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Agenda</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
