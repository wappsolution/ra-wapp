<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($title) ? $title : 'AR Conector'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Bootstrap Icons CSS (AIDEV-TODO: Adicionar via CDN ou localmente) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .navbar { padding: 10px 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { margin: 0; font-size: 24px; color: #333; }
        .navbar ul { list-style-type: none; padding: 0; margin: 0; display: flex; }
        .navbar ul li { margin-right: 15px; }
        .navbar ul li a { text-decoration: none; display: block; padding: 5px 10px; border-radius: 4px; }
        .navbar ul li a:hover { background-color: #e9ecef; }
        .navbar ul li a.active {
            background-color: #007bff;
            color: white;
            border: 2px solid white;
        }
        .dashboard-body { padding: 20px; }
        .indicators { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
        .indicator-card { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align: center; }
        .indicator-card h3 { margin-top: 0; color: #007bff; }
        .indicator-card p { font-size: 1.5em; font-weight: bold; color: #333; }
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary me-2 <?= ($this->router->fetch_class() == 'admin' && $this->router->fetch_method() == 'dashboard') ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>"><i class="bi bi-house"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary me-2 <?= ($this->router->fetch_class() == 'equipamento') ? 'active' : '' ?>" href="<?= site_url('equipamento/listar') ?>"><i class="bi bi-gear"></i> Equipamentos</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary me-2 <?= ($this->router->fetch_class() == 'video') ? 'active' : '' ?>" href="<?= site_url('video/listar') ?>"><i class="bi bi-camera-video"></i> Vídeos</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary me-2 <?= ($this->router->fetch_class() == 'qrcode') ? 'active' : '' ?>" href="<?= site_url('qrcode/listar') ?>"><i class="bi bi-qr-code"></i> QR Codes</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary me-2 <?= ($this->router->fetch_class() == 'log') ? 'active' : '' ?>" href="<?= site_url('log/listar') ?>"><i class="bi bi-journal-text"></i> Logs</a></li>
                </ul>
                <a href="<?= site_url('admin/logout') ?>" class="btn btn-dark" onclick="return confirm('Tem certeza que deseja sair?');">⏻ Logout</a>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <?php echo isset($content) ? $content : ''; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>