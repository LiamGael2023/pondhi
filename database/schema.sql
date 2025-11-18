-- Base de datos para Plan de Operación, Mantenimiento y Desarrollo de Infraestructura Hidráulica

CREATE DATABASE IF NOT EXISTS pondhi_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE pondhi_db;

-- Tabla de categorías de metas
CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabla de metas proyectadas
CREATE TABLE IF NOT EXISTS metas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categoria_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    unidad_medida VARCHAR(50) NOT NULL,
    valor_meta DECIMAL(15,2) NOT NULL,
    valor_actual DECIMAL(15,2) DEFAULT 0,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    periodo ENUM('mensual', 'trimestral', 'semestral', 'anual') NOT NULL,
    estado ENUM('pendiente', 'en_progreso', 'completada', 'cancelada') DEFAULT 'pendiente',
    prioridad ENUM('baja', 'media', 'alta', 'critica') DEFAULT 'media',
    responsable VARCHAR(150),
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Tabla de seguimiento de avances
CREATE TABLE IF NOT EXISTS avances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    meta_id INT NOT NULL,
    valor_registrado DECIMAL(15,2) NOT NULL,
    fecha_registro DATE NOT NULL,
    comentario TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (meta_id) REFERENCES metas(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Insertar categorías predeterminadas
INSERT INTO categorias (nombre, descripcion) VALUES
('Operación', 'Metas relacionadas con el funcionamiento diario de la infraestructura hidráulica'),
('Mantenimiento', 'Metas de mantenimiento preventivo y correctivo'),
('Desarrollo', 'Metas de expansión, mejora y modernización de infraestructura'),
('Financiero', 'Metas de presupuesto, inversión y costos operativos'),
('Calidad', 'Metas de calidad del agua y cumplimiento de normativas');
