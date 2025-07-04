<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-pencil"></i> Editar Vídeo</h1>
    <a href="<?= site_url('video/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php if (empty($video)): ?>
    <div class="alert alert-warning" role="alert">
        Vídeo não encontrado.
    </div>
<?php else: ?>
    <?php echo form_open('video/editar/' . $video['id']); ?>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título do Vídeo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= set_value('titulo', $video['titulo']) ?>" required>
            <?= form_error('titulo', '<div class="text-danger">' , '</div>') ?>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL do Vídeo (YouTube, Vimeo, etc.):</label>
            <input type="url" class="form-control" id="url" name="url" value="<?= set_value('url', $video['url']) ?>">
            <?= form_error('url', '<div class="text-danger">' , '</div>') ?>
        </div>
        <!-- AIDEV-TODO: Adicionar campo para upload de arquivo local, se necessário -->
        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar Alterações</button>
    <?php echo form_close(); ?>
<?php endif; ?>