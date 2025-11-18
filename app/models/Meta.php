<?php
/**
 * Modelo Meta
 * Gestiona las operaciones CRUD para las metas proyectadas
 */

class Meta {
    private $db;
    private $table = 'metas';

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Obtener todas las metas con su categoría
     */
    public function getAll() {
        $sql = "SELECT m.*, c.nombre as categoria_nombre
                FROM {$this->table} m
                INNER JOIN categorias c ON m.categoria_id = c.id
                ORDER BY m.fecha_fin ASC, m.prioridad DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener una meta por ID
     */
    public function getById($id) {
        $sql = "SELECT m.*, c.nombre as categoria_nombre
                FROM {$this->table} m
                INNER JOIN categorias c ON m.categoria_id = c.id
                WHERE m.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Crear una nueva meta
     */
    public function create($data) {
        $sql = "INSERT INTO {$this->table}
                (categoria_id, titulo, descripcion, unidad_medida, valor_meta,
                 fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones)
                VALUES
                (:categoria_id, :titulo, :descripcion, :unidad_medida, :valor_meta,
                 :fecha_inicio, :fecha_fin, :periodo, :estado, :prioridad, :responsable, :observaciones)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':categoria_id', $data['categoria_id'], PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $data['titulo']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':unidad_medida', $data['unidad_medida']);
        $stmt->bindParam(':valor_meta', $data['valor_meta']);
        $stmt->bindParam(':fecha_inicio', $data['fecha_inicio']);
        $stmt->bindParam(':fecha_fin', $data['fecha_fin']);
        $stmt->bindParam(':periodo', $data['periodo']);
        $stmt->bindParam(':estado', $data['estado']);
        $stmt->bindParam(':prioridad', $data['prioridad']);
        $stmt->bindParam(':responsable', $data['responsable']);
        $stmt->bindParam(':observaciones', $data['observaciones']);

        return $stmt->execute();
    }

    /**
     * Actualizar una meta
     */
    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET
                categoria_id = :categoria_id,
                titulo = :titulo,
                descripcion = :descripcion,
                unidad_medida = :unidad_medida,
                valor_meta = :valor_meta,
                valor_actual = :valor_actual,
                fecha_inicio = :fecha_inicio,
                fecha_fin = :fecha_fin,
                periodo = :periodo,
                estado = :estado,
                prioridad = :prioridad,
                responsable = :responsable,
                observaciones = :observaciones
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':categoria_id', $data['categoria_id'], PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $data['titulo']);
        $stmt->bindParam(':descripcion', $data['descripcion']);
        $stmt->bindParam(':unidad_medida', $data['unidad_medida']);
        $stmt->bindParam(':valor_meta', $data['valor_meta']);
        $stmt->bindParam(':valor_actual', $data['valor_actual']);
        $stmt->bindParam(':fecha_inicio', $data['fecha_inicio']);
        $stmt->bindParam(':fecha_fin', $data['fecha_fin']);
        $stmt->bindParam(':periodo', $data['periodo']);
        $stmt->bindParam(':estado', $data['estado']);
        $stmt->bindParam(':prioridad', $data['prioridad']);
        $stmt->bindParam(':responsable', $data['responsable']);
        $stmt->bindParam(':observaciones', $data['observaciones']);

        return $stmt->execute();
    }

    /**
     * Eliminar una meta
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Obtener metas por categoría
     */
    public function getByCategoria($categoriaId) {
        $sql = "SELECT m.*, c.nombre as categoria_nombre
                FROM {$this->table} m
                INNER JOIN categorias c ON m.categoria_id = c.id
                WHERE m.categoria_id = :categoria_id
                ORDER BY m.fecha_fin ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':categoria_id', $categoriaId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener metas por estado
     */
    public function getByEstado($estado) {
        $sql = "SELECT m.*, c.nombre as categoria_nombre
                FROM {$this->table} m
                INNER JOIN categorias c ON m.categoria_id = c.id
                WHERE m.estado = :estado
                ORDER BY m.fecha_fin ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener estadísticas generales
     */
    public function getEstadisticas() {
        $stats = [];

        // Total de metas
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stats['total'] = $stmt->fetch()['total'];

        // Metas por estado
        $sql = "SELECT estado, COUNT(*) as cantidad FROM {$this->table} GROUP BY estado";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stats['por_estado'] = $stmt->fetchAll();

        // Promedio de avance
        $sql = "SELECT AVG((valor_actual / valor_meta) * 100) as promedio_avance
                FROM {$this->table} WHERE valor_meta > 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stats['promedio_avance'] = round($stmt->fetch()['promedio_avance'] ?? 0, 2);

        return $stats;
    }
}
