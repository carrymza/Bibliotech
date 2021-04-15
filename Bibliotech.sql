/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100416
 Source Host           : localhost:3306
 Source Schema         : bibliotech

 Target Server Type    : MariaDB
 Target Server Version : 100416
 File Encoding         : 65001

 Date: 15/04/2021 10:31:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ai_blood_groups
-- ----------------------------
DROP TABLE IF EXISTS `ai_blood_groups`;
CREATE TABLE `ai_blood_groups`  (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`groupId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_blood_groups
-- ----------------------------
INSERT INTO `ai_blood_groups` VALUES (1, 'A+', 0);
INSERT INTO `ai_blood_groups` VALUES (2, 'A-', 0);
INSERT INTO `ai_blood_groups` VALUES (3, 'B+', 0);
INSERT INTO `ai_blood_groups` VALUES (4, 'B-', 0);
INSERT INTO `ai_blood_groups` VALUES (5, 'O+', 0);
INSERT INTO `ai_blood_groups` VALUES (6, 'O-', 0);
INSERT INTO `ai_blood_groups` VALUES (7, 'AB+', 0);
INSERT INTO `ai_blood_groups` VALUES (8, 'AB-', 0);

-- ----------------------------
-- Table structure for ai_calendar_events
-- ----------------------------
DROP TABLE IF EXISTS `ai_calendar_events`;
CREATE TABLE `ai_calendar_events`  (
  `eventId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) NULL DEFAULT 0,
  `schoolId` int(11) NULL DEFAULT 0,
  `userId` int(11) NULL DEFAULT 0,
  `title` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_start` date NULL DEFAULT NULL,
  `date_end` date NULL DEFAULT NULL,
  `repeat_type` tinyint(1) NULL DEFAULT 0,
  `rrule` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `creation_date` date NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `send_reminder` tinyint(1) NULL DEFAULT 0,
  `recipients` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`eventId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 653 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_calendar_events
