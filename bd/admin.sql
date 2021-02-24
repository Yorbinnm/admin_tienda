-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-02-2021 a las 17:53:58
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `CategoriaId` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `SucursalId` int(11) NOT NULL,
  `EstatusId` int(11) NOT NULL,
  `Subcategoria` varchar(250) NOT NULL,
  `detalle_categoria` text NOT NULL,
  PRIMARY KEY (`CategoriaId`),
  KEY `EstatusId` (`EstatusId`),
  KEY `SucursalId` (`SucursalId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CategoriaId`, `Descripcion`, `SucursalId`, `EstatusId`, `Subcategoria`, `detalle_categoria`) VALUES
(41, 'Strains', 1, 1, 'Bebidas', '\nCategory description');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `EmpleadoId` int(11) NOT NULL AUTO_INCREMENT,
  `ApellidoPaterno` varchar(50) NOT NULL,
  `ApellidoMaterno` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Direccion` varchar(250) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Sueldo` int(11) NOT NULL,
  `EstatusId` int(11) NOT NULL,
  `SucursalId` int(11) NOT NULL,
  `Ban_Visible` tinyint(1) NOT NULL,
  `FuncionId` int(11) NOT NULL,
  PRIMARY KEY (`EmpleadoId`),
  KEY `estatus` (`EstatusId`),
  KEY `EmpSucursal` (`SucursalId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`EmpleadoId`, `ApellidoPaterno`, `ApellidoMaterno`, `Nombre`, `Telefono`, `Direccion`, `Email`, `Sueldo`, `EstatusId`, `SucursalId`, `Ban_Visible`, `FuncionId`) VALUES
(1, 'Nuñez', 'Martinez', 'Yorbin', 111111111, 'XXXXXXXXXXXXXXXX', 'root@hotmail.com', 0, 1, 1, 0, 1),
(2, 'Calzada', 'García', 'Félix', 7471318153, 'Calle Canuto Neri, #35Int Barrio San Mateo', 'Mari', 1500, 1, 1, 0, 3),
(3, 'X', 'X', 'Caja', 1, 'X', 'X', 3000, 1, 1, 0, 5),
(4, 'Zaragoza', 'Jímenez', 'Bettsy Elena', 7471744270, 'Eduardo Neri, Col Loma Bonita, C. Jazmín s/n.', 'bettsy.zaragoza@hotmail.com', 1200, 1, 1, 1, 2),
(5, 'Hernández', 'Portillo', 'Nelson', 7472183933, 'Av, Guerrero #65 Barrio de Jalisco, Almolonga', 'custodio_86@hotmail.com', 900, 1, 1, 1, 0),
(6, 'Rentería ', 'Adame', 'Carlos Jesus ', 4441311861, 'Col. Nuevo Mirador, Chilpancingo, Guerrero', 'cadame186@gmail.com', 1200, 1, 1, 1, 2),
(7, 'Solís ', 'Rendón', 'Joailyn Alessandra', 7421136051, 'Andador Gobernación, esq. con CAPAEG', '----', 1000, 1, 1, 1, 0),
(8, 'González', 'Ríos', 'Héctor', 7471764035, 'Fracc. Paseo de las lomas, manzana 5 lote 6', 'gonzalez_@cdh.gmx.com', 1100, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

DROP TABLE IF EXISTS `estatus`;
CREATE TABLE IF NOT EXISTS `estatus` (
  `EstatusId` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Clase` varchar(100) NOT NULL,
  PRIMARY KEY (`EstatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`EstatusId`, `Descripcion`, `Clase`) VALUES
(1, 'Activo', 'label label-success'),
(2, 'Inactivo', 'label label-danger'),
(3, 'Pendiente', 'label label-success'),
(4, 'En proceso', 'label label-warning'),
(5, 'Terminada', 'label label-danger'),
(6, 'Cancelado', 'label label-danger'),
(7, 'Libre', 'label label-success'),
(8, 'Ocupada', 'label label-danger'),
(9, 'En construcción', 'label label-danger'),
(10, 'En espera de Cobro ', 'label label-warning'),
(11, 'Egreso', ''),
(12, 'Ingreso', ''),
(13, 'Pendiente por cobrar', ''),
(14, 'Cobrado', ''),
(15, 'Reservado', ''),
(16, 'Aplicado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_repartidor`
--

DROP TABLE IF EXISTS `estatus_repartidor`;
CREATE TABLE IF NOT EXISTS `estatus_repartidor` (
  `estatus_repartidor_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`estatus_repartidor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `ModuloId` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(250) NOT NULL,
  `Linck` varchar(50) NOT NULL,
  `Icono` varchar(30) NOT NULL,
  `Clase` varchar(30) NOT NULL,
  PRIMARY KEY (`ModuloId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`ModuloId`, `Descripcion`, `Linck`, `Icono`, `Clase`) VALUES
(2, 'Manage inventory', '', 'fa fa-fw fa-cubes', 'treeview'),
(11, 'Administration\r\n', '', 'fa fa-fw fa-cogs', 'treeview'),
(30, '', '', '', ''),
(32, 'Orders\r\n', 'ctr_orden', 'fa fa-fw fa-cogs', ''),
(33, 'Delivery drivers\r\n', '/ctr_delivery', 'fa fa-fw fa-truck', ''),
(34, 'Rewards\r\n', '/', 'fa fa-fw fa-cogs', ''),
(35, 'analytics\r\n', '/', 'fa fa-fw fa-cogs', ''),
(36, 'Settings\r\n', '/', 'fa fa-fw fa-cogs', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE IF NOT EXISTS `orden` (
  `orden_id` int(11) NOT NULL AUTO_INCREMENT,
  `venta_id` int(11) NOT NULL,
  `identificador` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `dia` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `nombre_cliente` text NOT NULL,
  `repartidor_id` int(11) NOT NULL,
  PRIMARY KEY (`orden_id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`orden_id`, `venta_id`, `identificador`, `fecha`, `dia`, `anio`, `ruta_id`, `direccion`, `estatus_id`, `nombre_cliente`, `repartidor_id`) VALUES
(92, 20, 6, '2021-02-24', 54, 2021, 5, '2772 Donald Douglas Loop N, Santa Monica, CA 90405', 1, 'Yorbin Nuñez Martinez', 0),
(87, 20, 1, '2021-02-24', 54, 2021, 5, '1 Rocket Rd, Hawthorne, CA 90250', 1, 'Yorbin Nuñez Martinez', 0),
(88, 20, 2, '2021-02-24', 54, 2021, 5, '2100 East Grand Avenue, First Floor, El Segundo, CA 90245', 1, 'Yorbin Nuñez Martinez', 0),
(89, 20, 3, '2021-02-24', 54, 2021, 5, '2415 Michigan Ave, Santa Monica, CA 90404', 1, 'Yorbin Nuñez Martinez', 0),
(90, 20, 4, '2021-02-24', 54, 2021, 5, '2772 Donald Douglas Loop N, Santa Monica, CA 90405', 1, 'Yorbin Nuñez Martinez', 0),
(91, 20, 5, '2021-02-24', 54, 2021, 5, '2772 Donald Douglas Loop N, Santa Monica, CA 90405', 2, 'Yorbin Nuñez Martinez', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `ProductoId` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProducto` varchar(255) NOT NULL,
  `imagen1` varchar(200) NOT NULL,
  `imagen2` varchar(250) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` decimal(11,0) NOT NULL,
  `EstatusId` int(11) NOT NULL,
  `SucursalId` int(11) NOT NULL,
  `categoriaId` int(11) NOT NULL,
  `sub_categoria_id` int(11) NOT NULL,
  `peso` varchar(50) NOT NULL,
  `imagen3` varchar(250) NOT NULL,
  `imagen4` varchar(250) NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`ProductoId`),
  KEY `ProEstatus` (`EstatusId`),
  KEY `ProSucursal` (`SucursalId`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoId`, `NombreProducto`, `imagen1`, `imagen2`, `Descripcion`, `Precio`, `EstatusId`, `SucursalId`, `categoriaId`, `sub_categoria_id`, `peso`, `imagen3`, `imagen4`, `unidad_id`, `stock`) VALUES
(59, 'Balato', '52712e2ceffd4fe0a3599157da9e8ef6_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '9af41586792b4ccc8684baf0dce79694_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '', '11', 1, 1, 41, 8, '1', '93d339f1f482409b96a8d0138c547cc6_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 'a477b82044b540119d5dee614eb25017_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 1, 400),
(60, 'Apricot Breath', '675255f6ece546f8af5acf6accac9bf3_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 'bb5151c6880a46c983e613900e848c1b_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '', '43', 1, 1, 41, 8, '3.5', '04241ad1604243d6a39b3fa6d4a0818a_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 'c4efe8fbe1924299a5e9947d012bbc65_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 1, 400),
(61, 'Chem Dawg', '023b39ad61c143159c84c5505b6eb567_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '1add01f0da13433e9ea8aad741707b4f_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '', '29', 1, 1, 41, 8, '3.5', 'ae5e17c4b05e47548eecf9640c001dd3_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '18cbbfa1fbfd44189fef1a23fb89ecd2_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 1, 600),
(62, 'Dosilato', '41167b944608493ea290aa0b61baf9b1_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '5b905ec80dbe46169f1baac9553e8a85_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', '', '40', 1, 1, 41, 8, '3.5', '21c4a239cd6148dca462b779bc5de906_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 'c301f62428374e1c91c2cefe7fad7690_WhatsApp Image 2021-02-23 at 1.48.55 PM.jpeg', 1, 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repartidor`
--

DROP TABLE IF EXISTS `repartidor`;
CREATE TABLE IF NOT EXISTS `repartidor` (
  `repartidor_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `telefono` bigint(11) NOT NULL,
  `estatus_repartidor_id` int(11) NOT NULL,
  PRIMARY KEY (`repartidor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repartidor`
--

INSERT INTO `repartidor` (`repartidor_id`, `nombre`, `apellidos`, `telefono`, `estatus_repartidor_id`) VALUES
(12, 'john ', 'McKenna', 74957195931, 1),
(11, 'Ashok', 'Kumar', 7501040113, 1),
(10, 'john', 'appleseed', 73910481111, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

DROP TABLE IF EXISTS `ruta`;
CREATE TABLE IF NOT EXISTS `ruta` (
  `ruta_id` int(11) NOT NULL AUTO_INCREMENT,
  `cp` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`ruta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`ruta_id`, `cp`, `descripcion`, `estatus`) VALUES
(5, 90250, ' Hawthorne', 1),
(4, 90405, 'Santa Monica', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_repartidor`
--

DROP TABLE IF EXISTS `ruta_repartidor`;
CREATE TABLE IF NOT EXISTS `ruta_repartidor` (
  `ruta_repartidor_id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_id` int(11) NOT NULL,
  `repartidor_id` int(11) NOT NULL,
  PRIMARY KEY (`ruta_repartidor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta_repartidor`
--

INSERT INTO `ruta_repartidor` (`ruta_repartidor_id`, `ruta_id`, `repartidor_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 1, 7),
(5, 2, 7),
(6, 1, 4),
(7, 3, 8),
(8, 1, 9),
(9, 3, 9),
(10, 2, 9),
(11, 2, 9),
(12, 4, 12),
(13, 4, 12),
(14, 5, 11),
(15, 5, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodulo`
--

DROP TABLE IF EXISTS `submodulo`;
CREATE TABLE IF NOT EXISTS `submodulo` (
  `SubModuloId` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(250) NOT NULL,
  `Linck` varchar(250) NOT NULL,
  `Icon` varchar(30) NOT NULL,
  PRIMARY KEY (`SubModuloId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submodulo`
--

INSERT INTO `submodulo` (`SubModuloId`, `Descripcion`, `Linck`, `Icon`) VALUES
(1, 'Empleados', 'cEmpleado', 'fa fa-fw fa-users'),
(2, 'Users\r\n', 'cUsuarios', 'fa fa-fw fa-user-plus'),
(3, 'Insumos', 'cInsumos', 'glyphicon glyphicon-apple'),
(4, 'Products', 'product', 'fa fa-fw fa-cube'),
(5, 'Caja', 'cCaja', 'glyphicon glyphicon-inbox'),
(6, 'Pedido de Mesa', 'cVenta', 'fa fa-fw fa-cutlery'),
(8, 'Flujo de efectivo', 'cGastos', 'fa fa-fw fa-money'),
(10, 'Ventas', 'cVentasPendientes', 'fa fa-fw fa-dollar'),
(11, 'Nomina', 'cNomina', 'fa fa-check-square-o'),
(13, 'Alimentos', 'cOrdenes', 'fa  fa-apple'),
(14, 'Categorias', 'cCategorias', 'fa fa-fw fa-file-o'),
(15, 'Mesas', 'cMesas', 'glyphicon glyphicon-glass'),
(16, 'Sucursales', 'cSucursales', 'fa fa-fw fa-bank '),
(17, 'Indicadores Internos', 'cPrincipal', 'fa fa-fw fa-info-circle '),
(21, 'Cuenta', 'cCuenta', 'fa fa-fw fa-dollar'),
(22, 'Extras', 'cExtras', 'fa fa-sign-in'),
(23, 'Catálogo de Notas', 'cNotas', 'glyphicon glyphicon-duplicate'),
(24, 'Baja insumos', 'cBajaInsumos', 'fa fa-trash-o'),
(26, 'Bebidas', 'cOrdenes/Bebidas', ' fa fa-coffee'),
(27, 'Pedido de Barra', 'cPedido', 'fa fa-get-pocket'),
(28, 'Frases', 'cFrases', 'fa fa-clipboard'),
(29, 'Proveedores', 'cProveedores', 'fa fa-plus'),
(30, 'Ventas Realizadas', 'cControlVentas', 'glyphicon glyphicon-barcode'),
(31, '', '', ''),
(32, 'Productos en Mostrador', 'cProductosBarra', 'fa fa-beer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_categoria`
--

DROP TABLE IF EXISTS `sub_categoria`;
CREATE TABLE IF NOT EXISTS `sub_categoria` (
  `sub_categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_categoria` varchar(200) NOT NULL,
  `Descripcion` text NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `sucursal_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_categoria_id`),
  UNIQUE KEY `sub_categoria_id` (`sub_categoria_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sub_categoria`
--

INSERT INTO `sub_categoria` (`sub_categoria_id`, `sub_categoria`, `Descripcion`, `estatus_id`, `categoria_id`, `sucursal_id`) VALUES
(8, 'Strains', '', 1, 41, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `SucursalId` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSucursal` varchar(250) NOT NULL,
  `SucursalPadre` varchar(150) NOT NULL,
  `RFC` varchar(20) NOT NULL,
  `Calle` varchar(100) NOT NULL,
  `Colonia` varchar(150) NOT NULL,
  `Cp` int(11) NOT NULL,
  `Ciudad` varchar(250) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `PaginaWeb` varchar(250) NOT NULL,
  `EstatusId` int(11) NOT NULL,
  PRIMARY KEY (`SucursalId`),
  KEY `SucursalEstatus` (`EstatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`SucursalId`, `NombreSucursal`, `SucursalPadre`, `RFC`, `Calle`, `Colonia`, `Cp`, `Ciudad`, `Telefono`, `PaginaWeb`, `EstatusId`) VALUES
(1, 'Sucursal: Colonia morelos', 'CAFÉ LEMURIA', 'Lun-Sáb 9AM-10:00P', 'Revolución del Sur', 'Morelos', 39030, 'Chilpancingo de los Bravo, Gro.', '7471383558', 'facebook.com/cafelemuria', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `TipoUsuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(50) NOT NULL,
  `Clase` varchar(500) NOT NULL,
  PRIMARY KEY (`TipoUsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`TipoUsuarioId`, `Descripcion`, `Clase`) VALUES
(1, 'SuperAdministrador', 'hold-transition skin-black sidebar-mini'),
(2, 'Administrador', 'hold-transition skin-black sidebar-mini'),
(3, 'Cajero', 'hold-transition skin-black sidebar-mini'),
(4, 'Mesero', 'hold-transition skin-black sidebar-mini sidebar-collapse'),
(5, 'Cocinero', 'hold-transition skin-black sidebar-mini sidebar-collapse'),
(6, 'Barman', 'hold-transition skin-black sidebar-mini sidebar-collapse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

DROP TABLE IF EXISTS `unidad`;
CREATE TABLE IF NOT EXISTS `unidad` (
  `unidad_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`unidad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`unidad_id`, `descripcion`) VALUES
(1, 'GRAMOS'),
(2, 'KILO GRAMOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `UsuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `TipoUsuarioId` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `EmpleadoId` int(11) NOT NULL,
  PRIMARY KEY (`UsuarioId`),
  KEY `UserEmpleado` (`EmpleadoId`),
  KEY `UserTipo` (`TipoUsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`UsuarioId`, `TipoUsuarioId`, `Usuario`, `Password`, `EmpleadoId`) VALUES
(2, 1, 'root', '123', 1),
(4, 3, 'Cajero', '098765@*', 3),
(6, 2, 'admin', 'L3mur270415', 1),
(9, 5, 'Cocinera', '0123', 4),
(10, 4, 'mesero', '123', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariomodulos`
--

DROP TABLE IF EXISTS `usuariomodulos`;
CREATE TABLE IF NOT EXISTS `usuariomodulos` (
  `UsuarioModuloId` int(11) NOT NULL AUTO_INCREMENT,
  `ModuloId` int(11) NOT NULL,
  `SubModuloId` int(11) NOT NULL,
  `TipoUsuarioId` int(11) NOT NULL,
  PRIMARY KEY (`UsuarioModuloId`),
  KEY `UserModulo` (`ModuloId`),
  KEY `UserSubModulo` (`SubModuloId`),
  KEY `UserTipoUser` (`TipoUsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariomodulos`
--

INSERT INTO `usuariomodulos` (`UsuarioModuloId`, `ModuloId`, `SubModuloId`, `TipoUsuarioId`) VALUES
(6, 2, 4, 1),
(7, 2, 3, 2),
(8, 2, 4, 2),
(30, 11, 14, 2),
(43, 2, 22, 2),
(45, 11, 23, 2),
(48, 2, 24, 2),
(60, 11, 15, 2),
(61, 11, 2, 2),
(69, 11, 28, 2),
(71, 2, 29, 2),
(86, 2, 17, 2),
(113, 2, 32, 2),
(119, 11, 2, 1),
(120, 32, 31, 1),
(121, 33, 31, 1),
(122, 34, 31, 1),
(123, 35, 31, 1),
(124, 36, 31, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `EstatusId` FOREIGN KEY (`EstatusId`) REFERENCES `estatus` (`EstatusId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SucursalId` FOREIGN KEY (`SucursalId`) REFERENCES `sucursal` (`SucursalId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `EmpSucursal` FOREIGN KEY (`SucursalId`) REFERENCES `sucursal` (`SucursalId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estatus` FOREIGN KEY (`EstatusId`) REFERENCES `estatus` (`EstatusId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `ProSucursal` FOREIGN KEY (`SucursalId`) REFERENCES `sucursal` (`SucursalId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `SucursalEstatus` FOREIGN KEY (`EstatusId`) REFERENCES `estatus` (`EstatusId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `UserEmpleado` FOREIGN KEY (`EmpleadoId`) REFERENCES `empleado` (`EmpleadoId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserTipo` FOREIGN KEY (`TipoUsuarioId`) REFERENCES `tipousuario` (`TipoUsuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariomodulos`
--
ALTER TABLE `usuariomodulos`
  ADD CONSTRAINT `UserModulo` FOREIGN KEY (`ModuloId`) REFERENCES `modulo` (`ModuloId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UserTipoUser` FOREIGN KEY (`TipoUsuarioId`) REFERENCES `tipousuario` (`TipoUsuarioId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_submoduloId` FOREIGN KEY (`SubModuloId`) REFERENCES `submodulo` (`SubModuloId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
