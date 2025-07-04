<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-eye"></i> Visualizar Equipamento</h1>
    <a href="<?= site_url('equipamento/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php if (empty($equipamento)): ?>
    <div class="alert alert-warning" role="alert">
        Equipamento não encontrado.
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Equipamento</h5>
            <p class="card-text"><strong>ID:</strong> <?= $equipamento['id'] ?></p>
            <p class="card-text"><strong>Nome:</strong> <?= htmlspecialchars($equipamento['nome']) ?></p>
            <p class="card-text"><strong>Localização:</strong> <?= htmlspecialchars($equipamento['localizacao']) ?></p>
            <a href="<?= site_url('equipamento/editar/' . $equipamento['id']) ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        </div>
    </div>
<?php endif; ?>