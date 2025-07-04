<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-camera-video"></i> Listagem de Vídeos</h1>
    <a href="<?= site_url('video/inserir') ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Novo Vídeo</a>
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
            <th>Título</th>
            <th>URL / Caminho Local</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($videos)): ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum vídeo cadastrado.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($videos as $video): ?>
                <tr>
                    <td><?= $video['id'] ?></td>
                    <td><?= htmlspecialchars($video['titulo']) ?></td>
                    <td><?= htmlspecialchars($video['url'] ? $video['url'] : $video['caminho_local']) ?></td>
                    <td>
                        <a href="<?= site_url('video/visualizar/' . $video['id']) ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Visualizar</a>
                        <a href="<?= site_url('video/editar/' . $video['id']) ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Editar</a>
                        <a href="<?= site_url('video/excluir/' . $video['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este vídeo?');"><i class="bi bi-trash"></i> Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>