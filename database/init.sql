CREATE TABLE IF NOT EXISTS roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) NOT NULL UNIQUE,
    descripcion VARCHAR(255)
);

-- Insertar roles por defecto
INSERT INTO roles (id_rol, nombre_rol, descripcion) VALUES
(1, 'Administrador', 'Usuario con todos los permisos'),
(2, 'Usuario', 'Usuario estándar'),
(3, 'Moderador', 'Usuario con permisos de moderación')
ON DUPLICATE KEY UPDATE nombre_rol=nombre_rol;

-- ============================================
-- TABLA DE USUARIOS
-- ============================================
CREATE TABLE IF NOT EXISTS usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL DEFAULT 2,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_rol) REFERENCES roles(id_rol)
);

-- Crear un usuario administrador de prueba
-- Email: admin@test.com
-- Password: admin123
INSERT INTO usuarios (nombre, email, password, id_rol) VALUES
('Administrador', 'admin@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1)
ON DUPLICATE KEY UPDATE nombre=nombre;

-- Crear un usuario normal de prueba
-- Email: user@test.com
-- Password: user123
INSERT INTO usuarios (nombre, email, password, id_rol) VALUES
('Usuario Test', 'user@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2)
ON DUPLICATE KEY UPDATE nombre=nombre;

-- ============================================
-- TABLA DE PRODUCTOS
-- ============================================
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar algunos productos de ejemplo
INSERT INTO productos (nombre, descripcion, precio) VALUES
('Laptop HP Pavilion', 'Laptop con procesador Intel Core i5, 8GB RAM, 256GB SSD', 699.99),
('Mouse Logitech MX Master', 'Mouse inalámbrico ergonómico de alta precisión', 99.99),
('Teclado Mecánico Corsair', 'Teclado mecánico RGB con switches Cherry MX', 149.99),
('Monitor Dell 27"', 'Monitor IPS Full HD de 27 pulgadas', 299.99),
('Webcam Logitech C920', 'Webcam Full HD 1080p con micrófono estéreo', 79.99)
ON DUPLICATE KEY UPDATE nombre=nombre;

