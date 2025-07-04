<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-gear"></i> Listagem de Equipamentos</h1>
    <a href="<?= site_url('equipamento/inserir') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Novo Equipamento</a>
</div>

<?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success_message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error_message') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Localização</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($equipamentos)): ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum equipamento cadastrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($equipamentos as $equipamento): ?>
                <tr>
                    <td><?= $equipamento['id'] ?></td>
                    <td><?= htmlspecialchars($equipamento['nome']) ?></td>
                    <td><?= htmlspecialchars($equipamento['localizacao']) ?></td>
                    <td>
                        <a href="<?= site_url('equipamento/visualizar/' . $equipamento['id']) ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Visualizar</a>
                        <a href="<?= site_url('equipamento/editar/' . $equipamento['id']) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= site_url('equipamento/excluir/' . $equipamento['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este equipamento?');"><i class="bi bi-trash"></i> Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>