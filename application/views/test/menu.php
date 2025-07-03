<html>
<head>
    <title>Menu de Testes</title>
    <style>
        body { font-family: sans-serif; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 5px 0; }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #007bff;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Menu de Testes</h1>
    <div>
        <?php foreach ($testes as $teste): ?>
            <a href="<?= site_url('test/' . $teste['metodo']) ?>">
                <?= $teste['label'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>