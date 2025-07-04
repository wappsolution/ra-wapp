<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-qr-code"></i> Listagem de QR Codes</h1>
    <a href="<?= site_url('qrcode/gerar') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Gerar Novo QR Code</a>
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
            <th>Código QR</th>
            <th>Equipamento</th>
            <th>Vídeo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($qrcodes)): ?>
            <tr>
                <td colspan="5" class="text-center">Nenhum QR Code cadastrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($qrcodes as $qrcode): ?>
                <tr>
                    <td><?= $qrcode['id'] ?></td>
                    <td><?= htmlspecialchars($qrcode['codigo_qr']) ?></td>
                    <td><?= htmlspecialchars($qrcode['equipamento_id'] ? 'Equipamento ' . $qrcode['equipamento_id'] : 'N/A') ?></td>
                    <td><?= htmlspecialchars($qrcode['video_id'] ? 'Vídeo ' . $qrcode['video_id'] : 'N/A') ?></td>
                    <td>
                        <a href="<?= site_url('qrcode/visualizar/' . $qrcode['id']) ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Visualizar</a>
                        <a href="<?= site_url('qrcode/excluir/' . $qrcode['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este QR Code?');"><i class="bi bi-trash"></i> Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>