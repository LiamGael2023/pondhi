<?php
/**
 * Punto de entrada de la aplicación
 * PONDHI - Plan de Operación, Mantenimiento y Desarrollo de Infraestructura Hidráulica
 */

session_start();

// Cargar configuración
require_once dirname(__DIR__) . '/app/config/config.php';

// Cargar clase de base de datos
require_once APP_PATH . '/config/Database.php';

// Cargar controlador base
require_once APP_PATH . '/controllers/Controller.php';

// Cargar aplicación principal
require_once APP_PATH . '/controllers/App.php';

// Iniciar aplicación
$app = new App();
