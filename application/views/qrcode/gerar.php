<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-plus-circle"></i> Gerar Novo QR Code</h1>
    <a href="<?= site_url('qrcode/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php echo form_open('qrcode/gerar'); ?>
    <div class="mb-3">
        <label for="codigo_qr" class="form-label">Código QR (Texto ou URL):</label>
        <input type="text" class="form-control" id="codigo_qr" name="codigo_qr" value="<?= set_value('codigo_qr') ?>" required>
        <?= form_error('codigo_qr', '<div class="text-danger">' , '</div>') ?>
    </div>
    <div class="mb-3">
        <label for="equipamento_id" class="form-label">Associar a Equipamento:</label>
        <select class="form-select" id="equipamento_id" name="equipamento_id">
            <option value="">Nenhum</option>
            <?php foreach ($equipamentos as $equipamento): ?>
                <option value="<?= $equipamento['id'] ?>" <?= set_select('equipamento_id', $equipamento['id']) ?>><?= htmlspecialchars($equipamento['nome']) ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('equipamento_id', '<div class="text-danger">' , '</div>') ?>
    </div>
    <div class="mb-3">
        <label for="video_id" class="form-label">Associar a Vídeo:</label>
        <select class="form-select" id="video_id" name="video_id">
            <option value="">Nenhum</option>
            <?php foreach ($videos as $video): ?>
                <option value="<?= $video['id'] ?>" <?= set_select('video_id', $video['id']) ?>><?= htmlspecialchars($video['titulo']) ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('video_id', '<div class="text-danger">' , '</div>') ?>
    </div>
    <button type="submit" class="btn btn-success"><i class="bi bi-qr-code"></i> Gerar QR Code</button>
<?php echo form_close(); ?>