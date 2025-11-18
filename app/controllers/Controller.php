<?php
/**
 * Controlador base
 * Todos los controladores heredan de esta clase
 */

class Controller {

    /**
     * Cargar un modelo
     */
    protected function model($model) {
        require_once APP_PATH . '/models/' . $model . '.php';
        return new $model();
    }

    /**
     * Cargar una vista
     */
    protected function view($view, $data = []) {
        // Extraer datos para usarlos en la vista
        extract($data);

        $viewFile = APP_PATH . '/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("Vista no encontrada: " . $view);
        }
    }

    /**
     * Redireccionar a otra URL
     */
    protected function redirect($url) {
        header('Location: ' . APP_URL . '/' . $url);
        exit();
    }

    /**
     * Verificar si la petición es POST
     */
    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Obtener datos POST sanitizados
     */
    protected function getPost($key = null) {
        if ($key === null) {
            return array_map('trim', $_POST);
        }
        return isset($_POST[$key]) ? trim($_POST[$key]) : null;
    }
}
