create database citas;

use citas;

CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `modificado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `username`, `password`, `modificado`) VALUES
(0, 'Administrador', 'admin', '$2y$10$Ldat2ZinHu4erXOE7yw10OPLgRqc08w6OngZdMZfba.7YXkkfiTxq', '2024-11-09 02:14:20');

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    servicio VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    mensajeadicional TEXT,
    estado VARCHAR(255) NOT NULL
);

CREATE TABLE Contacto (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(255) NOT NULL
);

INSERT INTO contacto (descripcion) VALUES ('Ingresa tus medios de contacto');

