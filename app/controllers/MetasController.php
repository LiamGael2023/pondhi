<?php
/**
 * Controlador de Metas
 * Maneja todas las operaciones relacionadas con las metas proyectadas
 */

class MetasController extends Controller {

    private $metaModel;
    private $categoriaModel;

    public function __construct() {
        $this->metaModel = $this->model('Meta');
        $this->categoriaModel = $this->model('Categoria');
    }

    /**
     * Listar todas las metas (página principal)
     */
    public function index() {
        $metas = $this->metaModel->getAll();
        $estadisticas = $this->metaModel->getEstadisticas();

        $this->view('metas/index', [
            'titulo' => 'Metas Proyectadas',
            'metas' => $metas,
            'estadisticas' => $estadisticas
        ]);
    }

    /**
     * Mostrar formulario para crear nueva meta
     */
    public function crear() {
        $categorias = $this->categoriaModel->getAll();

        $this->view('metas/crear', [
            'titulo' => 'Nueva Meta',
            'categorias' => $categorias
        ]);
    }

    /**
     * Guardar nueva meta
     */
    public function guardar() {
        if (!$this->isPost()) {
            $this->redirect('metas/crear');
            return;
        }

        $data = $this->getPost();

        // Validación básica
        $errores = $this->validar($data);

        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            $_SESSION['old'] = $data;
            $this->redirect('metas/crear');
            return;
        }

        // Establecer valores por defecto
        $data['estado'] = $data['estado'] ?? 'pendiente';
        $data['prioridad'] = $data['prioridad'] ?? 'media';
        $data['descripcion'] = $data['descripcion'] ?? '';
        $data['observaciones'] = $data['observaciones'] ?? '';
        $data['responsable'] = $data['responsable'] ?? '';

        if ($this->metaModel->create($data)) {
            $_SESSION['mensaje'] = 'Meta creada exitosamente';
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al crear la meta';
            $_SESSION['tipo_mensaje'] = 'danger';
        }

        $this->redirect('metas');
    }

    /**
     * Mostrar formulario para editar meta
     */
    public function editar($id = null) {
        if ($id === null) {
            $this->redirect('metas');
            return;
        }

        $meta = $this->metaModel->getById($id);

        if (!$meta) {
            $_SESSION['mensaje'] = 'Meta no encontrada';
            $_SESSION['tipo_mensaje'] = 'danger';
            $this->redirect('metas');
            return;
        }

        $categorias = $this->categoriaModel->getAll();

        $this->view('metas/editar', [
            'titulo' => 'Editar Meta',
            'meta' => $meta,
            'categorias' => $categorias
        ]);
    }

    /**
     * Actualizar meta existente
     */
    public function actualizar($id = null) {
        if (!$this->isPost() || $id === null) {
            $this->redirect('metas');
            return;
        }

        $data = $this->getPost();

        // Validación básica
        $errores = $this->validar($data);

        if (!empty($errores)) {
            $_SESSION['errores'] = $errores;
            $_SESSION['old'] = $data;
            $this->redirect('metas/editar/' . $id);
            return;
        }

        // Establecer valores por defecto
        $data['descripcion'] = $data['descripcion'] ?? '';
        $data['observaciones'] = $data['observaciones'] ?? '';
        $data['responsable'] = $data['responsable'] ?? '';
        $data['valor_actual'] = $data['valor_actual'] ?? 0;

        if ($this->metaModel->update($id, $data)) {
            $_SESSION['mensaje'] = 'Meta actualizada exitosamente';
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al actualizar la meta';
            $_SESSION['tipo_mensaje'] = 'danger';
        }

        $this->redirect('metas');
    }

    /**
     * Eliminar meta
     */
    public function eliminar($id = null) {
        if ($id === null) {
            $this->redirect('metas');
            return;
        }

        if ($this->metaModel->delete($id)) {
            $_SESSION['mensaje'] = 'Meta eliminada exitosamente';
            $_SESSION['tipo_mensaje'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al eliminar la meta';
            $_SESSION['tipo_mensaje'] = 'danger';
        }

        $this->redirect('metas');
    }

    /**
     * Ver detalle de una meta
     */
    public function ver($id = null) {
        if ($id === null) {
            $this->redirect('metas');
            return;
        }

        $meta = $this->metaModel->getById($id);

        if (!$meta) {
            $_SESSION['mensaje'] = 'Meta no encontrada';
            $_SESSION['tipo_mensaje'] = 'danger';
            $this->redirect('metas');
            return;
        }

        $this->view('metas/ver', [
            'titulo' => 'Detalle de Meta',
            'meta' => $meta
        ]);
    }

    /**
     * Validar datos del formulario
     */
    private function validar($data) {
        $errores = [];

        if (empty($data['titulo'])) {
            $errores[] = 'El título es obligatorio';
        }

        if (empty($data['categoria_id'])) {
            $errores[] = 'La categoría es obligatoria';
        }

        if (empty($data['unidad_medida'])) {
            $errores[] = 'La unidad de medida es obligatoria';
        }

        if (empty($data['valor_meta']) || !is_numeric($data['valor_meta'])) {
            $errores[] = 'El valor de la meta debe ser un número válido';
        }

        if (empty($data['fecha_inicio'])) {
            $errores[] = 'La fecha de inicio es obligatoria';
        }

        if (empty($data['fecha_fin'])) {
            $errores[] = 'La fecha de fin es obligatoria';
        }

        if (!empty($data['fecha_inicio']) && !empty($data['fecha_fin'])) {
            if ($data['fecha_inicio'] > $data['fecha_fin']) {
                $errores[] = 'La fecha de inicio no puede ser mayor a la fecha de fin';
            }
        }

        if (empty($data['periodo'])) {
            $errores[] = 'El periodo es obligatorio';
        }

        return $errores;
    }
}
