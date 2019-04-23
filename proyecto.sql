-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2019 a las 20:24:54
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `postowner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postbody` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postownerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `created_at`, `updated_at`, `user_id`, `post_id`, `postowner`, `postbody`, `postownerid`) VALUES
(1, '2019-04-16 21:30:21', '2019-04-16 21:30:21', 1, 1, 'Alejo Ardanaz', 'Tengo que dejar de cagarla asi!', 1),
(2, '2019-04-16 21:33:59', '2019-04-16 21:33:59', 2, 1, 'Alejo Ardanaz', 'Tengo que dejar de cagarla asi!', 1),
(3, '2019-04-16 21:36:12', '2019-04-16 21:36:12', 3, 2, 'Gonzalo A', 'No hagan php artisan migrate:fresh porque se te borra toda la DB \r\n:)', 2),
(4, '2019-04-16 21:36:13', '2019-04-16 21:36:13', 3, 1, 'Alejo Ardanaz', 'Tengo que dejar de cagarla asi!', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_02_11_082844_create_posts_table', 1),
(16, '2019_03_16_010604_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `body`, `user_id`) VALUES
(2, '2019-04-16 21:33:48', '2019-04-16 21:33:48', 'No hagan php artisan migrate:fresh porque se te borra toda la DB \r\n:)', 2),
(3, '2019-04-16 21:36:10', '2019-04-16 21:36:10', 'Falta hacerle el casi todo el Front End, pero de a poquito va tomando color', 3),
(4, '2019-04-23 18:23:13', '2019-04-23 18:23:13', 'Tengo que subir el archivo de la DB', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nac` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `nac`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alejo Ardanaz', '2000-06-27', 'alejo.ardanaz@gmail.com', NULL, '$2y$10$qqfBbQaP9ofZ0auooG0hieyeCO65oN.JqBHafUcvuOubhr98Ajvh6', 'nfcJvzxgh9taC23dTiC6uiyoSPZ14v1i8x0qeI9G9P94YcKZmKaUzNTxAGSt', '2019-04-16 21:29:58', '2019-04-16 21:29:58'),
(2, 'Gonzalo A', '1968-06-23', 'gonzalo.ardanaz@gmail.com', NULL, '$2y$10$1UOSRuyF8M..lURgMGY.HewwJ8iOGevFBd5sMdCgU7mwhsloB7eti', '6aPYAa4kymfbDQFidsuxUA5W4QN6d27UdCvKNjBuQCcKsCCv5bmoIWV3w96q', '2019-04-16 21:33:11', '2019-04-16 21:33:11'),
(3, 'Mora Ardanaz', '2003-03-14', 'mora.ardanaz@gmail.com', NULL, '$2y$10$HhA4vCvXeGiUNfm137i3U.3XyUth0CkTpUEH9xGDxMExryX4Rb.JS', NULL, '2019-04-16 21:35:40', '2019-04-16 21:35:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
