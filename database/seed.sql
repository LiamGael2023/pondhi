-- Datos de prueba para PONDHI
-- Plan de Operación, Mantenimiento y Desarrollo de Infraestructura Hidráulica

USE pondhi_db;

-- Metas de Operación (categoria_id = 1)
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(1, 'Distribución de agua potable', 'Volumen total de agua potable distribuida a la población', 'm³', 500000.00, 387500.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Carlos Mendoza', 'Meta prioritaria para cobertura urbana'),
(1, 'Horas de operación de plantas', 'Tiempo efectivo de funcionamiento de plantas de tratamiento', 'horas', 8760.00, 7200.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. María Torres', 'Incluye planta norte y sur'),
(1, 'Reducción de agua no contabilizada', 'Disminuir pérdidas en el sistema de distribución', '%', 25.00, 18.50, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Ing. Roberto Sánchez', 'Actualmente en 32%, meta reducir a 25%'),
(1, 'Presión promedio en red', 'Mantener presión adecuada en puntos de distribución', 'PSI', 45.00, 42.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Téc. Juan Pérez', 'Monitoreo en 50 puntos de control'),
(1, 'Continuidad del servicio', 'Horas promedio de servicio por día', 'horas/día', 24.00, 22.50, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Carlos Mendoza', 'Meta de servicio continuo 24/7');

-- Metas de Mantenimiento (categoria_id = 2)
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(2, 'Mantenimiento preventivo de bombas', 'Ejecutar plan de mantenimiento preventivo a equipos de bombeo', 'unidades', 48.00, 36.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Téc. Luis García', '12 bombas x 4 mantenimientos al año'),
(2, 'Reparación de fugas en red', 'Atender y reparar fugas detectadas en la red de distribución', 'reparaciones', 200.00, 165.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Cuadrilla de mantenimiento', 'Tiempo promedio de atención: 4 horas'),
(2, 'Limpieza de tanques de almacenamiento', 'Realizar limpieza y desinfección de tanques', 'tanques', 24.00, 18.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Téc. Ana Rodríguez', '8 tanques x 3 limpiezas al año'),
(2, 'Calibración de medidores', 'Calibrar medidores de caudal y presión', 'medidores', 120.00, 95.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Téc. Pedro Vargas', 'Incluye medidores domiciliarios e industriales'),
(2, 'Reemplazo de válvulas', 'Cambio de válvulas deterioradas en la red', 'válvulas', 50.00, 32.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Cuadrilla de mantenimiento', 'Priorizar válvulas críticas'),
(2, 'Inspección de tuberías', 'Inspección visual y con cámara de tuberías principales', 'km', 30.00, 22.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Roberto Sánchez', 'Identificar puntos de riesgo');

-- Metas de Desarrollo (categoria_id = 3)
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(3, 'Ampliación de red de distribución', 'Extender la red de agua potable a nuevas zonas', 'km', 15.00, 8.50, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Patricia Luna', 'Sector noreste de la ciudad'),
(3, 'Nuevas conexiones domiciliarias', 'Instalar conexiones para nuevos usuarios', 'conexiones', 500.00, 320.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Cuadrilla de instalaciones', 'Incluye medidor y accesorios'),
(3, 'Construcción de tanque elevado', 'Nuevo tanque de 500m³ para sector sur', 'unidad', 1.00, 0.60, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Ing. Fernando Díaz', 'Avance: cimentación y estructura'),
(3, 'Modernización SCADA', 'Implementar sistema de control y supervisión automatizado', '%', 100.00, 45.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Sistema Jorge Ramos', 'Fase 1: sensores y comunicación'),
(3, 'Perforación de pozo profundo', 'Nuevo pozo para incrementar captación', 'unidad', 1.00, 0.30, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Patricia Luna', 'Estudios geológicos completados'),
(3, 'Renovación de línea de conducción', 'Reemplazar tubería antigua de 12 pulgadas', 'km', 5.00, 2.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Ing. Fernando Díaz', 'Material: HDPE');

-- Metas Financieras (categoria_id = 4)
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(4, 'Recaudación por servicios', 'Ingresos por facturación de agua y alcantarillado', 'soles', 2500000.00, 1875000.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Lic. Carmen Vega', 'Meta de cobranza del 95%'),
(4, 'Reducción de morosidad', 'Disminuir cartera de clientes morosos', '%', 10.00, 12.50, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Lic. Carmen Vega', 'Actualmente en 18%'),
(4, 'Ejecución presupuestal de inversiones', 'Ejecutar presupuesto asignado para proyectos', '%', 100.00, 68.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Ing. Director General', 'S/. 1,200,000 asignados'),
(4, 'Costo operativo por m³', 'Optimizar costos de producción de agua', 'soles/m³', 1.20, 1.35, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Lic. Carmen Vega', 'Incluye energía, químicos y personal'),
(4, 'Nuevos medidores instalados', 'Micromedición para control de consumo', 'medidores', 300.00, 180.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Téc. Pedro Vargas', 'Inversión: S/. 150,000');

-- Metas de Calidad (categoria_id = 5)
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(5, 'Cumplimiento parámetros fisicoquímicos', 'Análisis de agua dentro de norma técnica', '%', 100.00, 98.50, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Ing. Química Rosa Flores', 'Según DS N° 031-2010-SA'),
(5, 'Cumplimiento parámetros microbiológicos', 'Ausencia de coliformes y otros patógenos', '%', 100.00, 99.80, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'critica', 'Ing. Química Rosa Flores', 'Muestreo en 100 puntos'),
(5, 'Muestras analizadas', 'Número de análisis de calidad realizados', 'muestras', 2400.00, 1850.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Lab. Control de Calidad', '200 muestras mensuales'),
(5, 'Cloro residual en red', 'Mantener nivel de cloro según norma', 'mg/L', 0.80, 0.75, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Téc. Operador de planta', 'Rango permitido: 0.5 - 1.0 mg/L'),
(5, 'Atención de reclamos por calidad', 'Resolver quejas de usuarios sobre calidad del agua', 'reclamos', 50.00, 35.00, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'media', 'Área de atención al cliente', 'Tiempo máximo de respuesta: 24 horas'),
(5, 'Turbidez promedio', 'Mantener turbidez dentro de límites', 'UNT', 1.00, 0.85, '2024-01-01', '2024-12-31', 'anual', 'en_progreso', 'alta', 'Lab. Control de Calidad', 'Límite máximo: 5 UNT');

-- Algunas metas completadas para variedad
UPDATE metas SET estado = 'completada', valor_actual = valor_meta WHERE titulo = 'Cumplimiento parámetros microbiológicos';
UPDATE metas SET estado = 'completada', valor_actual = valor_meta WHERE titulo = 'Limpieza de tanques de almacenamiento';

-- Una meta pendiente
INSERT INTO metas (categoria_id, titulo, descripcion, unidad_medida, valor_meta, valor_actual, fecha_inicio, fecha_fin, periodo, estado, prioridad, responsable, observaciones) VALUES
(3, 'Estudio de impacto ambiental', 'EIA para proyecto de nueva planta de tratamiento', 'documento', 1.00, 0.00, '2025-01-01', '2025-06-30', 'semestral', 'pendiente', 'alta', 'Consultoría ambiental', 'Requisito previo para licencia de construcción');
