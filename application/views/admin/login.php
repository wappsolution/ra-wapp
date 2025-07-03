<!DOCTYPE html>
<html>
<head>
    <title>Login Administrativo</title>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-image: url('<?= base_url('assets/img/bg.png') ?>') !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center center !important;
            background-attachment: fixed !important;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px; /* Limita a largura para melhor visualização */
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .submitted-data {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 4px;
            text-align: left;
        }
        .submitted-data h2 {
            color: #333;
            margin-top: 0;
            font-size: 18px;
        }
        .submitted-data p {
            margin: 5px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="mb-4" style="font-size: 1.8em;">🔗 AR Conector Login</h1>
        <?php echo form_open('admin/login'); ?>
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" class="form-control" value="<?= set_value('username', $username) ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" class="form-control" value="<?= set_value('password', $password) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        <?php echo form_close(); ?>

        <div class="mt-3 text-muted small">
            <p>Dados de Teste Rápido:</p>
            <p>Usuário: <strong>admin</strong></p>
            <p>Senha: <strong>password</strong></p>
        </div>
        <div class="text-end">
            <span id="fillTest" title="Preencher Teste" style="cursor: pointer; font-size: 1.5em; display: inline-block;">✨</span>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?= $error_message ?>
            </div>
        <?php endif; ?>

        <?php if ($submitted_data): ?>
            <div class="submitted-data">
                <h2>Dados Submetidos (Simulação):</h2>
                <p><strong>Usuário:</strong> <?= htmlspecialchars($submitted_data['username']) ?></p>
                <p><strong>Senha:</strong> <?= htmlspecialchars($submitted_data['password']) ?></p>
                <p>Estes dados são apenas para demonstração e não são validados.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="<?= base_url('vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script>
        document.getElementById('fillTest').addEventListener('click', function() {
            document.getElementById('username').value = 'admin';
            document.getElementById('password').value = 'password';
        });
    </script>
</body>
</html>