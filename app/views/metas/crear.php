<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<div class="page-header">
    <h2><?= $titulo ?></h2>
    <a href="<?= APP_URL ?>/metas" class="btn btn-secondary">Volver</a>
</div>

<div class="form-container">
    <form action="<?= APP_URL ?>/metas/guardar" method="POST" class="form">
        <div class="form-grid">
            <div class="form-group">
                <label for="titulo">Título *</label>
                <input type="text" id="titulo" name="titulo" required
                       value="<?= htmlspecialchars($_SESSION['old']['titulo'] ?? '') ?>"
                       placeholder="Ej: Aumentar cobertura de agua potable">
            </div>

            <div class="form-group">
                <label for="categoria_id">Categoría *</label>
                <select id="categoria_id" name="categoria_id" required>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>"
                            <?= (($_SESSION['old']['categoria_id'] ?? '') == $categoria['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($categoria['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group full-width">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="3"
                          placeholder="Descripción detallada de la meta"><?= htmlspecialchars($_SESSION['old']['descripcion'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
                <label for="valor_meta">Valor de la Meta *</label>
                <input type="number" id="valor_meta" name="valor_meta" step="0.01" required
                       value="<?= htmlspecialchars($_SESSION['old']['valor_meta'] ?? '') ?>"
                       placeholder="Ej: 1000">
            </div>

            <div class="form-group">
                <label for="unidad_medida">Unidad de Medida *</label>
                <input type="text" id="unidad_medida" name="unidad_medida" required
                       value="<?= htmlspecialchars($_SESSION['old']['unidad_medida'] ?? '') ?>"
                       placeholder="Ej: m³, conexiones, km">
            </div>

            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio *</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required
                       value="<?= htmlspecialchars($_SESSION['old']['fecha_inicio'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin *</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required
                       value="<?= htmlspecialchars($_SESSION['old']['fecha_fin'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="periodo">Periodo *</label>
                <select id="periodo" name="periodo" required>
                    <option value="">Seleccione un periodo</option>
                    <option value="mensual" <?= (($_SESSION['old']['periodo'] ?? '') == 'mensual') ? 'selected' : '' ?>>Mensual</option>
                    <option value="trimestral" <?= (($_SESSION['old']['periodo'] ?? '') == 'trimestral') ? 'selected' : '' ?>>Trimestral</option>
                    <option value="semestral" <?= (($_SESSION['old']['periodo'] ?? '') == 'semestral') ? 'selected' : '' ?>>Semestral</option>
                    <option value="anual" <?= (($_SESSION['old']['periodo'] ?? '') == 'anual') ? 'selected' : '' ?>>Anual</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prioridad">Prioridad</label>
                <select id="prioridad" name="prioridad">
                    <option value="baja" <?= (($_SESSION['old']['prioridad'] ?? '') == 'baja') ? 'selected' : '' ?>>Baja</option>
                    <option value="media" <?= (($_SESSION['old']['prioridad'] ?? 'media') == 'media') ? 'selected' : '' ?>>Media</option>
                    <option value="alta" <?= (($_SESSION['old']['prioridad'] ?? '') == 'alta') ? 'selected' : '' ?>>Alta</option>
                    <option value="critica" <?= (($_SESSION['old']['prioridad'] ?? '') == 'critica') ? 'selected' : '' ?>>Crítica</option>
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado">
                    <option value="pendiente" <?= (($_SESSION['old']['estado'] ?? 'pendiente') == 'pendiente') ? 'selected' : '' ?>>Pendiente</option>
                    <option value="en_progreso" <?= (($_SESSION['old']['estado'] ?? '') == 'en_progreso') ? 'selected' : '' ?>>En Progreso</option>
                    <option value="completada" <?= (($_SESSION['old']['estado'] ?? '') == 'completada') ? 'selected' : '' ?>>Completada</option>
                    <option value="cancelada" <?= (($_SESSION['old']['estado'] ?? '') == 'cancelada') ? 'selected' : '' ?>>Cancelada</option>
                </select>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" name="responsable"
                       value="<?= htmlspecialchars($_SESSION['old']['responsable'] ?? '') ?>"
                       placeholder="Nombre del responsable">
            </div>

            <div class="form-group full-width">
                <label for="observaciones">Observaciones</label>
                <textarea id="observaciones" name="observaciones" rows="3"
                          placeholder="Observaciones adicionales"><?= htmlspecialchars($_SESSION['old']['observaciones'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Guardar Meta</button>
            <a href="<?= APP_URL ?>/metas" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

<?php unset($_SESSION['old']); ?>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
