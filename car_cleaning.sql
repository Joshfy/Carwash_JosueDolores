-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2023 a las 00:46:55
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwash`
--

CREATE TABLE `carwash` (
  `CarwashID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carwash_has_employees`
--

CREATE TABLE `carwash_has_employees` (
  `CarwashID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventorysuppliers`
--

CREATE TABLE `inventorysuppliers` (
  `SupplierID` int(11) NOT NULL,
  `InventoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `ID` int(11) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentType` varchar(50) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ServiceDeliveryCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicewithcost`
--

CREATE TABLE `servicewithcost` (
  `ServiceID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `ServiceDeliveryCode` int(11) DEFAULT NULL,
  `Cost` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_delivery`
--

CREATE TABLE `service_delivery` (
  `ServiceCode` int(11) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `PaymentType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `carwash_has_employees`
--
ALTER TABLE `carwash_has_employees`
  ADD PRIMARY KEY (`CarwashID`,`EmployeeID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

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
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `ServiceDeliveryCode` (`ServiceDeliveryCode`);

--
-- Indices de la tabla `service_delivery`
--
ALTER TABLE `service_delivery`
  ADD PRIMARY KEY (`ServiceCode`);

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
-- Filtros para la tabla `carwash_has_employees`
--
ALTER TABLE `carwash_has_employees`
  ADD CONSTRAINT `carwash_has_employees_ibfk_1` FOREIGN KEY (`CarwashID`) REFERENCES `carwash` (`CarwashID`),
  ADD CONSTRAINT `carwash_has_employees_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

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
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ID`);

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `clients` (`ID`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`ServiceDeliveryCode`) REFERENCES `service_delivery` (`ServiceCode`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`token`) REFERENCES `tokens` (`token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
