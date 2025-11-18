<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<div class="page-header">
    <h2><?= $titulo ?></h2>
    <a href="<?= APP_URL ?>/metas/crear" class="btn btn-primary">Nueva Meta</a>
</div>

<!-- Estadísticas -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number"><?= $estadisticas['total'] ?? 0 ?></div>
        <div class="stat-label">Total de Metas</div>
    </div>
    <div class="stat-card">
        <div class="stat-number"><?= $estadisticas['promedio_avance'] ?? 0 ?>%</div>
        <div class="stat-label">Avance Promedio</div>
    </div>
    <?php if (!empty($estadisticas['por_estado'])): ?>
        <?php foreach ($estadisticas['por_estado'] as $estado): ?>
            <div class="stat-card">
                <div class="stat-number"><?= $estado['cantidad'] ?></div>
                <div class="stat-label"><?= ucfirst($estado['estado']) ?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Tabla de Metas -->
<?php if (empty($metas)): ?>
    <div class="empty-state">
        <p>No hay metas registradas</p>
        <a href="<?= APP_URL ?>/metas/crear" class="btn btn-primary">Crear primera meta</a>
    </div>
<?php else: ?>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Meta</th>
                    <th>Avance</th>
                    <th>Periodo</th>
                    <th>Estado</th>
                    <th>Prioridad</th>
                    <th>Fecha Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($metas as $meta): ?>
                    <?php
                    $porcentaje = $meta['valor_meta'] > 0
                        ? round(($meta['valor_actual'] / $meta['valor_meta']) * 100, 1)
                        : 0;
                    ?>
                    <tr>
                        <td>
                            <a href="<?= APP_URL ?>/metas/ver/<?= $meta['id'] ?>">
                                <?= htmlspecialchars($meta['titulo']) ?>
                            </a>
                        </td>
                        <td><?= htmlspecialchars($meta['categoria_nombre']) ?></td>
                        <td><?= number_format($meta['valor_meta'], 2) ?> <?= htmlspecialchars($meta['unidad_medida']) ?></td>
                        <td>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: <?= min($porcentaje, 100) ?>%"></div>
                            </div>
                            <span class="progress-text"><?= $porcentaje ?>%</span>
                        </td>
                        <td><?= ucfirst($meta['periodo']) ?></td>
                        <td>
                            <span class="badge badge-<?= $meta['estado'] ?>">
                                <?= ucfirst(str_replace('_', ' ', $meta['estado'])) ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-prioridad-<?= $meta['prioridad'] ?>">
                                <?= ucfirst($meta['prioridad']) ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y', strtotime($meta['fecha_fin'])) ?></td>
                        <td class="actions">
                            <a href="<?= APP_URL ?>/metas/ver/<?= $meta['id'] ?>" class="btn btn-sm btn-info" title="Ver">Ver</a>
                            <a href="<?= APP_URL ?>/metas/editar/<?= $meta['id'] ?>" class="btn btn-sm btn-warning" title="Editar">Editar</a>
                            <a href="<?= APP_URL ?>/metas/eliminar/<?= $meta['id'] ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('¿Está seguro de eliminar esta meta?')"
                               title="Eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
