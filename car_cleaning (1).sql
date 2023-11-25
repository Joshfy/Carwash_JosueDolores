-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2023 a las 00:34:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `car_cleaning`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `CarwashID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrator`
--

INSERT INTO `administrator` (`ID`, `FirstName`, `LastName`, `MiddleName`, `Address`, `Phone`, `CarwashID`) VALUES
(1, 'carlos', 'dolores', 'JOsue', 'jr unidos', ' 8456156', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwash`
--

CREATE TABLE `carwash` (
  `CarwashID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telephone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carwash`
--

INSERT INTO `carwash` (`CarwashID`, `Name`, `Address`, `Email`, `Telephone`) VALUES
(1, 'Carwash huanuco', 'huallayco', 'daoleras@admakmd.com', '9825265'),
(2, 'Josue', 'jr hianuco', 'josue@admakmd.com', '9595515'),
(3, 'Carwash Lima', 'Las lomnas', 'adsasdasd@admakmd.com', '59151'),
(4, 'Carwash Lima', 'Las lomnas', 'adsasdasd@admakmd.com', '59151');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwashservice`
--

CREATE TABLE `carwashservice` (
  `ID` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carwashservice`
--

INSERT INTO `carwashservice` (`ID`, `customer_id`, `cost`) VALUES
(0, 6, 213.00),
(1, 5, 12.00),
(2, 11, 25.00),
(3, 7, 112.00),
(4, 12, 1.00),
(5, 13, 2323.00),
(10, 8, 122.00),
(12, 9, 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwash_has_employees`
--

CREATE TABLE `carwash_has_employees` (
  `CarwashID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carwash_has_employees`
--

INSERT INTO `carwash_has_employees` (`CarwashID`, `EmployeeID`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`ID`, `first_name`, `last_name`, `middle_name`, `address`) VALUES
(1, 'josue', 'asdads', 'Compas', 'jr unidos'),
(2, 'edward', 'Compra', 'Compas', 'esperanza'),
(3, 'jean', 'aea', 'adad', 'asdasdad'),
(4, 'normila', 'Compra', 'adssadas', 'jr unidos'),
(5, 'jean', 'carlos', 'garay', 'adad'),
(6, 'cliente', 'dada', 'dadad', 'lima'),
(7, 'jean', 'Compradsf', 'Compas', 'jr unidosx'),
(8, 'edward', 'Compradsf', 'adssadas', 'esperanza'),
(9, 'cliente', 'Compra', 'adasd', 'jr unidos'),
(10, 'gfarcias', 'hola', '123', 'asdaddsa'),
(11, 'sdfdsf', 'sdffds', 'fsdfdsf', 'jr unidosx'),
(12, 'cliente', 'Compradsf', 'adssadas', 'esperanza'),
(13, 'josue', 'adsad', 'sad', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `ID` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `delivery`
--

INSERT INTO `delivery` (`ID`, `customer_id`, `customer_address`, `product_id`, `total_price`, `date`) VALUES
(1, 1, 'jr unidos', 1, 12.00, '2023-11-02'),
(2, 1, 'jr unidos', 1, 2323.00, '2023-11-07'),
(3, 10, 'asdaddsa', 1, 232.00, '2023-11-06'),
(4, 2, 'esperanza', 1, 221.00, '2023-11-08'),
(5, 3, 'asdasdad', 1, 1212.00, '2023-11-08'),
(11, 4, 'jr unidos', 1, 1223.00, '2023-11-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Shift` varchar(20) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`EmployeeID`, `FirstName`, `LastName`, `MiddleName`, `Salary`, `Shift`, `Position`) VALUES
(1, 'Josue', 'Davud', 'Dlores', 48.00, 'asdasd', 'adadsadsad'),
(2, 'Diana', 'carlos', 'adasdadasd', 51.00, 'dsgfsfsfds', 'adadsadsad'),
(3, 'adasad', 'carlos', 'adasdadasddfgjgfjhghj', 89.00, 'dsgfsfsfds', 'gjghjgfjgfj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

CREATE TABLE `inventory` (
  `IDproduct` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Costs` decimal(10,2) DEFAULT NULL,
  `IDproducts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventory`
--

INSERT INTO `inventory` (`IDproduct`, `Quantity`, `Costs`, `IDproducts`) VALUES
(1, 120, 20.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventorysuppliers`
--

CREATE TABLE `inventorysuppliers` (
  `SupplierID` int(11) NOT NULL,
  `InventoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventorysuppliers`
--

INSERT INTO `inventorysuppliers` (`SupplierID`, `InventoryID`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `ID` int(11) NOT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`ID`, `amount_paid`, `date`, `payment_type`, `service_type`, `service_id`) VALUES
(0, 2.00, '2023-11-02', 'Efectivo', 'CarWash', 4),
(2, 12.00, '2023-11-11', 'Tarjeta de Crédito', 'CarWash', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store`
--

CREATE TABLE `store` (
  `IDproducts` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `store`
--

INSERT INTO `store` (`IDproducts`, `Name`, `Description`, `Price`) VALUES
(1, 'limpia parabrisas', 'adssadadsad', 12.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suppliers`
--

INSERT INTO `suppliers` (`id`, `Name`, `Address`, `Phone`, `Email`) VALUES
(0, 'Josue', 'huallayco', '95962962', 'adsasdasd@admakmd.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `utilizado` tinyint(1) DEFAULT 0,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_utilizacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `utilizado`, `fecha_creacion`, `fecha_utilizacion`) VALUES
(1, 'token1', 0, '2023-11-04 19:38:47', NULL),
(2, 'token2', 0, '2023-11-04 19:38:47', NULL),
(3, 'token3', 0, '2023-11-04 19:38:47', NULL),
(4, 'token4', 0, '2023-11-04 19:38:47', NULL),
(5, 'token5', 0, '2023-11-04 19:38:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `registration_date`) VALUES
(3, 'josue', 'josue@gmail.com', '123', 'token1', '2023-11-04 19:47:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usersregister`
--

CREATE TABLE `usersregister` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarwashID` (`CarwashID`);

--
-- Indices de la tabla `carwash`
--
ALTER TABLE `carwash`
  ADD PRIMARY KEY (`CarwashID`);

--
-- Indices de la tabla `carwashservice`
--
ALTER TABLE `carwashservice`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `carwash_has_employees`
--
ALTER TABLE `carwash_has_employees`
  ADD PRIMARY KEY (`CarwashID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`IDproduct`),
  ADD KEY `IDproducts` (`IDproducts`);

--
-- Indices de la tabla `inventorysuppliers`
--
ALTER TABLE `inventorysuppliers`
  ADD PRIMARY KEY (`SupplierID`,`InventoryID`),
  ADD KEY `InventoryID` (`InventoryID`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `service_id` (`service_id`);

--
-- Indices de la tabla `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`IDproducts`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_token` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `token` (`token`);

--
-- Indices de la tabla `usersregister`
--
ALTER TABLE `usersregister`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_email_password` (`email`,`password`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usersregister`
--
ALTER TABLE `usersregister`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`CarwashID`) REFERENCES `carwash` (`CarwashID`);

--
-- Filtros para la tabla `carwashservice`
--
ALTER TABLE `carwashservice`
  ADD CONSTRAINT `carwashservice_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`ID`);

--
-- Filtros para la tabla `carwash_has_employees`
--
ALTER TABLE `carwash_has_employees`
  ADD CONSTRAINT `carwash_has_employees_ibfk_1` FOREIGN KEY (`CarwashID`) REFERENCES `carwash` (`CarwashID`),
  ADD CONSTRAINT `carwash_has_employees_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Filtros para la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `store` (`IDproducts`);

--
-- Filtros para la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`IDproducts`) REFERENCES `store` (`IDproducts`);

--
-- Filtros para la tabla `inventorysuppliers`
--
ALTER TABLE `inventorysuppliers`
  ADD CONSTRAINT `inventorysuppliers_ibfk_1` FOREIGN KEY (`SupplierID`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `inventorysuppliers_ibfk_2` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`IDproduct`);

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `delivery` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `carwashservice` (`ID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`token`) REFERENCES `tokens` (`token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
