<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/projetos.php';

    $id = intval($_GET['id']);
    $projeto = buscarProjetoPorId($id);

    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $data_inicio = $_POST["data_inicio"];
            $data_fim = $_POST["data_fim"];

            if (empty($nome) || empty($descricao) || empty($data_inicio) || empty($data_fim)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (atualizarProjeto($id, $nome, $descricao, $data_inicio, $data_fim)) {
                    header('Location: projetos.php');
                    exit();
                } else {
                    $erro = "Erro ao atualizar o projeto!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Projeto</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $projeto['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required><?= $projeto['descricao'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="<?= $projeto['data_inicio'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="<?= $projeto['data_fim'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
