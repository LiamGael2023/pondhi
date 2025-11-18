<?php
/**
 * Configuración general de la aplicación
 */

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'pondhi_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Configuración de la aplicación
define('APP_NAME', 'PONDHI - Plan de Infraestructura Hidráulica');
define('APP_URL', 'http://localhost/pondhi/public');

// Configuración de rutas
define('ROOT_PATH', dirname(dirname(__DIR__)));
define('APP_PATH', ROOT_PATH . '/app');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Zona horaria
date_default_timezone_set('America/Lima');

// Mostrar errores en desarrollo (cambiar a false en producción)
define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}
