<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/atividades.php';
    require_once '../funcoes/projetos.php';

    $projetos = listarProjetos();

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $projeto_id = $_POST["projeto_id"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $data_inicio = $_POST["data_inicio"];
            $data_fim = $_POST["data_fim"];

            if (empty($projeto_id) || empty($nome) || empty($descricao) || empty($data_inicio) || empty($data_fim)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (criarAtividade($projeto_id, $nome, $descricao, $data_inicio, $data_fim)) {
                    header('Location: atividades.php');
                    exit();
                } else {
                    $erro = "Erro ao criar a atividade!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Atividade</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="projeto_id" class="form-label">Projeto</label>
            <select name="projeto_id" id="projeto_id" class="form-select" required>
                <?php foreach($projetos as $projeto): ?>
                    <option value=<?= $projeto["id"]; ?>><?= $projeto["nome"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Atividade</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
