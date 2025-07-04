<div class="d-flex justify-content-between align-items-center mb-3">
    <h1><i class="bi bi-eye"></i> Visualizar Vídeo</h1>
    <a href="<?= site_url('video/listar') ?>" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar para a Lista</a>
</div>

<?php if (empty($video)): ?>
    <div class="alert alert-warning" role="alert">
        Vídeo não encontrado.
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Vídeo</h5>
            <p class="card-text"><strong>ID:</strong> <?= $video['id'] ?></p>
            <p class="card-text"><strong>Título:</strong> <?= htmlspecialchars($video['titulo']) ?></p>

            <?php
            $youtube_embed_url = '';
            if (!empty($video['url'])) {
                // Função para extrair o ID do vídeo do YouTube
                function get_youtube_embed_url($url) {
                    $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=|embed\/|v\/|)([\w-]{11})(?:[&\?].*)?/';
                    if (preg_match($pattern, $url, $matches)) {
                        return 'https://www.youtube.com/embed/' . $matches[1];
                    }
                    return '';
                }
                $youtube_embed_url = get_youtube_embed_url($video['url']);
            }
            ?>

            <?php if (!empty($youtube_embed_url)): ?>
                <div class="mb-3" style="max-width: 25%; margin: auto;">
                    <p class="card-text"><strong>Vídeo:</strong></p>
                    <div class="ratio ratio-16x9">
                        <iframe src="<?= $youtube_embed_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            <?php elseif (!empty($video['url'])): ?>
                <p class="card-text"><strong>URL:</strong> <a href="<?= htmlspecialchars($video['url']) ?>" target="_blank"><?= htmlspecialchars($video['url']) ?></a></p>
            <?php elseif (!empty($video['caminho_local'])): ?>
                <p class="card-text"><strong>Caminho Local:</strong> <?= htmlspecialchars($video['caminho_local']) ?></p>
                <!-- AIDEV-TODO: Adicionar player de vídeo local se o caminho_local for um arquivo de vídeo -->
            <?php endif; ?>

            <a href="<?= site_url('video/editar/' . $video['id']) ?>" class="btn btn-warning"><i class="bi bi-pencil"></i> Editar</a>
        </div>
    </div>
<?php endif; ?>