-- ----------------------------
INSERT INTO `ai_calendar_events` VALUES (8, 1, 1, 248, 'FACTURAR CLIENTES', NULL, '0000-00-00', '0000-00-00', 0, 'RRULE:dtstart=20190412;freq=MONTHLY;interval=1', '2019-03-14', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (18, 1, 1, 23, '   ', NULL, '2019-03-03', '0000-00-00', 0, '', '2019-03-20', 1, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (28, 2, 1, 828, 'hmgkg', NULL, '2020-04-20', '0000-00-00', 0, '', '2019-03-29', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (38, 3, 1, 1578, 'DECLARACIONES ISR-ITBIS URGENTES', NULL, '2019-04-20', '0000-00-00', 1, 'RRULE:dtstart=20190420;freq=DAILY;interval=2;until=2020-05-15', '2019-04-20', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (48, 3, 1, 2073, 'PAGO I12 DGII', NULL, '2019-05-15', '0000-00-00', 0, 'RRULE:dtstart=20190515;freq=MONTHLY;interval=15', '2019-05-04', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (53, 2, 1, 2073, 'PAGO IT1 DGII', NULL, '2019-05-20', '0000-00-00', 0, 'RRULE:dtstart=20190520;freq=MONTHLY;interval=1', '2019-05-04', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (58, 4, 1, 2073, 'PAGO IR17 DGII', NULL, '2019-05-10', '0000-00-00', 0, 'RRULE:dtstart=20190510;freq=MONTHLY;interval=1', '2019-05-04', 0, 0, NULL);
INSERT INTO `ai_calendar_events` VALUES (651, 4, 1, 1, 'asdasdsa', 'dasdasdasd', '2020-04-29', '0000-00-00', 0, NULL, '2020-04-29', 0, 1, NULL);
INSERT INTO `ai_calendar_events` VALUES (652, 11, 1, 1, 'asdasdasd', 'asdasdasdsad', '2020-05-03', '0000-00-00', 0, NULL, '2020-05-03', 0, 0, '');

-- ----------------------------
-- Table structure for ai_calendar_frequency
-- ----------------------------
DROP TABLE IF EXISTS `ai_calendar_frequency`;
CREATE TABLE `ai_calendar_frequency`  (
  `frequencyId` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(3) NULL DEFAULT 0,
  `name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rrule` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`frequencyId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_calendar_frequency
-- ----------------------------
INSERT INTO `ai_calendar_frequency` VALUES (1, 0, 'Solo esta vez', '', '0');
INSERT INTO `ai_calendar_frequency` VALUES (2, 1, 'Diario', 'días', 'DAY');
INSERT INTO `ai_calendar_frequency` VALUES (3, 7, 'Semanal', 'semanas', 'WEEK');
INSERT INTO `ai_calendar_frequency` VALUES (4, 30, 'Mensual', 'meses', 'MONTH');
INSERT INTO `ai_calendar_frequency` VALUES (5, 365, 'Anual', 'años', 'YEAR');

-- ----------------------------
-- Table structure for ai_calendars_type
-- ----------------------------
DROP TABLE IF EXISTS `ai_calendars_type`;
CREATE TABLE `ai_calendars_type`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_calendars_type
-- ----------------------------
INSERT INTO `ai_calendars_type` VALUES (1, 1, 'Reuni&oacute;n', '000FC7', 0);
INSERT INTO `ai_calendars_type` VALUES (2, 1, 'Presentaci&oacute;n', '868EEF', 0);
INSERT INTO `ai_calendars_type` VALUES (3, 1, 'Excursi&oacute;n', 'F13919', 0);
INSERT INTO `ai_calendars_type` VALUES (4, 1, 'Cumplea&ntilde;os', 'F13919', 0);
INSERT INTO `ai_calendars_type` VALUES (5, 1, 'Gastos', 'B4F704', 0);
INSERT INTO `ai_calendars_type` VALUES (6, 1, 'Feria', 'F71E04', 0);
INSERT INTO `ai_calendars_type` VALUES (7, 1, 'Torneos', '04F7C7', 0);
INSERT INTO `ai_calendars_type` VALUES (8, 1, 'Pagos', 'F71E04', 0);
INSERT INTO `ai_calendars_type` VALUES (9, 1, 'Cobro', 'ff6600', 0);

-- ----------------------------
-- Table structure for ai_diseases
-- ----------------------------
DROP TABLE IF EXISTS `ai_diseases`;
CREATE TABLE `ai_diseases`  (
  `diseaseId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `typeId` int(11) NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `need_value` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`diseaseId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_diseases
-- ----------------------------
INSERT INTO `ai_diseases` VALUES (1, 1, 'Alimentos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (2, 1, 'Medicamentos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (3, 1, 'Picaduras de insectos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (4, 1, 'Otros', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (5, 1, 'Medicamento de control diario (prevenci&oacute;n).', 2, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (6, 1, 'Medicamento seg&uacute;n necesidad (rescate).', 2, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (7, 1, 'Debido a malestar gastrointestinal (digestivo).', 3, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (8, 1, 'Por preferencias religiosas o de otra &iacute;ndole.', 3, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (9, 1, 'Anteojos', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (10, 1, 'Lentes de contacto', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (11, 1, 'Irreversibles', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (12, 1, 'Otros', 4, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (13, 1, 'Aud&iacute;fonos', 5, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (14, 1, 'Irreversibles', 5, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (15, 1, 'Otros', 5, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (16, 1, 'TDAH', 6, 'Trastorno por D&eacute;ficit de Atenci&oacute;n con Hiperactividad', 0, 0);
INSERT INTO `ai_diseases` VALUES (17, 1, 'Autismo', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (18, 1, 'Par&aacute;lisis cerebral', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (19, 1, 'Retraso en el desarrollo', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (20, 1, 'Hemofilia', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (21, 1, 'Cardiopat&iacute;a cong&eacute;nita', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (22, 1, 'Fibrosis qu&iacute;stica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (23, 1, 'Trastornos nutricionales', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (24, 1, 'Discapacidad f&iacute;sica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (25, 1, 'C&aacute;ncer', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (26, 1, 'Infecci&oacute;n cr&oacute;nica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (27, 1, 'Depresi&oacute;n', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (28, 1, 'Alimentos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (29, 1, 'Medicamentos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (30, 1, 'Picaduras de insectos', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (31, 1, 'Otros', 1, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (32, 1, 'Medicamento de control diario (prevenci&oacute;n).', 2, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (33, 1, 'Medicamento seg&uacute;n necesidad (rescate).', 2, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (34, 1, 'Debido a malestar gastrointestinal (digestivo).', 3, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (35, 1, 'Por preferencias religiosas o de otra &iacute;ndole.', 3, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (36, 1, 'Anteojos', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (37, 1, 'Lentes de contacto', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (38, 1, 'Irreversibles', 4, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (39, 1, 'Otros', 4, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (40, 1, 'Aud&iacute;fonos', 5, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (41, 1, 'Irreversibles', 5, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (42, 1, 'Otros', 5, '', 0, 1);
INSERT INTO `ai_diseases` VALUES (43, 1, 'TDAH', 6, 'Trastorno por D&eacute;ficit de Atenci&oacute;n con Hiperactividad', 0, 0);
INSERT INTO `ai_diseases` VALUES (44, 1, 'Autismo', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (45, 1, 'Par&aacute;lisis cerebral', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (46, 1, 'Retraso en el desarrollo', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (47, 1, 'Hemofilia', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (48, 1, 'Cardiopat&iacute;a cong&eacute;nita', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (49, 1, 'Fibrosis qu&iacute;stica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (50, 1, 'Trastornos nutricionales', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (51, 1, 'Discapacidad f&iacute;sica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (52, 1, 'C&aacute;ncer', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (53, 1, 'Infecci&oacute;n cr&oacute;nica', 6, '', 0, 0);
INSERT INTO `ai_diseases` VALUES (54, 1, 'Depresi&oacute;n', 6, '', 0, 0);

-- ----------------------------
-- Table structure for ai_diseases_types
-- ----------------------------
DROP TABLE IF EXISTS `ai_diseases_types`;
CREATE TABLE `ai_diseases_types`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_diseases_types
-- ----------------------------
INSERT INTO `ai_diseases_types` VALUES (1, 'Alergias', 0);
INSERT INTO `ai_diseases_types` VALUES (2, 'Asma', 0);
INSERT INTO `ai_diseases_types` VALUES (3, 'Restricciones de alimentos', 0);
INSERT INTO `ai_diseases_types` VALUES (4, 'Afecciones de la vista', 0);
INSERT INTO `ai_diseases_types` VALUES (5, 'Afecciones auditivas', 0);
INSERT INTO `ai_diseases_types` VALUES (6, 'Otras afecciones de salud', 0);

-- ----------------------------
-- Table structure for ai_docs
-- ----------------------------
DROP TABLE IF EXISTS `ai_docs`;
CREATE TABLE `ai_docs`  (
  `docId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NOT NULL DEFAULT 0,
  `userId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_size` decimal(10, 0) NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `moduleId` int(11) NOT NULL DEFAULT 0,
  `documentId` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`docId`) USING BTREE,
  UNIQUE INDEX `docId`(`docId`) USING BTREE,
  INDEX `companyId_index`(`schoolId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22100 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_docs
-- ----------------------------

-- ----------------------------
-- Table structure for ai_employees
-- ----------------------------
DROP TABLE IF EXISTS `ai_employees`;
CREATE TABLE `ai_employees`  (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doc_typeId` int(11) NULL DEFAULT 0,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `statusId` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` date NULL DEFAULT NULL,
  `positionId` int(11) NULL DEFAULT 0,
  `position_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `birthday` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`employeeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_employees
-- ----------------------------

-- ----------------------------
-- Table structure for ai_events_recipients
-- ----------------------------
DROP TABLE IF EXISTS `ai_events_recipients`;
CREATE TABLE `ai_events_recipients`  (
  `recipientId` int(11) NOT NULL,
  `typeId` int(11) NULL DEFAULT NULL,
  `eventId` int(11) NULL DEFAULT NULL,
  `active` tinyint(255) NULL DEFAULT NULL,
  `all` tinyint(255) NULL DEFAULT NULL,
  `recipients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`recipientId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_events_recipients
-- ----------------------------

-- ----------------------------
-- Table structure for ai_expenses
-- ----------------------------
DROP TABLE IF EXISTS `ai_expenses`;
CREATE TABLE `ai_expenses`  (
  `expenseId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `userId` int(11) NULL DEFAULT 0,
  `statusId` int(11) NULL DEFAULT 0,
  `date` date NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `studentId` int(11) NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `amount` decimal(11, 2) NULL DEFAULT NULL,
  `balance` decimal(11, 2) NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `docId` int(11) NULL DEFAULT NULL,
  `number` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`expenseId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_expenses
-- ----------------------------
INSERT INTO `ai_expenses` VALUES (1, 1, 0, 1, NULL, '2020-04-25 02:55:07', 0, NULL, NULL, NULL, 1, NULL, 0);

-- ----------------------------
-- Table structure for ai_expenses_status
-- ----------------------------
DROP TABLE IF EXISTS `ai_expenses_status`;
CREATE TABLE `ai_expenses_status`  (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_expenses_status
-- ----------------------------
INSERT INTO `ai_expenses_status` VALUES (1, 'Borrador', 'default', 0);
INSERT INTO `ai_expenses_status` VALUES (2, 'No Pagada', 'danger', 0);
INSERT INTO `ai_expenses_status` VALUES (3, 'Parcial', 'warning', 0);
INSERT INTO `ai_expenses_status` VALUES (4, 'Pagada', 'primary', 0);
INSERT INTO `ai_expenses_status` VALUES (5, 'Anulada', 'inverse', 0);

-- ----------------------------
-- Table structure for ai_expenses_types
-- ----------------------------
DROP TABLE IF EXISTS `ai_expenses_types`;
CREATE TABLE `ai_expenses_types`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_expenses_types
-- ----------------------------
INSERT INTO `ai_expenses_types` VALUES (1, 1, 'Alquiler', 0);
INSERT INTO `ai_expenses_types` VALUES (2, 1, 'Mantenimiento', 0);
INSERT INTO `ai_expenses_types` VALUES (3, 1, 'Seguros', 0);
INSERT INTO `ai_expenses_types` VALUES (4, 1, 'Tarjeta de cr&eacute;dito', 0);
INSERT INTO `ai_expenses_types` VALUES (5, 1, 'Prestamos', 0);
INSERT INTO `ai_expenses_types` VALUES (6, 1, 'Impuestos', 0);
INSERT INTO `ai_expenses_types` VALUES (7, 1, 'Salarios', 0);
INSERT INTO `ai_expenses_types` VALUES (8, 1, 'Cuentas por pagar Proveedores', 0);
INSERT INTO `ai_expenses_types` VALUES (9, 1, 'Transporte', 0);
INSERT INTO `ai_expenses_types` VALUES (10, 1, 'Material Gastable de Oficina', 0);
INSERT INTO `ai_expenses_types` VALUES (11, 1, 'Comunicaciones', 0);
INSERT INTO `ai_expenses_types` VALUES (12, 1, 'Gastos de Viajes', 0);
INSERT INTO `ai_expenses_types` VALUES (13, 1, 'Agua', 0);
INSERT INTO `ai_expenses_types` VALUES (14, 1, 'Energ&iacute;a El&eacute;ctrica', 0);
INSERT INTO `ai_expenses_types` VALUES (15, 1, 'Publicidad y Mercadeo', 0);
INSERT INTO `ai_expenses_types` VALUES (16, 1, 'Combustible', 0);
INSERT INTO `ai_expenses_types` VALUES (17, 1, 'Alquiler', 0);
INSERT INTO `ai_expenses_types` VALUES (18, 1, 'Mantenimiento', 0);
INSERT INTO `ai_expenses_types` VALUES (19, 1, 'Seguros', 0);
INSERT INTO `ai_expenses_types` VALUES (20, 1, 'Tarjeta de cr&eacute;dito', 0);
INSERT INTO `ai_expenses_types` VALUES (21, 1, 'Prestamos', 0);
INSERT INTO `ai_expenses_types` VALUES (22, 1, 'Impuestos', 0);
INSERT INTO `ai_expenses_types` VALUES (23, 1, 'Salarios', 0);
INSERT INTO `ai_expenses_types` VALUES (24, 1, 'Cuentas por pagar Proveedores', 0);
INSERT INTO `ai_expenses_types` VALUES (25, 1, 'Transporte', 0);
INSERT INTO `ai_expenses_types` VALUES (26, 1, 'Material Gastable de Oficina', 0);
INSERT INTO `ai_expenses_types` VALUES (27, 1, 'Comunicaciones', 0);
INSERT INTO `ai_expenses_types` VALUES (28, 1, 'Gastos de Viajes', 0);
INSERT INTO `ai_expenses_types` VALUES (29, 1, 'Agua', 0);
INSERT INTO `ai_expenses_types` VALUES (30, 1, 'Energ&iacute;a El&eacute;ctrica', 0);
INSERT INTO `ai_expenses_types` VALUES (31, 1, 'Publicidad y Mercadeo', 0);
INSERT INTO `ai_expenses_types` VALUES (32, 1, 'Combustible', 0);

-- ----------------------------
-- Table structure for ai_feedback
-- ----------------------------
DROP TABLE IF EXISTS `ai_feedback`;
CREATE TABLE `ai_feedback`  (
  `feedbackId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `userId` int(11) NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posted` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`feedbackId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_feedback
-- ----------------------------
INSERT INTO `ai_feedback` VALUES (32, 1, 1, 'edelacruz9713@gmail.com', 'Jesus De La Cruz', 'Necesitan agregar mas opciones', 0, 0);

-- ----------------------------
-- Table structure for ai_incomes_types
-- ----------------------------
DROP TABLE IF EXISTS `ai_incomes_types`;
CREATE TABLE `ai_incomes_types`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_incomes_types
-- ----------------------------
INSERT INTO `ai_incomes_types` VALUES (1, 1, 'Pago del a&ntilde;o escolar', 0);
INSERT INTO `ai_incomes_types` VALUES (2, 1, 'Guarderia', 0);
INSERT INTO `ai_incomes_types` VALUES (3, 1, 'Alquiler de equipos', 0);
INSERT INTO `ai_incomes_types` VALUES (4, 1, 'Pago del a&ntilde;o escolar', 0);
INSERT INTO `ai_incomes_types` VALUES (5, 1, 'Guarderia', 0);
INSERT INTO `ai_incomes_types` VALUES (6, 1, 'Alquiler de equipos', 0);

-- ----------------------------
-- Table structure for ai_inventory
-- ----------------------------
DROP TABLE IF EXISTS `ai_inventory`;
CREATE TABLE `ai_inventory`  (
  `inventoryId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `studentId` int(11) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT 0.00,
  `belongs_to_student` tinyint(1) NULL DEFAULT 0,
  `for_sale` tinyint(1) NULL DEFAULT 0,
  `product_in_invoice` tinyint(1) NULL DEFAULT NULL,
  `income_typeId` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `typeId` int(11) NULL DEFAULT 0,
  `purchase` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`inventoryId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_inventory
-- ----------------------------
INSERT INTO `ai_inventory` VALUES (1, 1, 'Pago del a&ntilde;o escolar', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);
INSERT INTO `ai_inventory` VALUES (2, 1, 'Guarderia', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);
INSERT INTO `ai_inventory` VALUES (3, 1, 'Alquiler de equipos', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);
INSERT INTO `ai_inventory` VALUES (4, 1, 'Pago del a&ntilde;o escolar', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);
INSERT INTO `ai_inventory` VALUES (5, 1, 'Guarderia', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);
INSERT INTO `ai_inventory` VALUES (6, 1, 'Alquiler de equipos', NULL, NULL, 0, NULL, '2020-06-11 10:24:43', 0.00, 0, 1, 1, 0, 0, 2, 0);

-- ----------------------------
-- Table structure for ai_inventory_entries
-- ----------------------------
DROP TABLE IF EXISTS `ai_inventory_entries`;
CREATE TABLE `ai_inventory_entries`  (
  `entryId` int(11) NOT NULL AUTO_INCREMENT,
  `inventoryId` int(11) NULL DEFAULT 0,
  `typeId` int(11) NULL DEFAULT 0,
  `quantity` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`entryId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_inventory_entries
-- ----------------------------

-- ----------------------------
-- Table structure for ai_inventory_type
-- ----------------------------
DROP TABLE IF EXISTS `ai_inventory_type`;
CREATE TABLE `ai_inventory_type`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_inventory_type
-- ----------------------------
INSERT INTO `ai_inventory_type` VALUES (1, 'Inventario Inicial');
INSERT INTO `ai_inventory_type` VALUES (2, 'Venta');
INSERT INTO `ai_inventory_type` VALUES (3, 'Compras');
INSERT INTO `ai_inventory_type` VALUES (4, 'Devolución de Venta');
INSERT INTO `ai_inventory_type` VALUES (5, 'Devolución de Compras');
INSERT INTO `ai_inventory_type` VALUES (6, 'Ajuste de inventario');
INSERT INTO `ai_inventory_type` VALUES (7, 'Nota de crédito');

-- ----------------------------
-- Table structure for ai_invoices
-- ----------------------------
DROP TABLE IF EXISTS `ai_invoices`;
CREATE TABLE `ai_invoices`  (
  `invoiceId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `userId` int(11) NULL DEFAULT 0,
  `statusId` int(11) NULL DEFAULT 0,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `number` int(11) NULL DEFAULT 0,
  `familyId` int(11) NULL DEFAULT 0,
  `amount` decimal(11, 2) NULL DEFAULT NULL,
  `discount` decimal(11, 2) NULL DEFAULT NULL,
  `tax_amount` decimal(11, 2) NULL DEFAULT NULL,
  `sub_amount` decimal(11, 2) NULL DEFAULT NULL,
  `parentId` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`invoiceId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_invoices
-- ----------------------------
INSERT INTO `ai_invoices` VALUES (1, 1, 0, 1, '2020-05-04 00:11:42', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 1);
INSERT INTO `ai_invoices` VALUES (2, 1, 0, 1, '2020-05-04 21:44:10', '2020-05-04', NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 1);
INSERT INTO `ai_invoices` VALUES (3, 1, 0, 2, '2020-05-17 09:55:44', '2020-05-17', '', 1007, 0, 50401.30, 750.00, 150.00, 0.00, 2, 0);
INSERT INTO `ai_invoices` VALUES (4, 1, 0, 1, '2020-05-18 12:11:37', '2020-05-18', NULL, 0, 0, NULL, NULL, NULL, NULL, 0, 1);

-- ----------------------------
-- Table structure for ai_invoices_items
-- ----------------------------
DROP TABLE IF EXISTS `ai_invoices_items`;
CREATE TABLE `ai_invoices_items`  (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceId` int(11) NULL DEFAULT 0,
  `typeId` int(11) NULL DEFAULT 0,
  `productId` int(11) NULL DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT 0,
  `price` decimal(11, 2) NULL DEFAULT 0.00,
  `discount` decimal(11, 2) NULL DEFAULT 0.00,
  `tax_amount` decimal(11, 2) NULL DEFAULT 0.00,
  `amount` decimal(11, 2) NULL DEFAULT 0.00,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`itemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_invoices_items
-- ----------------------------
INSERT INTO `ai_invoices_items` VALUES (5, 3, 1, 1, 'asdasdasdadsad', 2, 25500.65, 750.00, 150.00, 50401.30, 0);

-- ----------------------------
-- Table structure for ai_invoices_status
-- ----------------------------
DROP TABLE IF EXISTS `ai_invoices_status`;
CREATE TABLE `ai_invoices_status`  (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_invoices_status
-- ----------------------------
INSERT INTO `ai_invoices_status` VALUES (1, 'Borrador', 'default', 0);
INSERT INTO `ai_invoices_status` VALUES (2, 'No Pagada', 'danger', 0);
INSERT INTO `ai_invoices_status` VALUES (3, 'Parcial', 'warning', 0);
INSERT INTO `ai_invoices_status` VALUES (4, 'Pagada', 'primary', 0);
INSERT INTO `ai_invoices_status` VALUES (5, 'Anulada', 'inverse', 0);

-- ----------------------------
-- Table structure for ai_languages
-- ----------------------------
DROP TABLE IF EXISTS `ai_languages`;
CREATE TABLE `ai_languages`  (
  `languageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(49) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `code` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`languageId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_languages
-- ----------------------------
INSERT INTO `ai_languages` VALUES (1, 'Inglés', 'en');
INSERT INTO `ai_languages` VALUES (2, 'Español', 'es');

-- ----------------------------
-- Table structure for ai_modules
-- ----------------------------
DROP TABLE IF EXISTS `ai_modules`;
CREATE TABLE `ai_modules`  (
  `moduleId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`moduleId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_modules
-- ----------------------------
INSERT INTO `ai_modules` VALUES (1, 'Dashboard');
INSERT INTO `ai_modules` VALUES (2, 'Estudiantes');
INSERT INTO `ai_modules` VALUES (3, 'Docentes');
INSERT INTO `ai_modules` VALUES (4, 'Calendario');
INSERT INTO `ai_modules` VALUES (5, 'Facturas');
INSERT INTO `ai_modules` VALUES (6, 'Recibo de Ingresos');
INSERT INTO `ai_modules` VALUES (7, 'Gastos / Compras');
INSERT INTO `ai_modules` VALUES (8, 'Pagos');
INSERT INTO `ai_modules` VALUES (9, 'Usuarios');
INSERT INTO `ai_modules` VALUES (10, 'Empleados');
INSERT INTO `ai_modules` VALUES (11, 'Inventario');
INSERT INTO `ai_modules` VALUES (12, 'Reportes');
INSERT INTO `ai_modules` VALUES (13, 'Configuración');
INSERT INTO `ai_modules` VALUES (14, 'Padres / Tutores');

-- ----------------------------
-- Table structure for ai_parents
-- ----------------------------
DROP TABLE IF EXISTS `ai_parents`;
CREATE TABLE `ai_parents`  (
  `parentId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `doc_typeId` int(11) NULL DEFAULT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`parentId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_parents
-- ----------------------------
INSERT INTO `ai_parents` VALUES (1, 1, 'Jesus Enmanuel', 'De La Cruz', 1, '40200365167', 'edelacruz9713@gmail.com', '(809) 906-0295', '(809) 906-0295', NULL, 'https://res.cloudinary.com/edelacruz9713/image/upload/v1592748745/parents/Aventuritas/jesus-enmanuel2.jpg', 0);
INSERT INTO `ai_parents` VALUES (2, 1, 'Luisa Marias', 'Martinez', 1, '402-0036516-8', 'luisam.m713@gmail.com', '(809) 568-7476', '(809) 568-7476', '2020-06-20 15:25:24', '', 0);
INSERT INTO `ai_parents` VALUES (3, 1, 'Luis Miguel', 'Martinez', 1, '001-0861224-3', 'lm.2019@gmail.com', '(809) 906-0295', '(809) 906-0295', '2020-06-21 10:02:24', NULL, 1);

-- ----------------------------
-- Table structure for ai_parents_childrens
-- ----------------------------
DROP TABLE IF EXISTS `ai_parents_childrens`;
CREATE TABLE `ai_parents_childrens`  (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NULL DEFAULT 0,
  `studentId` int(11) NULL DEFAULT NULL,
  `relationshipId` int(11) NULL DEFAULT 0,
  `in_charge` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`itemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_parents_childrens
-- ----------------------------
INSERT INTO `ai_parents_childrens` VALUES (1, 1, 5, 1, 1, 0);
INSERT INTO `ai_parents_childrens` VALUES (2, 2, 5, 2, 0, 0);

-- ----------------------------
-- Table structure for ai_payment_types
-- ----------------------------
DROP TABLE IF EXISTS `ai_payment_types`;
CREATE TABLE `ai_payment_types`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE,
  INDEX `index_typeId`(`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_payment_types
-- ----------------------------
INSERT INTO `ai_payment_types` VALUES (1, 'Cheque', 0);
INSERT INTO `ai_payment_types` VALUES (2, 'Efectivo', 0);
INSERT INTO `ai_payment_types` VALUES (3, 'Déposito', 0);
INSERT INTO `ai_payment_types` VALUES (4, 'Transferencia', 0);
INSERT INTO `ai_payment_types` VALUES (5, 'Tarjeta', 0);
INSERT INTO `ai_payment_types` VALUES (6, 'Paypal', 0);
INSERT INTO `ai_payment_types` VALUES (7, 'Débito automático', 0);

-- ----------------------------
-- Table structure for ai_payments
-- ----------------------------
DROP TABLE IF EXISTS `ai_payments`;
CREATE TABLE `ai_payments`  (
  `paymentId` int(11) NOT NULL AUTO_INCREMENT,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `statusId` int(11) NULL DEFAULT 0,
  `schoolId` int(11) NULL DEFAULT 0,
  `number` int(10) NULL DEFAULT 0,
  PRIMARY KEY (`paymentId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_payments
-- ----------------------------

-- ----------------------------
-- Table structure for ai_plans
-- ----------------------------
DROP TABLE IF EXISTS `ai_plans`;
CREATE TABLE `ai_plans`  (
  `planId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `user_qty` int(11) NULL DEFAULT 0,
  `user_price` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`planId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_plans
-- ----------------------------
INSERT INTO `ai_plans` VALUES (1, 'Bronze', 'Basic', 24.00, 3, 8.00);
INSERT INTO `ai_plans` VALUES (2, 'Silver', 'Standard', 36.00, 3, 12.00);
INSERT INTO `ai_plans` VALUES (3, 'Gold', 'Premium', 48.00, 3, 16.00);

-- ----------------------------
-- Table structure for ai_positions
-- ----------------------------
DROP TABLE IF EXISTS `ai_positions`;
CREATE TABLE `ai_positions`  (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `schoolId` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`positionId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_positions
-- ----------------------------
INSERT INTO `ai_positions` VALUES (1, 'Cocinero(a)', 0, 1);
INSERT INTO `ai_positions` VALUES (2, 'Portero(a)', 0, 1);
INSERT INTO `ai_positions` VALUES (3, 'Secretaria(o)', 0, 1);
INSERT INTO `ai_positions` VALUES (4, 'Chofer', 0, 1);
INSERT INTO `ai_positions` VALUES (5, 'Asistente Administrativo', 0, 1);
INSERT INTO `ai_positions` VALUES (6, 'Docente', 0, 1);
INSERT INTO `ai_positions` VALUES (7, 'Otros', 0, 1);
INSERT INTO `ai_positions` VALUES (8, 'Cocinero(a)', 0, 1);
INSERT INTO `ai_positions` VALUES (9, 'Portero(a)', 0, 1);
INSERT INTO `ai_positions` VALUES (10, 'Secretaria(o)', 0, 1);
INSERT INTO `ai_positions` VALUES (11, 'Chofer', 0, 1);
INSERT INTO `ai_positions` VALUES (12, 'Asistente Administrativo', 0, 1);
INSERT INTO `ai_positions` VALUES (13, 'Docente', 0, 1);
INSERT INTO `ai_positions` VALUES (14, 'Otros', 0, 1);

-- ----------------------------
-- Table structure for ai_product_units_types
-- ----------------------------
DROP TABLE IF EXISTS `ai_product_units_types`;
CREATE TABLE `ai_product_units_types`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `code` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_product_units_types
-- ----------------------------
INSERT INTO `ai_product_units_types` VALUES (1, 'Peso', '01');
INSERT INTO `ai_product_units_types` VALUES (2, 'Longitud', '02');
INSERT INTO `ai_product_units_types` VALUES (3, 'Volumen', '03');
INSERT INTO `ai_product_units_types` VALUES (4, 'Unidad', '04');
INSERT INTO `ai_product_units_types` VALUES (5, 'Tiempo', '05');

-- ----------------------------
-- Table structure for ai_receipt_income
-- ----------------------------
DROP TABLE IF EXISTS `ai_receipt_income`;
CREATE TABLE `ai_receipt_income`  (
  `receiptId` int(11) NOT NULL AUTO_INCREMENT,
  `statusId` int(11) NULL DEFAULT 0,
  `number` int(11) NULL DEFAULT 0,
  `schoolId` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`receiptId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_receipt_income
-- ----------------------------

-- ----------------------------
-- Table structure for ai_relationships
-- ----------------------------
DROP TABLE IF EXISTS `ai_relationships`;
CREATE TABLE `ai_relationships`  (
  `relationshipId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`relationshipId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_relationships
-- ----------------------------
INSERT INTO `ai_relationships` VALUES (1, 'Padre', 0);
INSERT INTO `ai_relationships` VALUES (2, 'Madre', 0);
INSERT INTO `ai_relationships` VALUES (3, 'Abuelo (a)', 0);
INSERT INTO `ai_relationships` VALUES (4, 'Hermano (a)', 0);
INSERT INTO `ai_relationships` VALUES (5, 'Tío (a)', 0);
INSERT INTO `ai_relationships` VALUES (6, 'Tutor (a)', 0);
INSERT INTO `ai_relationships` VALUES (7, 'Primo (a)', 0);

-- ----------------------------
-- Table structure for ai_schools
-- ----------------------------
DROP TABLE IF EXISTS `ai_schools`;
CREATE TABLE `ai_schools`  (
  `schoolId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `countryId` int(11) NULL DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `slogan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `statusId` int(11) NULL DEFAULT 0,
  `expiracy_date` date NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `initial_settings` tinyint(1) NULL DEFAULT 0,
  `start_school_year` date NULL DEFAULT NULL,
  `end_school_year` date NULL DEFAULT NULL,
  `planId` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`schoolId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_schools
-- ----------------------------
INSERT INTO `ai_schools` VALUES (1, 0, 'Aventuritas', 'aventuritas', '(809) 906-0295', NULL, 'edelacruz9713@gmail.com', NULL, '2020-06-11 10:15:49', 1, '', 'Donde tus sueños se hacen realidad', NULL, NULL, 1, '2020-07-11', 0, 1, '2020-01-01', '2020-12-31', 2);

-- ----------------------------
-- Table structure for ai_settings
-- ----------------------------
DROP TABLE IF EXISTS `ai_settings`;
CREATE TABLE `ai_settings`  (
  `settingId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `currencyId` int(11) NULL DEFAULT NULL,
  `language` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`settingId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_settings
-- ----------------------------
INSERT INTO `ai_settings` VALUES (1, 1, 1, 'es', 0);

-- ----------------------------
-- Table structure for ai_sex
-- ----------------------------
DROP TABLE IF EXISTS `ai_sex`;
CREATE TABLE `ai_sex`  (
  `sexId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`sexId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_sex
-- ----------------------------
INSERT INTO `ai_sex` VALUES (1, 'Masculino', 0);
INSERT INTO `ai_sex` VALUES (2, 'Femenino', 0);

-- ----------------------------
-- Table structure for ai_student_address
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_address`;
CREATE TABLE `ai_student_address`  (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NULL DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `main` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`addressId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_student_address
-- ----------------------------

-- ----------------------------
-- Table structure for ai_student_diseases
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_diseases`;
CREATE TABLE `ai_student_diseases`  (
  `diseaseId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL DEFAULT 0,
  `typeId` int(11) NULL DEFAULT 0,
  `last_reaction` date NULL DEFAULT NULL,
  `last_visit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `treatment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`diseaseId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_student_diseases
-- ----------------------------

-- ----------------------------
-- Table structure for ai_student_diseases_items
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_diseases_items`;
CREATE TABLE `ai_student_diseases_items`  (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `diseaseId` int(11) NOT NULL DEFAULT 0,
  `key` int(11) NULL DEFAULT 0,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `key_parent` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`itemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_student_diseases_items
-- ----------------------------

-- ----------------------------
-- Table structure for ai_students
-- ----------------------------
DROP TABLE IF EXISTS `ai_students`;
CREATE TABLE `ai_students`  (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `birthday` date NULL DEFAULT NULL,
  `years_old` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `sexId` int(11) NULL DEFAULT 0,
  `blood_groupId` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`studentId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_students
-- ----------------------------
INSERT INTO `ai_students` VALUES (1, 1, NULL, NULL, '', '2020-06-14 10:35:56', '2020-06-14', '0', 0, 0, 0);
INSERT INTO `ai_students` VALUES (2, 1, NULL, NULL, '', '2020-06-15 21:26:30', '2020-06-15', '0', 0, 0, 0);
INSERT INTO `ai_students` VALUES (3, 1, NULL, NULL, '', '2020-06-20 13:01:43', '2020-06-20', '0', 0, 0, 0);
INSERT INTO `ai_students` VALUES (4, 1, NULL, NULL, '', '2020-06-20 13:14:26', '2020-06-20', '0', 0, 0, 0);
INSERT INTO `ai_students` VALUES (5, 1, NULL, NULL, '', '2020-06-20 13:52:46', '2020-06-20', '0', 0, 0, 0);
INSERT INTO `ai_students` VALUES (6, 1, NULL, NULL, '', '2020-06-30 20:57:58', '2020-06-30', '0', 0, 0, 1);

-- ----------------------------
-- Table structure for ai_teachers
-- ----------------------------
DROP TABLE IF EXISTS `ai_teachers`;
CREATE TABLE `ai_teachers`  (
  `teacherId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `statusId` int(11) NULL DEFAULT NULL,
  `doc_typeId` int(11) NULL DEFAULT 0,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `birthday` datetime(0) NULL DEFAULT NULL,
  `specialtyId` int(11) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`teacherId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_teachers
-- ----------------------------
INSERT INTO `ai_teachers` VALUES (1, 1, NULL, NULL, 1, 0, NULL, '', NULL, NULL, NULL, '2020-07-01 20:05:51', NULL, 0, 1);

-- ----------------------------
-- Table structure for ai_teachers_address
-- ----------------------------
DROP TABLE IF EXISTS `ai_teachers_address`;
CREATE TABLE `ai_teachers_address`  (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) NULL DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `main` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`addressId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_teachers_address
-- ----------------------------

-- ----------------------------
-- Table structure for ai_type_documents
-- ----------------------------
DROP TABLE IF EXISTS `ai_type_documents`;
CREATE TABLE `ai_type_documents`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_type_documents
-- ----------------------------
INSERT INTO `ai_type_documents` VALUES (1, 'Cédula', NULL, 0);
INSERT INTO `ai_type_documents` VALUES (2, 'Pasaporte', NULL, 0);
INSERT INTO `ai_type_documents` VALUES (3, 'Docente', NULL, 1);

-- ----------------------------
-- Table structure for ai_units
-- ----------------------------
DROP TABLE IF EXISTS `ai_units`;
CREATE TABLE `ai_units`  (
  `unitId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` int(11) NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `abbreviation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`unitId`) USING BTREE,
  INDEX `index_unitId`(`unitId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_units
-- ----------------------------
INSERT INTO `ai_units` VALUES (1, 1, 'Libras', 'LB', 'db_pounds');
INSERT INTO `ai_units` VALUES (2, 1, 'Onzas', 'ON', 'db_ounces');
INSERT INTO `ai_units` VALUES (3, 1, 'Gramos', 'GM', 'db_grams');
INSERT INTO `ai_units` VALUES (5, 1, 'Kilogramos', 'KG', 'db_kilograms');
INSERT INTO `ai_units` VALUES (6, 1, 'Miligramos', 'MG', 'db_milligrams');
INSERT INTO `ai_units` VALUES (7, 1, 'Quintales', 'QQ', 'db_quintales');
INSERT INTO `ai_units` VALUES (8, 1, 'Toneladas', 'TN', 'db_tons');
INSERT INTO `ai_units` VALUES (9, 2, 'Decímetro', 'DM', 'db_decimeter');
INSERT INTO `ai_units` VALUES (10, 2, 'Milímetro', 'PG', 'db_millimeter');
INSERT INTO `ai_units` VALUES (11, 2, 'Centímetro', 'FT', 'db_centimeter');
INSERT INTO `ai_units` VALUES (12, 2, 'Pulgada', 'MT', 'db_inch');
INSERT INTO `ai_units` VALUES (13, 2, 'Píe', 'YD', 'db_foot');
INSERT INTO `ai_units` VALUES (14, 3, 'Litros', 'L', 'db_liters');
INSERT INTO `ai_units` VALUES (15, 3, 'Onzas', 'OZ', 'db_ounces');
INSERT INTO `ai_units` VALUES (16, 3, 'Galones', 'GAL', 'db_gallons');
INSERT INTO `ai_units` VALUES (17, 3, 'Metros cúbicos', 'MC', 'db_cubic_meters');
INSERT INTO `ai_units` VALUES (18, 3, 'Mililitros', 'ML', 'db_milliliters');
INSERT INTO `ai_units` VALUES (19, 2, 'Metro', 'M', 'db_meter');
INSERT INTO `ai_units` VALUES (20, 2, 'Hectometro', 'HM', 'db_hectometer');
INSERT INTO `ai_units` VALUES (21, 2, 'Decametro', 'DM', 'db_decameter');
INSERT INTO `ai_units` VALUES (22, 2, 'Kilómetro', 'KM', 'db_kilometer');
INSERT INTO `ai_units` VALUES (23, 4, 'Unidad', 'DAM', 'db_unity');
INSERT INTO `ai_units` VALUES (24, 5, 'Hora', 'H', 'db_hour');
INSERT INTO `ai_units` VALUES (25, 5, 'Minutos', 'M', 'db_minutes');
INSERT INTO `ai_units` VALUES (34, 2, 'Yarda', 'Y', 'db_yard');

-- ----------------------------
-- Table structure for ai_users
-- ----------------------------
DROP TABLE IF EXISTS `ai_users`;
CREATE TABLE `ai_users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) NULL DEFAULT 0,
  `typeId` tinyint(1) NULL DEFAULT 0,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `statusId` tinyint(1) NULL DEFAULT 0,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `owner` tinyint(1) NOT NULL DEFAULT 0,
  `is_employee` tinyint(1) NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`userId`) USING BTREE,
  INDEX `userId_index`(`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_users
-- ----------------------------
INSERT INTO `ai_users` VALUES (1, 1, 1, 'edelacruz9713@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jesus Enmanuel', 'De La Cruz', 'edelacruz9713@gmail.com', '', '2020-06-11 10:15:49', NULL, NULL, 1, '', '', 1, 0, 0);

-- ----------------------------
-- Table structure for ai_users_status
-- ----------------------------
DROP TABLE IF EXISTS `ai_users_status`;
CREATE TABLE `ai_users_status`  (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_users_status
-- ----------------------------
INSERT INTO `ai_users_status` VALUES (1, 'Activo', 'primary', 0);
INSERT INTO `ai_users_status` VALUES (2, 'Inactivo', 'default', 1);
INSERT INTO `ai_users_status` VALUES (3, 'Bloqueado', 'warning', 0);

-- ----------------------------
-- Table structure for ai_users_type
-- ----------------------------
DROP TABLE IF EXISTS `ai_users_type`;
CREATE TABLE `ai_users_type`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_users_type
-- ----------------------------
INSERT INTO `ai_users_type` VALUES (1, 'Administrador(a)', NULL, 0);
INSERT INTO `ai_users_type` VALUES (2, 'Secretaria(o)', NULL, 0);
INSERT INTO `ai_users_type` VALUES (3, 'Docente', NULL, 0);
