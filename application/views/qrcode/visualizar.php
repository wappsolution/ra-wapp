<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-eye"></i> Visualizar QR Code</h1>
    <a href="<?= site_url('qrcode/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php if (empty($qrcode)): ?>
    <div class="alert alert-warning" role="alert">
        QR Code não encontrado.
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes do QR Code</h5>
            <p class="card-text"><strong>ID:</strong> <?= $qrcode['id'] ?></p>
            <p class="card-text"><strong>Código QR:</strong> <?= htmlspecialchars($qrcode['codigo_qr']) ?></p>
            <p class="card-text"><strong>Caminho Imagem:</strong> <?= htmlspecialchars($qrcode['caminho_imagem']) ?></p>

            <?php if (isset($equipamento_associado) && $equipamento_associado): ?>
                <p class="card-text"><strong>Equipamento Associado:</strong> <?= htmlspecialchars($equipamento_associado['nome']) ?> (ID: <?= $equipamento_associado['id'] ?>)</p>
            <?php else: ?>
                <p class="card-text"><strong>Equipamento Associado:</strong> Nenhum</p>
            <?php endif; ?>

            <?php if (isset($video_associado) && $video_associado): ?>
                <p class="card-text"><strong>Vídeo Associado:</strong> <?= htmlspecialchars($video_associado['titulo']) ?> (ID: <?= $video_associado['id'] ?>)</p>
            <?php else: ?>
                <p class="card-text"><strong>Vídeo Associado:</strong> Nenhum</p>
            <?php endif; ?>

            <?php if (!empty($qrcode['caminho_imagem'])): ?>
                <div class="mt-3">
                    <p><strong>Imagem do QR Code:</strong></p>
                    <img src="<?= base_url($qrcode['caminho_imagem']) ?>" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                </div>
            <?php endif; ?>

            <a href="<?= site_url('qrcode/excluir/' . $qrcode['id']) ?>" class="btn btn-danger mt-3" onclick="return confirm('Tem certeza que deseja excluir este QR Code?');"><i class="bi bi-trash"></i> Excluir</a>
        </div>
    </div>
<?php endif; ?>