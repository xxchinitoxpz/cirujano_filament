-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 06:46:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cirujano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `state` varchar(20) NOT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_attention_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `hour`, `state`, `patient_id`, `type_attention_id`, `created_at`, `updated_at`) VALUES
(1, '2024-09-08', '14:18:17', 'Atendida', 1, 1, '2024-09-09 00:18:26', '2024-09-26 01:16:02'),
(2, '2024-09-25', '15:13:13', 'En proceso', 1, 1, '2024-09-26 01:13:18', '2024-09-26 01:13:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attentions`
--

CREATE TABLE `attentions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fr` varchar(20) NOT NULL,
  `peso` varchar(20) NOT NULL,
  `so2` varchar(20) NOT NULL,
  `temp` varchar(20) NOT NULL,
  `pa` varchar(20) NOT NULL,
  `talla` varchar(20) NOT NULL,
  `fc` varchar(20) NOT NULL,
  `antecedent` longtext NOT NULL,
  `symptoms` longtext NOT NULL,
  `inconvenience` longtext NOT NULL,
  `diagnosis` longtext NOT NULL,
  `treatment` longtext NOT NULL,
  `state` varchar(50) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `attentions`
--

INSERT INTO `attentions` (`id`, `fr`, `peso`, `so2`, `temp`, `pa`, `talla`, `fc`, `antecedent`, `symptoms`, `inconvenience`, `diagnosis`, `treatment`, `state`, `doctor_id`, `appointment_id`, `created_at`, `updated_at`) VALUES
(1, 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 's', 'Registrada', 1, 1, '2024-09-09 00:39:40', '2024-09-09 00:39:40'),
(2, 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'Registrada', 1, 1, '2024-09-09 08:56:02', '2024-09-09 08:56:02'),
(3, '0', '0', '0', '0', '0', '0', '0', 'asdas', 'asd', 'asd', 'asd', 'asd', 'Registrada', 1, 1, '2024-09-26 01:16:52', '2024-09-26 01:16:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auxiliary_exams`
--

CREATE TABLE `auxiliary_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `EL_hemograma_completo` tinyint(1) NOT NULL,
  `EL_perfil_coagulacion_completo` tinyint(1) NOT NULL,
  `EL_TC` tinyint(1) NOT NULL,
  `EL_TS` tinyint(1) NOT NULL,
  `EL_tiempo_protrombina` tinyint(1) NOT NULL,
  `EL_tiempo_tromboplastina_parcial` tinyint(1) NOT NULL,
  `EL_plaquetas` tinyint(1) NOT NULL,
  `EL_glucosa` tinyint(1) NOT NULL,
  `EL_urea` tinyint(1) NOT NULL,
  `EL_creatinina` tinyint(1) NOT NULL,
  `EL_perfil_hepetico_completo` tinyint(1) NOT NULL,
  `EL_TGO` tinyint(1) NOT NULL,
  `EL_TGP` tinyint(1) NOT NULL,
  `EL_BT` tinyint(1) NOT NULL,
  `EL_BD` tinyint(1) NOT NULL,
  `EL_BI` tinyint(1) NOT NULL,
  `EL_fosfatasa_alcalina` tinyint(1) NOT NULL,
  `EL_GGI` tinyint(1) NOT NULL,
  `EL_perfil_updico_completo` tinyint(1) NOT NULL,
  `EL_coresterol_total` tinyint(1) NOT NULL,
  `EL_trigliceridos` tinyint(1) NOT NULL,
  `EL_HDL` tinyint(1) NOT NULL,
  `EL_LDL` tinyint(1) NOT NULL,
  `EL_perfil_tiroideo_completo` tinyint(1) NOT NULL,
  `EL_TSH` tinyint(1) NOT NULL,
  `EL_T3` tinyint(1) NOT NULL,
  `EL_T3_total` tinyint(1) NOT NULL,
  `EL_T3_libre` tinyint(1) NOT NULL,
  `EL_triyodotironina` tinyint(1) NOT NULL,
  `EL_examen_completo_orina` tinyint(1) NOT NULL,
  `RPO_hemograma_completo` tinyint(1) NOT NULL,
  `RPO_TC_TS` tinyint(1) NOT NULL,
  `RPO_glucosa` tinyint(1) NOT NULL,
  `RPO_urea` tinyint(1) NOT NULL,
  `RPO_creatinia` tinyint(1) NOT NULL,
  `RPO_perfil_hepatico` tinyint(1) NOT NULL,
  `RPO_HIV` tinyint(1) NOT NULL,
  `RPO_VDRL` tinyint(1) NOT NULL,
  `RPO_marcadores_hepatitis` tinyint(1) NOT NULL,
  `R_radiografia_torax_antero_post_postero_ant` tinyint(1) NOT NULL,
  `R_radiografia_torax_lateral_derecha_izquierda` tinyint(1) NOT NULL,
  `R_radiografia_simple_abdomen_pie_decubito` tinyint(1) NOT NULL,
  `R_radiografia_contraste_abdomen` tinyint(1) NOT NULL,
  `R_radiografia_doble_contraste_abdomen` tinyint(1) NOT NULL,
  `R_otras` varchar(255) DEFAULT NULL,
  `U_ecografia_abdomen_superior` tinyint(1) NOT NULL,
  `U_ecografia_abdomen_inferior` tinyint(1) NOT NULL,
  `U_ecografia_partes_blandas_pared_abdominal_anterior` tinyint(1) NOT NULL,
  `U_ecografia_partes_blandas_especificar` varchar(255) DEFAULT NULL,
  `U_region_inguinal_derecha` tinyint(1) NOT NULL,
  `U_region_inguinal_izquierda` tinyint(1) NOT NULL,
  `U_otras` varchar(255) DEFAULT NULL,
  `U_ecofast` tinyint(1) NOT NULL,
  `TAC_abdomen_superior_SC` tinyint(1) NOT NULL,
  `TAC_abdomen_superior_CC` tinyint(1) NOT NULL,
  `TAC_toraco_abdominal_SC` tinyint(1) NOT NULL,
  `TAC_toraco_abdominal_CC` tinyint(1) NOT NULL,
  `TAC_otras` varchar(255) DEFAULT NULL,
  `RNM_colangioresonancia` tinyint(1) NOT NULL,
  `RNM_otras` varchar(255) DEFAULT NULL,
  `RNM_riesgo_cardiologico` tinyint(1) NOT NULL,
  `RNM_riesgo_neumologico` tinyint(1) NOT NULL,
  `attention_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `auxiliary_exams`
--

INSERT INTO `auxiliary_exams` (`id`, `EL_hemograma_completo`, `EL_perfil_coagulacion_completo`, `EL_TC`, `EL_TS`, `EL_tiempo_protrombina`, `EL_tiempo_tromboplastina_parcial`, `EL_plaquetas`, `EL_glucosa`, `EL_urea`, `EL_creatinina`, `EL_perfil_hepetico_completo`, `EL_TGO`, `EL_TGP`, `EL_BT`, `EL_BD`, `EL_BI`, `EL_fosfatasa_alcalina`, `EL_GGI`, `EL_perfil_updico_completo`, `EL_coresterol_total`, `EL_trigliceridos`, `EL_HDL`, `EL_LDL`, `EL_perfil_tiroideo_completo`, `EL_TSH`, `EL_T3`, `EL_T3_total`, `EL_T3_libre`, `EL_triyodotironina`, `EL_examen_completo_orina`, `RPO_hemograma_completo`, `RPO_TC_TS`, `RPO_glucosa`, `RPO_urea`, `RPO_creatinia`, `RPO_perfil_hepatico`, `RPO_HIV`, `RPO_VDRL`, `RPO_marcadores_hepatitis`, `R_radiografia_torax_antero_post_postero_ant`, `R_radiografia_torax_lateral_derecha_izquierda`, `R_radiografia_simple_abdomen_pie_decubito`, `R_radiografia_contraste_abdomen`, `R_radiografia_doble_contraste_abdomen`, `R_otras`, `U_ecografia_abdomen_superior`, `U_ecografia_abdomen_inferior`, `U_ecografia_partes_blandas_pared_abdominal_anterior`, `U_ecografia_partes_blandas_especificar`, `U_region_inguinal_derecha`, `U_region_inguinal_izquierda`, `U_otras`, `U_ecofast`, `TAC_abdomen_superior_SC`, `TAC_abdomen_superior_CC`, `TAC_toraco_abdominal_SC`, `TAC_toraco_abdominal_CC`, `TAC_otras`, `RNM_colangioresonancia`, `RNM_otras`, `RNM_riesgo_cardiologico`, `RNM_riesgo_neumologico`, `attention_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 'Otras radiologicos', 1, 1, 1, 'Especificar ultra', 1, 1, 'otras ultra', 1, 1, 1, 1, 1, 'Otras axial', 1, 'Otras reso', 1, 1, 1, '2024-09-10 05:06:14', '2024-09-15 22:33:20'),
(2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, NULL, 0, 0, NULL, 1, 0, 0, 0, 0, NULL, 0, NULL, 0, 0, 3, '2024-09-26 01:22:43', '2024-09-26 01:22:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1727295671),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1727295671;', 1727295671),
('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:2;', 1727296400),
('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1727296400;', 1727296400),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:108:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:16:\"view_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:20:\"view_any_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:18:\"create_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:18:\"update_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:19:\"restore_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:23:\"restore_any_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:21:\"replicate_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:19:\"reorder_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:18:\"delete_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:22:\"delete_any_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:24:\"force_delete_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:28:\"force_delete_any_appointment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:14:\"view_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"view_any_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:16:\"create_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"update_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:17:\"restore_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:21:\"restore_any_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:19:\"replicate_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:17:\"reorder_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:16:\"delete_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:20:\"delete_any_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:22:\"force_delete_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:26:\"force_delete_any_attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:11:\"view_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:15:\"view_any_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:13:\"create_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:13:\"update_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:14:\"restore_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:18:\"restore_any_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:16:\"replicate_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:14:\"reorder_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:13:\"delete_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:17:\"delete_any_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:19:\"force_delete_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:23:\"force_delete_any_doctor\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:13:\"view_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:17:\"view_any_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:15:\"create_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:15:\"update_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:16:\"restore_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:20:\"restore_any_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:18:\"replicate_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:16:\"reorder_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:15:\"delete_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:19:\"delete_any_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:21:\"force_delete_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:25:\"force_delete_any_medicine\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:12:\"view_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"view_any_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:14:\"create_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:14:\"update_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:15:\"restore_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:19:\"restore_any_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:17:\"replicate_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:15:\"reorder_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:14:\"delete_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:18:\"delete_any_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:20:\"force_delete_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:24:\"force_delete_any_patient\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:3;i:2;i:4;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:11:\"view_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:15:\"view_any_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:13:\"create_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:13:\"update_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:14:\"restore_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:18:\"restore_any_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:16:\"replicate_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:14:\"reorder_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:13:\"delete_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:17:\"delete_any_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:19:\"force_delete_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:23:\"force_delete_any_report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:17:\"view_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:21:\"view_any_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:19:\"create_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:19:\"update_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:19:\"delete_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:23:\"delete_any_shield::role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:20:\"view_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:24:\"view_any_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:22:\"create_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:22:\"update_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:23:\"restore_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:27:\"restore_any_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:25:\"replicate_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:23:\"reorder_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:22:\"delete_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:26:\"delete_any_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:94;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:28:\"force_delete_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:95;a:4:{s:1:\"a\";i:96;s:1:\"b\";s:32:\"force_delete_any_type::attention\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:96;a:4:{s:1:\"a\";i:97;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:4:{s:1:\"a\";i:98;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:4:{s:1:\"a\";i:101;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:4:{s:1:\"a\";i:102;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:103;a:4:{s:1:\"a\";i:104;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:104;a:4:{s:1:\"a\";i:105;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:105;a:4:{s:1:\"a\";i:106;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:106;a:4:{s:1:\"a\";i:107;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:107;a:4:{s:1:\"a\";i:108;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:6:\"Medico\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"Secretaria\";s:1:\"c\";s:3:\"web\";}}}', 1727381101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `CMP` varchar(5) NOT NULL,
  `RNE` varchar(5) NOT NULL,
  `stamp_image` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `CMP`, `RNE`, `stamp_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Prueba', '29152', '24651', '01J79ZVN6DD12TDAJ3ZG5M6Q4B.jpg', 1, '2024-09-08 23:38:11', '2024-09-09 04:35:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `presentation` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicines`
--

INSERT INTO `medicines` (`id`, `medicine`, `description`, `presentation`, `created_at`, `updated_at`) VALUES
(1, 'medicamento 1', 'medicamento 1', 'medicamento 1', '2024-09-15 23:27:21', '2024-09-15 23:27:21'),
(2, 'medicamento 2', 'medicamento 2', 'medicamento 2', '2024-09-15 23:27:35', '2024-09-15 23:27:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicine_recipes`
--

CREATE TABLE `medicine_recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` text NOT NULL,
  `dosis` text NOT NULL,
  `periodo` text NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicine_recipes`
--

INSERT INTO `medicine_recipes` (`id`, `medicine_id`, `cantidad`, `dosis`, `periodo`, `recipe_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '1 cada 2 dias', '2 meses', 1, '2024-09-15 23:35:39', '2024-09-15 23:35:39'),
(2, 2, '3', '1 cada 3 dias', '1 mes', 1, '2024-09-15 23:36:39', '2024-09-15 23:36:39'),
(3, 2, '1', '1', '1', 2, '2024-09-15 23:37:32', '2024-09-15 23:37:32'),
(4, 1, '2', '2', '2', 2, '2024-09-15 23:37:32', '2024-09-15 23:37:32'),
(5, 1, '0', '0', '0', 3, '2024-09-26 01:24:43', '2024-09-26 01:24:43'),
(6, 2, '2', '2', '2', 3, '2024-09-26 01:24:43', '2024-09-26 01:24:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_06_215357_create_permission_tables', 2),
(5, '2024_09_06_221809_create_medicines_table', 3),
(6, '2024_09_06_222241_create_patients_table', 4),
(7, '2024_09_06_222647_create_type_attentions_table', 5),
(8, '2024_09_06_224130_create_appointments_table', 6),
(10, '2024_09_08_022950_create_doctors_table', 7),
(11, '2024_09_08_033312_create_attentions_table', 8),
(12, '2024_09_08_235214_create_patient_exams_table', 9),
(15, '2024_09_09_060851_create_auxiliary_exams_table', 10),
(16, '2024_09_10_041410_create_reports_table', 11),
(17, '2024_09_15_175102_create_recipes_table', 12),
(18, '2024_09_15_181518_create_medicine_recipes_table', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(4, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patients`
--

INSERT INTO `patients` (`id`, `DNI`, `name`, `phone`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, '74444399', 'Brayan Horna', '949797535', '2002-08-06', '2024-09-07 04:42:26', '2024-09-07 04:42:26'),
(2, '74444398', 'Carlos', '949797535', '2024-09-06', '2024-09-07 04:51:51', '2024-09-07 04:51:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient_exams`
--

CREATE TABLE `patient_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `attention_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patient_exams`
--

INSERT INTO `patient_exams` (`id`, `name`, `file`, `attention_id`, `created_at`, `updated_at`) VALUES
(1, 'examen 1', '01J7AEQAAWCHRAT6SFHP56RYQA.jpg', 1, '2024-09-09 08:54:59', '2024-09-09 08:54:59'),
(4, 'examen 1', 'exams/firma-m-gonzalez-4.jpg', 2, '2024-09-09 09:38:08', '2024-09-09 09:38:08'),
(5, 'prueba 2', 'exams/firma-m-gonzalez-4.jpg', 2, '2024-09-09 09:38:50', '2024-09-09 09:38:50'),
(6, 'dd', 'exams/asdasd.pdf.pdf', 2, '2024-09-09 09:39:12', '2024-09-09 09:39:12'),
(7, 'examen 1', 'exams/informe_medico_1 (6).pdf', 3, '2024-09-26 01:18:10', '2024-09-26 01:18:10'),
(8, 'prueba 2', 'exams/informe_medico_1 (6).pdf', 3, '2024-09-26 01:20:19', '2024-09-26 01:20:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_role', 'web', '2024-09-07 02:54:09', '2024-09-07 02:54:09'),
(2, 'view_any_role', 'web', '2024-09-07 02:54:09', '2024-09-07 02:54:09'),
(3, 'create_role', 'web', '2024-09-07 02:54:09', '2024-09-07 02:54:09'),
(4, 'update_role', 'web', '2024-09-07 02:54:10', '2024-09-07 02:54:10'),
(5, 'delete_role', 'web', '2024-09-07 02:54:10', '2024-09-07 02:54:10'),
(6, 'delete_any_role', 'web', '2024-09-07 02:54:10', '2024-09-07 02:54:10'),
(7, 'view_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(8, 'view_any_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(9, 'create_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(10, 'update_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(11, 'restore_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(12, 'restore_any_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(13, 'replicate_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(14, 'reorder_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(15, 'delete_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(16, 'delete_any_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(17, 'force_delete_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(18, 'force_delete_any_appointment', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(19, 'view_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(20, 'view_any_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(21, 'create_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(22, 'update_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(23, 'restore_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(24, 'restore_any_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(25, 'replicate_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(26, 'reorder_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(27, 'delete_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(28, 'delete_any_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(29, 'force_delete_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(30, 'force_delete_any_attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(31, 'view_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(32, 'view_any_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(33, 'create_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(34, 'update_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(35, 'restore_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(36, 'restore_any_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(37, 'replicate_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(38, 'reorder_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(39, 'delete_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(40, 'delete_any_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(41, 'force_delete_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(42, 'force_delete_any_doctor', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(43, 'view_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(44, 'view_any_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(45, 'create_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(46, 'update_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(47, 'restore_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(48, 'restore_any_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(49, 'replicate_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(50, 'reorder_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(51, 'delete_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(52, 'delete_any_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(53, 'force_delete_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(54, 'force_delete_any_medicine', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(55, 'view_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(56, 'view_any_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(57, 'create_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(58, 'update_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(59, 'restore_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(60, 'restore_any_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(61, 'replicate_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(62, 'reorder_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(63, 'delete_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(64, 'delete_any_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(65, 'force_delete_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(66, 'force_delete_any_patient', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(67, 'view_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(68, 'view_any_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(69, 'create_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(70, 'update_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(71, 'restore_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(72, 'restore_any_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(73, 'replicate_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(74, 'reorder_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(75, 'delete_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(76, 'delete_any_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(77, 'force_delete_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(78, 'force_delete_any_report', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(79, 'view_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(80, 'view_any_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(81, 'create_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(82, 'update_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(83, 'delete_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(84, 'delete_any_shield::role', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(85, 'view_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(86, 'view_any_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(87, 'create_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(88, 'update_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(89, 'restore_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(90, 'restore_any_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(91, 'replicate_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(92, 'reorder_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(93, 'delete_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(94, 'delete_any_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(95, 'force_delete_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(96, 'force_delete_any_type::attention', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(97, 'view_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(98, 'view_any_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(99, 'create_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(100, 'update_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(101, 'restore_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(102, 'restore_any_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(103, 'replicate_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(104, 'reorder_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(105, 'delete_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(106, 'delete_any_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(107, 'force_delete_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08'),
(108, 'force_delete_any_user', 'web', '2024-09-21 22:38:08', '2024-09-21 22:38:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dieta` text DEFAULT NULL,
  `attention_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recipes`
--

INSERT INTO `recipes` (`id`, `dieta`, `attention_id`, `created_at`, `updated_at`) VALUES
(1, 'Dieta saludable s', 1, '2024-09-15 23:35:39', '2024-09-15 23:36:39'),
(2, 'dd', 2, '2024-09-15 23:37:32', '2024-09-15 23:37:32'),
(3, 'Dieta baja en grasa', 3, '2024-09-26 01:24:43', '2024-09-26 01:24:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient` varchar(200) NOT NULL,
  `hc_nr` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `edad` varchar(3) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `modalidad_atencion` varchar(100) NOT NULL,
  `fecha_hora_ingreso` timestamp NULL DEFAULT NULL,
  `fecha_hora_egreso` timestamp NULL DEFAULT NULL,
  `resumen_hc` varchar(255) NOT NULL,
  `diagnostico_1` varchar(200) NOT NULL,
  `cie10_1` varchar(200) NOT NULL,
  `diagnostico_2` varchar(200) DEFAULT NULL,
  `cie10_2` varchar(200) DEFAULT NULL,
  `diagnostico_3` varchar(200) DEFAULT NULL,
  `cie10_3` varchar(200) DEFAULT NULL,
  `diagnostico_4` varchar(200) DEFAULT NULL,
  `cie10_4` varchar(200) DEFAULT NULL,
  `tratamiento` varchar(10) NOT NULL,
  `tratamiento_desc` varchar(255) NOT NULL,
  `evolucion` varchar(100) NOT NULL,
  `evolucion_desc` varchar(255) NOT NULL,
  `fecha_hora_alta` timestamp NULL DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reports`
--

INSERT INTO `reports` (`id`, `patient`, `hc_nr`, `dni`, `edad`, `sexo`, `modalidad_atencion`, `fecha_hora_ingreso`, `fecha_hora_egreso`, `resumen_hc`, `diagnostico_1`, `cie10_1`, `diagnostico_2`, `cie10_2`, `diagnostico_3`, `cie10_3`, `diagnostico_4`, `cie10_4`, `tratamiento`, `tratamiento_desc`, `evolucion`, `evolucion_desc`, `fecha_hora_alta`, `observaciones`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 'Brayan Horna', '001', '74444399', '22', 'm', 'consultoria', '2024-09-21 17:13:59', '2024-09-22 17:14:02', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asasdasdasd', '001', 'dddd', '002', 'ssss', '003', NULL, NULL, 'quirurgico', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwfffffffffffffffffffff', 'favorable', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwfffffffffffffffffffff', '2024-09-21 17:14:59', 'fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwfffffffffffffffffffff', 1, '2024-09-21 22:15:15', '2024-09-21 22:15:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-09-07 02:54:10', '2024-09-07 02:54:10'),
(2, 'panel_user', 'web', '2024-09-07 02:57:38', '2024-09-07 02:57:38'),
(3, 'Medico', 'web', '2024-09-23 07:48:55', '2024-09-23 07:48:55'),
(4, 'Secretaria', 'web', '2024-09-23 07:49:39', '2024-09-23 07:49:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(7, 4),
(8, 1),
(8, 3),
(8, 4),
(9, 1),
(9, 3),
(9, 4),
(10, 1),
(10, 3),
(10, 4),
(11, 1),
(11, 3),
(11, 4),
(12, 1),
(12, 3),
(12, 4),
(13, 1),
(13, 3),
(13, 4),
(14, 1),
(14, 3),
(14, 4),
(15, 1),
(15, 3),
(15, 4),
(16, 1),
(16, 3),
(16, 4),
(17, 1),
(17, 3),
(17, 4),
(18, 1),
(18, 3),
(18, 4),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(55, 4),
(56, 1),
(56, 3),
(56, 4),
(57, 1),
(57, 3),
(57, 4),
(58, 1),
(58, 3),
(58, 4),
(59, 1),
(59, 3),
(59, 4),
(60, 1),
(60, 3),
(60, 4),
(61, 1),
(61, 3),
(61, 4),
(62, 1),
(62, 3),
(62, 4),
(63, 1),
(63, 3),
(63, 4),
(64, 1),
(64, 3),
(64, 4),
(65, 1),
(65, 3),
(65, 4),
(66, 1),
(66, 3),
(66, 4),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(96, 1),
(96, 3),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3UBNf0ywB1ih2RaQ0fohyu1VFcQOqDbgQiBGDZsm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTnpjeWtnZDRmcHZabGg3N0pUNUtQOFh2aHpPY2kzeXlJb1pZODBPWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1727296628);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_attentions`
--

CREATE TABLE `type_attentions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_attention` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_attentions`
--

INSERT INTO `type_attentions` (`id`, `type_attention`, `price`, `created_at`, `updated_at`) VALUES
(1, 'consulta', 10, '2024-09-07 04:55:57', '2024-09-07 04:55:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$cI2A88ME4X9VDngxQDbAPuJDqQ98CKEklI.TXMg.AdDd2qNJAEWQG', NULL, '2024-09-07 02:50:15', '2024-09-07 02:50:15'),
(10, 'Arboleda Gil Nilthon', 'nilthon3008@gmail.com', NULL, '$2y$12$FTjC4WaChGVBVOOt91QxYu4G5xearGHhlHim6cWuH6AMyR.nqxDQi', NULL, '2024-09-23 08:06:23', '2024-09-23 08:09:37'),
(11, 'Mendoza García Rodolfo Carlos', 'roca_mega@hotmail.com', NULL, '$2y$12$/IMCSOsvqMQXqPl3qC0CBuJKt8od2yt1Z3s5idm5zXoKFv7A3dMSK', NULL, '2024-09-23 08:11:24', '2024-09-23 08:11:24'),
(12, 'Usquil Frisancho Luis Ernesto', 'luiser2114@gmail.com', NULL, '$2y$12$ba7SkAnwcXKZGKaf6/1LqObi.leRk84voWytqassc0Ydy1A9U8rBu', NULL, '2024-09-23 08:11:46', '2024-09-23 08:11:46'),
(13, 'Rafael Mayta, Elver Winer', 'winercg@gmail.com', NULL, '$2y$12$wUhtEjqgaiRvVPVf1iDFWO23u5swiOIgDw6Dx3HAf7ak7bc1JZiei', NULL, '2024-09-23 08:12:08', '2024-09-23 08:12:08'),
(14, 'Durand Mendoza, Elvis Neil', 'neilmedic90@gmail.com', NULL, '$2y$12$rQQvcxZ.x1YLL/5NroLUdeUtED2FzzjGbbnMr8UmHsH.Zgs7zrdiO', NULL, '2024-09-23 08:12:22', '2024-09-23 08:12:22'),
(15, 'Vera Freundt Mario Guillermo', 'verafreundt@hotmail.com', NULL, '$2y$12$K68/huHwGv6EHxNKtKqvteGldTUSkXmKJuAoQLr7D7aLta8eDusYi', NULL, '2024-09-23 08:12:37', '2024-09-23 08:12:37'),
(16, 'Saúl Espinoza Rivera', 'saul.espiriv@gmail.com', NULL, '$2y$12$rxLFleWckOMPbOSwCH3laupg/p4zP3YML.wWHRXa50Lgdav.PVdwy', NULL, '2024-09-23 08:12:56', '2024-09-23 08:12:56'),
(17, 'Lidia Maneique', 'marlenelidia30@gmail.com', NULL, '$2y$12$a97vTovtefNWtaGgdiz4DuCIgNH7xh22UxTyGIQ.QQhJzZtmO9dRa', NULL, '2024-09-23 08:13:11', '2024-09-23 08:13:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_type_attention_id_foreign` (`type_attention_id`);

--
-- Indices de la tabla `attentions`
--
ALTER TABLE `attentions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attentions_appointment_id_foreign` (`appointment_id`),
  ADD KEY `attentions_doctor_id_foreign` (`doctor_id`);

--
-- Indices de la tabla `auxiliary_exams`
--
ALTER TABLE `auxiliary_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auxiliary_exams_attention_id_foreign` (`attention_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicine_recipes`
--
ALTER TABLE `medicine_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_recipes_recipe_id_foreign` (`recipe_id`),
  ADD KEY `medicine_recipes_medicine_id_foreign` (`medicine_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_dni_unique` (`DNI`);

--
-- Indices de la tabla `patient_exams`
--
ALTER TABLE `patient_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_exams_attention_id_foreign` (`attention_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_attention_id_foreign` (`attention_id`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_doctor_id_foreign` (`doctor_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `type_attentions`
--
ALTER TABLE `type_attentions`
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
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `attentions`
--
ALTER TABLE `attentions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `auxiliary_exams`
--
ALTER TABLE `auxiliary_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medicine_recipes`
--
ALTER TABLE `medicine_recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `patient_exams`
--
ALTER TABLE `patient_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `type_attentions`
--
ALTER TABLE `type_attentions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_type_attention_id_foreign` FOREIGN KEY (`type_attention_id`) REFERENCES `type_attentions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `attentions`
--
ALTER TABLE `attentions`
  ADD CONSTRAINT `attentions_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attentions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `auxiliary_exams`
--
ALTER TABLE `auxiliary_exams`
  ADD CONSTRAINT `auxiliary_exams_attention_id_foreign` FOREIGN KEY (`attention_id`) REFERENCES `attentions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medicine_recipes`
--
ALTER TABLE `medicine_recipes`
  ADD CONSTRAINT `medicine_recipes_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `medicine_recipes_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `patient_exams`
--
ALTER TABLE `patient_exams`
  ADD CONSTRAINT `patient_exams_attention_id_foreign` FOREIGN KEY (`attention_id`) REFERENCES `attentions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_attention_id_foreign` FOREIGN KEY (`attention_id`) REFERENCES `attentions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
