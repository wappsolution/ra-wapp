<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-plus-circle"></i> Inserir Novo Equipamento</h1>
    <a href="<?= site_url('equipamento/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php echo form_open('equipamento/inserir'); ?>
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Equipamento:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?= set_value('nome') ?>" required>
        <?= form_error('nome', '<div class="text-danger">' , '</div>') ?>
    </div>
    <div class="mb-3">
        <label for="localizacao" class="form-label">Localização:</label>
        <input type="text" class="form-control" id="localizacao" name="localizacao" value="<?= set_value('localizacao') ?>" required>
        <?= form_error('localizacao', '<div class="text-danger">' , '</div>') ?>
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar Equipamento</button>
<?php echo form_close(); ?>