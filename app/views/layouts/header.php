<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? APP_NAME ?> - <?= APP_NAME ?></title>
    <link rel="stylesheet" href="<?= APP_URL ?>/css/styles.css">
</head>
<body>
    <header class="main-header">
        <div class="container">
            <div class="header-content">
                <h1 class="logo">
                    <a href="<?= APP_URL ?>">PONDHI</a>
                </h1>
                <p class="tagline">Plan de Operación, Mantenimiento y Desarrollo de Infraestructura Hidráulica</p>
            </div>
            <nav class="main-nav">
                <a href="<?= APP_URL ?>/metas" class="nav-link">Metas</a>
                <a href="<?= APP_URL ?>/metas/crear" class="nav-link btn-primary">Nueva Meta</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <?php if (isset($_SESSION['mensaje'])): ?>
                <div class="alert alert-<?= $_SESSION['tipo_mensaje'] ?? 'info' ?>">
                    <?= $_SESSION['mensaje'] ?>
                </div>
                <?php unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['errores']) && !empty($_SESSION['errores'])): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($_SESSION['errores'] as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errores']); ?>
            <?php endif; ?>
