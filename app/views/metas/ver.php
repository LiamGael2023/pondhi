<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<?php
$porcentaje = $meta['valor_meta'] > 0
    ? round(($meta['valor_actual'] / $meta['valor_meta']) * 100, 1)
    : 0;
?>

<div class="page-header">
    <h2><?= $titulo ?></h2>
    <div class="header-actions">
        <a href="<?= APP_URL ?>/metas/editar/<?= $meta['id'] ?>" class="btn btn-warning">Editar</a>
        <a href="<?= APP_URL ?>/metas" class="btn btn-secondary">Volver</a>
    </div>
</div>

<div class="detail-container">
    <div class="detail-header">
        <h3><?= htmlspecialchars($meta['titulo']) ?></h3>
        <div class="badges">
            <span class="badge badge-<?= $meta['estado'] ?>">
                <?= ucfirst(str_replace('_', ' ', $meta['estado'])) ?>
            </span>
            <span class="badge badge-prioridad-<?= $meta['prioridad'] ?>">
                <?= ucfirst($meta['prioridad']) ?>
            </span>
        </div>
    </div>

    <div class="progress-section">
        <h4>Progreso</h4>
        <div class="progress-bar large">
            <div class="progress-fill" style="width: <?= min($porcentaje, 100) ?>%"></div>
        </div>
        <div class="progress-info">
            <span><?= number_format($meta['valor_actual'], 2) ?> / <?= number_format($meta['valor_meta'], 2) ?> <?= htmlspecialchars($meta['unidad_medida']) ?></span>
            <span class="progress-percentage"><?= $porcentaje ?>%</span>
        </div>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <label>Categoría</label>
            <span><?= htmlspecialchars($meta['categoria_nombre']) ?></span>
        </div>

        <div class="detail-item">
            <label>Periodo</label>
            <span><?= ucfirst($meta['periodo']) ?></span>
        </div>

        <div class="detail-item">
            <label>Fecha de Inicio</label>
            <span><?= date('d/m/Y', strtotime($meta['fecha_inicio'])) ?></span>
        </div>

        <div class="detail-item">
            <label>Fecha de Fin</label>
            <span><?= date('d/m/Y', strtotime($meta['fecha_fin'])) ?></span>
        </div>

        <div class="detail-item">
            <label>Responsable</label>
            <span><?= htmlspecialchars($meta['responsable']) ?: 'No asignado' ?></span>
        </div>

        <div class="detail-item">
            <label>Creado</label>
            <span><?= date('d/m/Y H:i', strtotime($meta['created_at'])) ?></span>
        </div>

        <?php if (!empty($meta['descripcion'])): ?>
            <div class="detail-item full-width">
                <label>Descripción</label>
                <p><?= nl2br(htmlspecialchars($meta['descripcion'])) ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($meta['observaciones'])): ?>
            <div class="detail-item full-width">
                <label>Observaciones</label>
                <p><?= nl2br(htmlspecialchars($meta['observaciones'])) ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="detail-actions">
        <a href="<?= APP_URL ?>/metas/editar/<?= $meta['id'] ?>" class="btn btn-warning">Editar Meta</a>
        <a href="<?= APP_URL ?>/metas/eliminar/<?= $meta['id'] ?>"
           class="btn btn-danger"
           onclick="return confirm('¿Está seguro de eliminar esta meta?')">Eliminar Meta</a>
    </div>
</div>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
