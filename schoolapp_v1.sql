/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : schoolapp_v1

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 12/07/2020 11:59:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ad_users
-- ----------------------------
DROP TABLE IF EXISTS `ad_users`;
CREATE TABLE `ad_users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `typeId` tinyint(1) DEFAULT 0,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `last_login` datetime(0) DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `statusId` tinyint(1) DEFAULT 0,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`userId`) USING BTREE,
  INDEX `userId_index`(`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ad_users
-- ----------------------------
INSERT INTO `ad_users` VALUES (1, 1, 'edelacruz9713@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jesus Enmanuels', 'De La Cruz', 'edelacruz9713@gmail.com', '', NULL, '2020-03-10 18:03:17', '', 1, '', '', 0);
INSERT INTO `ad_users` VALUES (8, 1, 'sdfsdfsdf', 'e10adc3949ba59abbe56e057f20f883e', 'sadasd', 'asdasdsa', 'asdasdas@go.co', '', '2020-04-04 02:01:11', NULL, NULL, 1, '(888) 888-8888', '(989) 898-9898', 1);
INSERT INTO `ad_users` VALUES (9, 1, 'soporte_v4', 'e10adc3949ba59abbe56e057f20f883e', 'adasdasdasd', 'asdadadas', 'edelacruz97313@gmail.com', '', '2020-04-04 02:07:49', NULL, NULL, 1, '(123) 145-6456', '(564) 651-2312', 0);
INSERT INTO `ad_users` VALUES (11, 1, 'edelacruz9713', 'e10adc3949ba59abbe56e057f20f883e', 'Enmanuel', 'De La Cruz', 'edelacruz@pulsar.com.do', '', '2020-04-04 17:27:52', NULL, NULL, 1, '(809) 906-0295', '(809) 906-0295', 0);
INSERT INTO `ad_users` VALUES (12, 1, 'ffdsfsdf', '4297f44b13955235245b2497399d7a93', 'asdasdasdert654654', 'asdasdasd', 'el_alfa320@hotmail.es', '', '2020-04-04 17:31:50', NULL, NULL, 1, '(324) 324-3243', '(234) 234-2343', 0);
INSERT INTO `ad_users` VALUES (13, 2, 'esdfsdfdf', 'e10adc3949ba59abbe56e057f20f883e', 'mnbvcx', 'poiuytre33qwqw', 'el_alfa33320@hotmail.es', '', '2020-04-04 17:34:33', NULL, NULL, 3, '(123) 456-7898', '(123) 456-7887', 0);

-- ----------------------------
-- Table structure for ad_users_status
-- ----------------------------
DROP TABLE IF EXISTS `ad_users_status`;
CREATE TABLE `ad_users_status`  (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `class` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ad_users_status
-- ----------------------------
INSERT INTO `ad_users_status` VALUES (1, 'Activo', 'primary', 0);
INSERT INTO `ad_users_status` VALUES (2, 'Inactivo', 'default', 1);
INSERT INTO `ad_users_status` VALUES (3, 'Bloqueado', 'warning', 0);

-- ----------------------------
-- Table structure for ai_blood_groups
-- ----------------------------
DROP TABLE IF EXISTS `ai_blood_groups`;
CREATE TABLE `ai_blood_groups`  (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `typeId` int(11) DEFAULT 0,
  `schoolId` int(11) DEFAULT 0,
  `userId` int(11) DEFAULT 0,
  `title` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `repeat_type` tinyint(1) DEFAULT 0,
  `rrule` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `creation_date` date DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `send_reminder` tinyint(1) DEFAULT 0,
  `recipients` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
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
  `value` int(3) DEFAULT 0,
  `name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `text` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `rrule` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `schoolId` int(11) DEFAULT 0,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `color` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
-- Table structure for ai_countries
-- ----------------------------
DROP TABLE IF EXISTS `ai_countries`;
CREATE TABLE `ai_countries`  (
  `countryId` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `language` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `currencyId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`countryId`) USING BTREE,
  INDEX `countryId`(`countryId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 241 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_countries
-- ----------------------------
INSERT INTO `ai_countries` VALUES (1, 'DO', 'República Dominicana', 'es', 1, 0);
INSERT INTO `ai_countries` VALUES (2, 'US', 'Estados Unidos', 'en', 2, 0);
INSERT INTO `ai_countries` VALUES (3, 'AF', 'Afghanistan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (4, 'AL', 'Albania', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (5, 'DZ', 'Algeria', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (6, 'DS', 'American Samoa', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (7, 'AD', 'Andorra', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (8, 'AO', 'Angola', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (9, 'AI', 'Anguilla', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (10, 'AQ', 'Antarctica', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (11, 'AG', 'Antigua and/or Barbuda', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (12, 'AR', 'Argentina', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (13, 'AM', 'Armenia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (14, 'AW', 'Aruba', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (15, 'AU', 'Australia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (16, 'AT', 'Austria', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (17, 'AZ', 'Azerbaijan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (18, 'BS', 'Bahamas', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (19, 'BH', 'Bahrain', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (20, 'BD', 'Bangladesh', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (21, 'BB', 'Barbados', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (22, 'BY', 'Belarus', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (23, 'BE', 'Belgium', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (24, 'BZ', 'Belize', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (25, 'BJ', 'Benin', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (26, 'BM', 'Bermuda', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (27, 'BT', 'Bhutan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (28, 'BO', 'Bolivia', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (29, 'BA', 'Bosnia and Herzegovina', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (30, 'BW', 'Botswana', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (31, 'BV', 'Bouvet Island', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (32, 'BR', 'Brazil', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (33, 'IO', 'British lndian Ocean Territory', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (34, 'BN', 'Brunei Darussalam', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (35, 'BG', 'Bulgaria', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (36, 'BF', 'Burkina Faso', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (37, 'BI', 'Burundi', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (38, 'KH', 'Cambodia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (39, 'CM', 'Cameroon', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (40, 'CV', 'Cape Verde', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (41, 'KY', 'Cayman Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (42, 'CF', 'Central African Republic', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (43, 'TD', 'Chad', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (44, 'CL', 'Chile', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (45, 'CN', 'China', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (46, 'CX', 'Christmas Island', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (47, 'CC', 'Cocos (Keeling) Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (48, 'CO', 'Colombia', 'es-CO', 0, 1);
INSERT INTO `ai_countries` VALUES (49, 'KM', 'Comoros', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (50, 'CG', 'Congo', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (51, 'CK', 'Cook Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (52, 'CR', 'Costa Rica', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (53, 'HR', 'Croatia (Hrvatska)', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (54, 'CU', 'Cuba', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (55, 'CY', 'Cyprus', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (56, 'CZ', 'Czech Republic', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (57, 'DK', 'Denmark', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (58, 'DJ', 'Djibouti', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (59, 'DM', 'Dominica', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (60, 'CA', 'Canada', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (61, 'TP', 'East Timor', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (62, 'EC', 'Ecuador', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (63, 'EG', 'Egypt', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (64, 'SV', 'El Salvador', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (65, 'GQ', 'Equatorial Guinea', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (66, 'ER', 'Eritrea', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (67, 'EE', 'Estonia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (68, 'ET', 'Ethiopia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (69, 'FK', 'Falkland Islands (Malvinas)', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (70, 'FO', 'Faroe Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (71, 'FJ', 'Fiji', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (72, 'FI', 'Finland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (73, 'FR', 'France', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (74, 'FX', 'France, Metropolitan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (75, 'GF', 'French Guiana', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (76, 'PF', 'French Polynesia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (77, 'TF', 'French Southern Territories', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (78, 'GA', 'Gabon', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (79, 'GM', 'Gambia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (80, 'GE', 'Georgia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (81, 'DE', 'Germany', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (82, 'GH', 'Ghana', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (83, 'GI', 'Gibraltar', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (84, 'GR', 'Greece', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (85, 'GL', 'Greenland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (86, 'GD', 'Grenada', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (87, 'GP', 'Guadeloupe', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (88, 'GU', 'Guam', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (89, 'GT', 'Guatemala', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (90, 'GN', 'Guinea', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (91, 'GW', 'Guinea-Bissau', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (92, 'GY', 'Guyana', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (93, 'HT', 'Haiti', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (94, 'HM', 'Heard and Mc Donald Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (95, 'HN', 'Honduras', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (96, 'HK', 'Hong Kong', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (97, 'HU', 'Hungary', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (98, 'IS', 'Iceland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (99, 'IN', 'India', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (100, 'ID', 'Indonesia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (101, 'IR', 'Iran (Islamic Republic of)', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (102, 'IQ', 'Iraq', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (103, 'IE', 'Ireland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (104, 'IL', 'Israel', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (105, 'IT', 'Italy', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (106, 'CI', 'Ivory Coast', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (107, 'JM', 'Jamaica', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (108, 'JP', 'Japan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (109, 'JO', 'Jordan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (110, 'KZ', 'Kazakhstan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (111, 'KE', 'Kenya', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (112, 'KI', 'Kiribati', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (113, 'KP', 'Korea, Democratic Peoples Republic of', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (114, 'KR', 'Korea, Republic of', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (115, 'KW', 'Kuwait', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (116, 'KG', 'Kyrgyzstan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (117, 'LA', 'Lao People Democratic Republic', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (118, 'LV', 'Latvia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (119, 'LB', 'Lebanon', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (120, 'LS', 'Lesotho', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (121, 'LR', 'Liberia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (122, 'LY', 'Libyan Arab Jamahiriya', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (123, 'LI', 'Liechtenstein', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (124, 'LT', 'Lithuania', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (125, 'LU', 'Luxembourg', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (126, 'MO', 'Macau', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (127, 'MK', 'Macedonia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (128, 'MG', 'Madagascar', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (129, 'MW', 'Malawi', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (130, 'MY', 'Malaysia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (131, 'MV', 'Maldives', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (132, 'ML', 'Mali', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (133, 'MT', 'Malta', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (134, 'MH', 'Marshall Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (135, 'MQ', 'Martinique', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (136, 'MR', 'Mauritania', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (137, 'MU', 'Mauritius', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (138, 'TY', 'Mayotte', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (139, 'MX', 'México', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (140, 'FM', 'Micronesia, Federated States of', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (141, 'MD', 'Moldova, Republic of', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (142, 'MC', 'Monaco', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (143, 'MN', 'Mongolia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (144, 'MS', 'Montserrat', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (145, 'MA', 'Morocco', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (146, 'MZ', 'Mozambique', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (147, 'MM', 'Myanmar', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (148, 'NA', 'Namibia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (149, 'NR', 'Nauru', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (150, 'NP', 'Nepal', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (151, 'NL', 'Netherlands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (152, 'AN', 'Netherlands Antilles', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (153, 'NC', 'New Caledonia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (154, 'NZ', 'New Zealand', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (155, 'NI', 'Nicaragua', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (156, 'NE', 'Niger', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (157, 'NG', 'Nigeria', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (158, 'NU', 'Niue', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (159, 'NF', 'Norfork Island', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (160, 'MP', 'Northern Mariana Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (161, 'NO', 'Norway', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (162, 'OM', 'Oman', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (163, 'PK', 'Pakistan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (164, 'PW', 'Palau', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (165, 'PA', 'Panamá', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (166, 'PG', 'Papua New Guinea', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (167, 'PY', 'Paraguay', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (168, 'PE', 'Perú', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (169, 'PH', 'Philippines', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (170, 'PN', 'Pitcairn', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (171, 'PL', 'Poland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (172, 'PT', 'Portugal', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (173, 'PR', 'Puerto Rico', 'en', 2, 0);
INSERT INTO `ai_countries` VALUES (174, 'QA', 'Qatar', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (175, 'RE', 'Reunion', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (176, 'RO', 'Romania', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (177, 'RU', 'Russian Federation', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (178, 'RW', 'Rwanda', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (179, 'KN', 'Saint Kitts and Nevis', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (180, 'LC', 'Saint Lucia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (181, 'VC', 'Saint Vincent and the Grenadines', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (182, 'WS', 'Samoa', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (183, 'SM', 'San Marino', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (184, 'ST', 'Sao Tome and Principe', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (185, 'SA', 'Saudi Arabia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (186, 'SN', 'Senegal', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (187, 'SC', 'Seychelles', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (188, 'SL', 'Sierra Leone', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (189, 'SG', 'Singapore', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (190, 'SK', 'Slovakia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (191, 'SI', 'Slovenia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (192, 'SB', 'Solomon Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (193, 'SO', 'Somalia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (194, 'ZA', 'South Africa', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (195, 'GS', 'South Georgia South Sandwich Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (196, 'ES', 'España', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (197, 'LK', 'Sri Lanka', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (198, 'SH', 'St. Helena', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (199, 'PM', 'St. Pierre and Miquelon', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (200, 'SD', 'Sudan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (201, 'SR', 'Suriname', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (202, 'SJ', 'Svalbarn and Jan Mayen Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (203, 'SZ', 'Swaziland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (204, 'SE', 'Sweden', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (205, 'CH', 'Switzerland', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (206, 'SY', 'Syrian Arab Republic', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (207, 'TW', 'Taiwan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (208, 'TJ', 'Tajikistan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (209, 'TZ', 'Tanzania, United Republic of', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (210, 'TH', 'Thailand', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (211, 'TG', 'Togo', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (212, 'TK', 'Tokelau', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (213, 'TO', 'Tonga', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (214, 'TT', 'Trinidad and Tobago', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (215, 'TN', 'Tunisia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (216, 'TR', 'Turkey', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (217, 'TM', 'Turkmenistan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (218, 'TC', 'Turks and Caicos Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (219, 'TV', 'Tuvalu', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (220, 'UG', 'Uganda', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (221, 'UA', 'Ukraine', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (222, 'AE', 'United Arab Emirates', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (223, 'GB', 'United Kingdom', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (224, 'UM', 'United States minor outlying islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (225, 'UY', 'Uruguay', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (226, 'UZ', 'Uzbekistan', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (227, 'VU', 'Vanuatu', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (228, 'VA', 'Vatican City State', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (229, 'VE', 'Venezuela', 'es', 0, 1);
INSERT INTO `ai_countries` VALUES (230, 'VN', 'Vietnam', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (231, 'VG', 'Virigan Islands (British)', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (232, 'VI', 'Virgin Islands (U.S.)', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (233, 'WF', 'Wallis and Futuna Islands', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (234, 'EH', 'Western Sahara', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (235, 'YE', 'Yemen', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (236, 'YU', 'Yugoslavia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (237, 'ZR', 'Zaire', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (238, 'ZM', 'Zambia', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (239, 'ZW', 'Zimbabwe', 'en', 0, 1);
INSERT INTO `ai_countries` VALUES (240, 'ES', 'España', 'es', 0, 1);

-- ----------------------------
-- Table structure for ai_currency
-- ----------------------------
DROP TABLE IF EXISTS `ai_currency`;
CREATE TABLE `ai_currency`  (
  `currencyId` int(11) NOT NULL AUTO_INCREMENT,
  `currencyCode` varchar(3) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `full_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`currencyId`) USING BTREE,
  UNIQUE INDEX `currencyCode_index`(`currencyCode`) USING BTREE,
  INDEX `currencyId_index`(`currencyId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 169 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_currency
-- ----------------------------
INSERT INTO `ai_currency` VALUES (1, 'DOP', 'DOP', 'Dominican Peso', 1);
INSERT INTO `ai_currency` VALUES (2, 'USD', 'USD', 'United States Dollar', 1);
INSERT INTO `ai_currency` VALUES (3, 'AED', 'AED', 'United Arab Emirates Dirham', 0);
INSERT INTO `ai_currency` VALUES (4, 'AFN', 'AFN', 'Afghan Afghani', 0);
INSERT INTO `ai_currency` VALUES (5, 'ALL', 'ALL', 'Albanian Lek', 0);
INSERT INTO `ai_currency` VALUES (6, 'AMD', 'AMD', 'Armenian Dram', 0);
INSERT INTO `ai_currency` VALUES (7, 'ANG', 'ANG', 'Netherlands Antillean Guilder', 0);
INSERT INTO `ai_currency` VALUES (8, 'AOA', 'AOA', 'Angolan Kwanza', 0);
INSERT INTO `ai_currency` VALUES (9, 'ARS', 'ARS', 'Argentine Peso', 0);
INSERT INTO `ai_currency` VALUES (10, 'AUD', 'AUD', 'Australian Dollar', 0);
INSERT INTO `ai_currency` VALUES (11, 'AWG', 'AWG', 'Aruban Florin', 0);
INSERT INTO `ai_currency` VALUES (12, 'AZN', 'AZN', 'Azerbaijani Manat', 0);
INSERT INTO `ai_currency` VALUES (13, 'BAM', 'BAM', 'Bosnia-Herzegovina Convertible Mark', 0);
INSERT INTO `ai_currency` VALUES (14, 'BBD', 'BBD', 'Barbadian Dollar', 0);
INSERT INTO `ai_currency` VALUES (15, 'BDT', 'BDT', 'Bangladeshi Taka', 0);
INSERT INTO `ai_currency` VALUES (16, 'BGN', 'BGN', 'Bulgarian Lev', 0);
INSERT INTO `ai_currency` VALUES (17, 'BHD', 'BHD', 'Bahraini Dinar', 0);
INSERT INTO `ai_currency` VALUES (18, 'BIF', 'BIF', 'Burundian Franc', 0);
INSERT INTO `ai_currency` VALUES (19, 'BMD', 'BMD', 'Bermudan Dollar', 0);
INSERT INTO `ai_currency` VALUES (20, 'BND', 'BND', 'Brunei Dollar', 0);
INSERT INTO `ai_currency` VALUES (21, 'BOB', 'BOB', 'Bolivian Boliviano', 0);
INSERT INTO `ai_currency` VALUES (22, 'BRL', 'BRL', 'Brazilian Real', 0);
INSERT INTO `ai_currency` VALUES (23, 'BSD', 'BSD', 'Bahamian Dollar', 0);
INSERT INTO `ai_currency` VALUES (24, 'BTC', 'BTC', 'Bitcoin', 0);
INSERT INTO `ai_currency` VALUES (25, 'BTN', 'BTN', 'Bhutanese Ngultrum', 0);
INSERT INTO `ai_currency` VALUES (26, 'BWP', 'BWP', 'Botswanan Pula', 0);
INSERT INTO `ai_currency` VALUES (27, 'BYR', 'BYR', 'Belarusian Ruble', 0);
INSERT INTO `ai_currency` VALUES (28, 'BZD', 'BZD', 'Belize Dollar', 0);
INSERT INTO `ai_currency` VALUES (29, 'CAD', 'CAD', 'Canadian Dollar', 0);
INSERT INTO `ai_currency` VALUES (30, 'CDF', 'CDF', 'Congolese Franc', 0);
INSERT INTO `ai_currency` VALUES (31, 'CHF', 'CHF', 'Swiss Franc', 0);
INSERT INTO `ai_currency` VALUES (32, 'CLF', 'CLF', 'Chilean Unit of Account (UF)', 0);
INSERT INTO `ai_currency` VALUES (33, 'CLP', 'CLP', 'Chilean Peso', 0);
INSERT INTO `ai_currency` VALUES (34, 'CNY', 'CNY', 'Chinese Yuan', 0);
INSERT INTO `ai_currency` VALUES (35, 'COP', 'COP', 'Colombian Peso', 0);
INSERT INTO `ai_currency` VALUES (36, 'CRC', 'CRC', 'Costa Rican Colón', 0);
INSERT INTO `ai_currency` VALUES (37, 'CUP', 'CUP', 'Cuban Peso', 0);
INSERT INTO `ai_currency` VALUES (38, 'CVE', 'CVE', 'Cape Verdean Escudo', 0);
INSERT INTO `ai_currency` VALUES (39, 'CZK', 'CZK', 'Czech Republic Koruna', 0);
INSERT INTO `ai_currency` VALUES (40, 'DJF', 'DJF', 'Djiboutian Franc', 0);
INSERT INTO `ai_currency` VALUES (41, 'DKK', 'DKK', 'Danish Krone', 0);
INSERT INTO `ai_currency` VALUES (42, 'DZD', 'DZD', 'Algerian Dinar', 0);
INSERT INTO `ai_currency` VALUES (43, 'EEK', 'EEK', 'Estonian Kroon', 0);
INSERT INTO `ai_currency` VALUES (44, 'EGP', 'EGP', 'Egyptian Pound', 0);
INSERT INTO `ai_currency` VALUES (45, 'ERN', 'ERN', 'Eritrean Nakfa', 0);
INSERT INTO `ai_currency` VALUES (46, 'ETB', 'ETB', 'Ethiopian Birr', 0);
INSERT INTO `ai_currency` VALUES (47, 'EUR', 'EUR', 'Euro', 0);
INSERT INTO `ai_currency` VALUES (48, 'FJD', 'FJD', 'Fijian Dollar', 0);
INSERT INTO `ai_currency` VALUES (49, 'FKP', 'FKP', 'Falkland Islands Pound', 0);
INSERT INTO `ai_currency` VALUES (50, 'GBP', 'GBP', 'British Pound Sterling', 0);
INSERT INTO `ai_currency` VALUES (51, 'GEL', 'GEL', 'Georgian Lari', 0);
INSERT INTO `ai_currency` VALUES (52, 'GGP', 'GGP', 'Guernsey Pound', 0);
INSERT INTO `ai_currency` VALUES (53, 'GHS', 'GHS', 'Ghanaian Cedi', 0);
INSERT INTO `ai_currency` VALUES (54, 'GIP', 'GIP', 'Gibraltar Pound', 0);
INSERT INTO `ai_currency` VALUES (55, 'GMD', 'GMD', 'Gambian Dalasi', 0);
INSERT INTO `ai_currency` VALUES (56, 'GNF', 'GNF', 'Guinean Franc', 0);
INSERT INTO `ai_currency` VALUES (57, 'GTQ', 'GTQ', 'Guatemalan Quetzal', 0);
INSERT INTO `ai_currency` VALUES (58, 'GYD', 'GYD', 'Guyanaese Dollar', 0);
INSERT INTO `ai_currency` VALUES (59, 'HKD', 'HKD', 'Hong Kong Dollar', 0);
INSERT INTO `ai_currency` VALUES (60, 'HNL', 'HNL', 'Honduran Lempira', 0);
INSERT INTO `ai_currency` VALUES (61, 'HRK', 'HRK', 'Croatian Kuna', 0);
INSERT INTO `ai_currency` VALUES (62, 'HTG', 'HTG', 'Haitian Gourde', 0);
INSERT INTO `ai_currency` VALUES (63, 'HUF', 'HUF', 'Hungarian Forint', 0);
INSERT INTO `ai_currency` VALUES (64, 'IDR', 'IDR', 'Indonesian Rupiah', 0);
INSERT INTO `ai_currency` VALUES (65, 'ILS', 'ILS', 'Israeli New Sheqel', 0);
INSERT INTO `ai_currency` VALUES (66, 'IMP', 'IMP', 'Manx pound', 0);
INSERT INTO `ai_currency` VALUES (67, 'INR', 'INR', 'Indian Rupee', 0);
INSERT INTO `ai_currency` VALUES (68, 'IQD', 'IQD', 'Iraqi Dinar', 0);
INSERT INTO `ai_currency` VALUES (69, 'IRR', 'IRR', 'Iranian Rial', 0);
INSERT INTO `ai_currency` VALUES (70, 'ISK', 'ISK', 'Icelandic Króna', 0);
INSERT INTO `ai_currency` VALUES (71, 'JEP', 'JEP', 'Jersey Pound', 0);
INSERT INTO `ai_currency` VALUES (72, 'JMD', 'JMD', 'Jamaican Dollar', 0);
INSERT INTO `ai_currency` VALUES (73, 'JOD', 'JOD', 'Jordanian Dinar', 0);
INSERT INTO `ai_currency` VALUES (74, 'JPY', 'JPY', 'Japanese Yen', 0);
INSERT INTO `ai_currency` VALUES (75, 'KES', 'KES', 'Kenyan Shilling', 0);
INSERT INTO `ai_currency` VALUES (76, 'KGS', 'KGS', 'Kyrgystani Som', 0);
INSERT INTO `ai_currency` VALUES (77, 'KHR', 'KHR', 'Cambodian Riel', 0);
INSERT INTO `ai_currency` VALUES (78, 'KMF', 'KMF', 'Comorian Franc', 0);
INSERT INTO `ai_currency` VALUES (79, 'KPW', 'KPW', 'North Korean Won', 0);
INSERT INTO `ai_currency` VALUES (80, 'KRW', 'KRW', 'South Korean Won', 0);
INSERT INTO `ai_currency` VALUES (81, 'KWD', 'KWD', 'Kuwaiti Dinar', 0);
INSERT INTO `ai_currency` VALUES (82, 'KYD', 'KYD', 'Cayman Islands Dollar', 0);
INSERT INTO `ai_currency` VALUES (83, 'KZT', 'KZT', 'Kazakhstani Tenge', 0);
INSERT INTO `ai_currency` VALUES (84, 'LAK', 'LAK', 'Laotian Kip', 0);
INSERT INTO `ai_currency` VALUES (85, 'LBP', 'LBP', 'Lebanese Pound', 0);
INSERT INTO `ai_currency` VALUES (86, 'LKR', 'LKR', 'Sri Lankan Rupee', 0);
INSERT INTO `ai_currency` VALUES (87, 'LRD', 'LRD', 'Liberian Dollar', 0);
INSERT INTO `ai_currency` VALUES (88, 'LSL', 'LSL', 'Lesotho Loti', 0);
INSERT INTO `ai_currency` VALUES (89, 'LTL', 'LTL', 'Lithuanian Litas', 0);
INSERT INTO `ai_currency` VALUES (90, 'LVL', 'LVL', 'Latvian Lats', 0);
INSERT INTO `ai_currency` VALUES (91, 'LYD', 'LYD', 'Libyan Dinar', 0);
INSERT INTO `ai_currency` VALUES (92, 'MAD', 'MAD', 'Moroccan Dirham', 0);
INSERT INTO `ai_currency` VALUES (93, 'MDL', 'MDL', 'Moldovan Leu', 0);
INSERT INTO `ai_currency` VALUES (94, 'MGA', 'MGA', 'Malagasy Ariary', 0);
INSERT INTO `ai_currency` VALUES (95, 'MKD', 'MKD', 'Macedonian Denar', 0);
INSERT INTO `ai_currency` VALUES (96, 'MMK', 'MMK', 'Myanma Kyat', 0);
INSERT INTO `ai_currency` VALUES (97, 'MNT', 'MNT', 'Mongolian Tugrik', 0);
INSERT INTO `ai_currency` VALUES (98, 'MOP', 'MOP', 'Macanese Pataca', 0);
INSERT INTO `ai_currency` VALUES (99, 'MRO', 'MRO', 'Mauritanian Ouguiya', 0);
INSERT INTO `ai_currency` VALUES (100, 'MTL', 'MTL', 'Maltese Lira', 0);
INSERT INTO `ai_currency` VALUES (101, 'MUR', 'MUR', 'Mauritian Rupee', 0);
INSERT INTO `ai_currency` VALUES (102, 'MVR', 'MVR', 'Maldivian Rufiyaa', 0);
INSERT INTO `ai_currency` VALUES (103, 'MWK', 'MWK', 'Malawian Kwacha', 0);
INSERT INTO `ai_currency` VALUES (104, 'MXN', 'MXN', 'Mexican Peso', 0);
INSERT INTO `ai_currency` VALUES (105, 'MYR', 'MYR', 'Malaysian Ringgit', 0);
INSERT INTO `ai_currency` VALUES (106, 'MZN', 'MZN', 'Mozambican Metical', 0);
INSERT INTO `ai_currency` VALUES (107, 'NAD', 'NAD', 'Namibian Dollar', 0);
INSERT INTO `ai_currency` VALUES (108, 'NGN', 'NGN', 'Nigerian Naira', 0);
INSERT INTO `ai_currency` VALUES (109, 'NIO', 'NIO', 'Nicaraguan Córdoba', 0);
INSERT INTO `ai_currency` VALUES (110, 'NOK', 'NOK', 'Norwegian Krone', 0);
INSERT INTO `ai_currency` VALUES (111, 'NPR', 'NPR', 'Nepalese Rupee', 0);
INSERT INTO `ai_currency` VALUES (112, 'NZD', 'NZD', 'New Zealand Dollar', 0);
INSERT INTO `ai_currency` VALUES (113, 'OMR', 'OMR', 'Omani Rial', 0);
INSERT INTO `ai_currency` VALUES (114, 'PAB', 'PAB', 'Panamanian Balboa', 0);
INSERT INTO `ai_currency` VALUES (115, 'PEN', 'PEN', 'Peruvian Nuevo Sol', 0);
INSERT INTO `ai_currency` VALUES (116, 'PGK', 'PGK', 'Papua New Guinean Kina', 0);
INSERT INTO `ai_currency` VALUES (117, 'PHP', 'PHP', 'Philippine Peso', 0);
INSERT INTO `ai_currency` VALUES (118, 'PKR', 'PKR', 'Pakistani Rupee', 0);
INSERT INTO `ai_currency` VALUES (119, 'PLN', 'PLN', 'Polish Zloty', 0);
INSERT INTO `ai_currency` VALUES (120, 'PYG', 'PYG', 'Paraguayan Guarani', 0);
INSERT INTO `ai_currency` VALUES (121, 'QAR', 'QAR', 'Qatari Rial', 0);
INSERT INTO `ai_currency` VALUES (122, 'RON', 'RON', 'Romanian Leu', 0);
INSERT INTO `ai_currency` VALUES (123, 'RSD', 'RSD', 'Serbian Dinar', 0);
INSERT INTO `ai_currency` VALUES (124, 'RUB', 'RUB', 'Russian Ruble', 0);
INSERT INTO `ai_currency` VALUES (125, 'RWF', 'RWF', 'Rwandan Franc', 0);
INSERT INTO `ai_currency` VALUES (126, 'SAR', 'SAR', 'Saudi Riyal', 0);
INSERT INTO `ai_currency` VALUES (127, 'SBD', 'SBD', 'Solomon Islands Dollar', 0);
INSERT INTO `ai_currency` VALUES (128, 'SCR', 'SCR', 'Seychellois Rupee', 0);
INSERT INTO `ai_currency` VALUES (129, 'SDG', 'SDG', 'Sudanese Pound', 0);
INSERT INTO `ai_currency` VALUES (130, 'SEK', 'SEK', 'Swedish Krona', 0);
INSERT INTO `ai_currency` VALUES (131, 'SGD', 'SGD', 'Singapore Dollar', 0);
INSERT INTO `ai_currency` VALUES (132, 'SHP', 'SHP', 'Saint Helena Pound', 0);
INSERT INTO `ai_currency` VALUES (133, 'SLL', 'SLL', 'Sierra Leonean Leone', 0);
INSERT INTO `ai_currency` VALUES (134, 'SOS', 'SOS', 'Somali Shilling', 0);
INSERT INTO `ai_currency` VALUES (135, 'SRD', 'SRD', 'Surinamese Dollar', 0);
INSERT INTO `ai_currency` VALUES (136, 'STD', 'STD', 'São Tomé and Príncipe Dobra', 0);
INSERT INTO `ai_currency` VALUES (137, 'SVC', 'SVC', 'Salvadoran Colón', 0);
INSERT INTO `ai_currency` VALUES (138, 'SYP', 'SYP', 'Syrian Pound', 0);
INSERT INTO `ai_currency` VALUES (139, 'SZL', 'SZL', 'Swazi Lilangeni', 0);
INSERT INTO `ai_currency` VALUES (140, 'THB', 'THB', 'Thai Baht', 0);
INSERT INTO `ai_currency` VALUES (141, 'TJS', 'TJS', 'Tajikistani Somoni', 0);
INSERT INTO `ai_currency` VALUES (142, 'TMT', 'TMT', 'Turkmenistani Manat', 0);
INSERT INTO `ai_currency` VALUES (143, 'TND', 'TND', 'Tunisian Dinar', 0);
INSERT INTO `ai_currency` VALUES (144, 'TOP', 'TOP', 'Tongan Pa?anga', 0);
INSERT INTO `ai_currency` VALUES (145, 'TRY', 'TRY', 'Turkish Lira', 0);
INSERT INTO `ai_currency` VALUES (146, 'TTD', 'TTD', 'Trinidad and Tobago Dollar', 0);
INSERT INTO `ai_currency` VALUES (147, 'TWD', 'TWD', 'New Taiwan Dollar', 0);
INSERT INTO `ai_currency` VALUES (148, 'TZS', 'TZS', 'Tanzanian Shilling', 0);
INSERT INTO `ai_currency` VALUES (149, 'UAH', 'UAH', 'Ukrainian Hryvnia', 0);
INSERT INTO `ai_currency` VALUES (150, 'UGX', 'UGX', 'Ugandan Shilling', 0);
INSERT INTO `ai_currency` VALUES (151, 'UYU', 'UYU', 'Uruguayan Peso', 0);
INSERT INTO `ai_currency` VALUES (152, 'UZS', 'UZS', 'Uzbekistan Som', 0);
INSERT INTO `ai_currency` VALUES (153, 'VEF', 'VEF', 'Venezuelan Bolívar Fuerte', 0);
INSERT INTO `ai_currency` VALUES (154, 'VND', 'VND', 'Vietnamese Dong', 0);
INSERT INTO `ai_currency` VALUES (155, 'VUV', 'VUV', 'Vanuatu Vatu', 0);
INSERT INTO `ai_currency` VALUES (156, 'WST', 'WST', 'Samoan Tala', 0);
INSERT INTO `ai_currency` VALUES (157, 'XAF', 'XAF', 'CFA Franc BEAC', 0);
INSERT INTO `ai_currency` VALUES (158, 'XAG', 'XAG', 'Silver (troy ounce)', 0);
INSERT INTO `ai_currency` VALUES (159, 'XAU', 'XAU', 'Gold (troy ounce)', 0);
INSERT INTO `ai_currency` VALUES (160, 'XCD', 'XCD', 'East Caribbean Dollar', 0);
INSERT INTO `ai_currency` VALUES (161, 'XDR', 'XDR', 'Special Drawing Rights', 0);
INSERT INTO `ai_currency` VALUES (162, 'XOF', 'XOF', 'CFA Franc BCEAO', 0);
INSERT INTO `ai_currency` VALUES (163, 'XPF', 'XPF', 'CFP Franc', 0);
INSERT INTO `ai_currency` VALUES (164, 'YER', 'YER', 'Yemeni Rial', 0);
INSERT INTO `ai_currency` VALUES (165, 'ZAR', 'ZAR', 'South African Rand', 0);
INSERT INTO `ai_currency` VALUES (166, 'ZMK', 'ZMK', 'Zambian Kwacha (pre-2013)', 0);
INSERT INTO `ai_currency` VALUES (167, 'ZMW', 'ZMW', 'Zambian Kwacha', 0);
INSERT INTO `ai_currency` VALUES (168, 'ZWL', 'ZWL', 'Zimbabwean Dollar', 0);

-- ----------------------------
-- Table structure for ai_diseases
-- ----------------------------
DROP TABLE IF EXISTS `ai_diseases`;
CREATE TABLE `ai_diseases`  (
  `diseaseId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `typeId` int(11) DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `need_value` int(1) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `userId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `file_path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `file_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `file_size` decimal(10, 0) DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `moduleId` int(11) NOT NULL DEFAULT 0,
  `documentId` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`docId`) USING BTREE,
  UNIQUE INDEX `docId`(`docId`) USING BTREE,
  INDEX `companyId_index`(`schoolId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22100 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_employees
-- ----------------------------
DROP TABLE IF EXISTS `ai_employees`;
CREATE TABLE `ai_employees`  (
  `employeeId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `doc_typeId` int(11) DEFAULT 0,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `positionId` int(11) DEFAULT 0,
  `position_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `birthday` datetime(0) DEFAULT NULL,
  PRIMARY KEY (`employeeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_events_recipients
-- ----------------------------
DROP TABLE IF EXISTS `ai_events_recipients`;
CREATE TABLE `ai_events_recipients`  (
  `recipientId` int(11) NOT NULL,
  `typeId` int(11) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  `active` tinyint(255) DEFAULT NULL,
  `all` tinyint(255) DEFAULT NULL,
  `recipients` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`recipientId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_expenses
-- ----------------------------
DROP TABLE IF EXISTS `ai_expenses`;
CREATE TABLE `ai_expenses`  (
  `expenseId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) DEFAULT 0,
  `userId` int(11) DEFAULT 0,
  `statusId` int(11) DEFAULT 0,
  `date` date DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `studentId` int(11) DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `amount` decimal(11, 2) DEFAULT NULL,
  `balance` decimal(11, 2) DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `docId` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `userId` int(11) DEFAULT 0,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `posted` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `studentId` int(11) DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `price` decimal(10, 2) DEFAULT 0.00,
  `belongs_to_student` tinyint(1) DEFAULT 0,
  `for_sale` tinyint(1) DEFAULT 0,
  `product_in_invoice` tinyint(1) DEFAULT NULL,
  `income_typeId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  `typeId` int(11) DEFAULT 0,
  `purchase` tinyint(1) DEFAULT 0,
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
  `inventoryId` int(11) DEFAULT 0,
  `typeId` int(11) DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`entryId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_inventory_type
-- ----------------------------
DROP TABLE IF EXISTS `ai_inventory_type`;
CREATE TABLE `ai_inventory_type`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `schoolId` int(11) DEFAULT 0,
  `userId` int(11) DEFAULT 0,
  `statusId` int(11) DEFAULT 0,
  `creation_date` datetime(0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `number` int(11) DEFAULT 0,
  `familyId` int(11) DEFAULT 0,
  `amount` decimal(11, 2) DEFAULT NULL,
  `discount` decimal(11, 2) DEFAULT NULL,
  `tax_amount` decimal(11, 2) DEFAULT NULL,
  `sub_amount` decimal(11, 2) DEFAULT NULL,
  `parentId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `invoiceId` int(11) DEFAULT 0,
  `typeId` int(11) DEFAULT 0,
  `productId` int(11) DEFAULT 0,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `quantity` int(11) DEFAULT 0,
  `price` decimal(11, 2) DEFAULT 0.00,
  `discount` decimal(11, 2) DEFAULT 0.00,
  `tax_amount` decimal(11, 2) DEFAULT 0.00,
  `amount` decimal(11, 2) DEFAULT 0.00,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` char(49) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `code` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
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
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `schoolId` int(11) DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `doc_typeId` int(11) DEFAULT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `parentId` int(11) DEFAULT 0,
  `studentId` int(11) DEFAULT NULL,
  `relationshipId` int(11) DEFAULT 0,
  `in_charge` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `hidden` tinyint(1) DEFAULT 0,
  `statusId` int(11) DEFAULT 0,
  `schoolId` int(11) DEFAULT 0,
  `number` int(10) DEFAULT 0,
  PRIMARY KEY (`paymentId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_plans
-- ----------------------------
DROP TABLE IF EXISTS `ai_plans`;
CREATE TABLE `ai_plans`  (
  `planId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10, 2) DEFAULT NULL,
  `user_qty` int(11) DEFAULT 0,
  `user_price` decimal(10, 2) DEFAULT NULL,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `schoolId` int(11) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `code` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `statusId` int(11) DEFAULT 0,
  `number` int(11) DEFAULT 0,
  `schoolId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`receiptId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_relationships
-- ----------------------------
DROP TABLE IF EXISTS `ai_relationships`;
CREATE TABLE `ai_relationships`  (
  `relationshipId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `typeId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `web` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `countryId` int(11) DEFAULT 0,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slogan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusId` int(11) DEFAULT 0,
  `expiracy_date` date DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `initial_settings` tinyint(1) DEFAULT 0,
  `start_school_year` date DEFAULT NULL,
  `end_school_year` date DEFAULT NULL,
  `planId` int(11) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `currencyId` int(11) DEFAULT NULL,
  `language` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`sexId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_sex
-- ----------------------------
INSERT INTO `ai_sex` VALUES (1, 'Masculino', 0);
INSERT INTO `ai_sex` VALUES (2, 'Femenino', 0);

-- ----------------------------
-- Table structure for ai_specialties
-- ----------------------------
DROP TABLE IF EXISTS `ai_specialties`;
CREATE TABLE `ai_specialties`  (
  `specialtyId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `schoolId` int(11) DEFAULT 0,
  PRIMARY KEY (`specialtyId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_specialties
-- ----------------------------
INSERT INTO `ai_specialties` VALUES (1, 'Lengua Espa&ntilde;ola', 0, 1);
INSERT INTO `ai_specialties` VALUES (2, 'Matem&aacute;ticas', 0, 1);
INSERT INTO `ai_specialties` VALUES (3, 'Ciencias Naturales', 0, 1);
INSERT INTO `ai_specialties` VALUES (4, 'Qu&iacute;mica', 0, 1);
INSERT INTO `ai_specialties` VALUES (5, 'F&iacute;sica', 0, 1);
INSERT INTO `ai_specialties` VALUES (6, 'Biolog&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (7, 'Ciencias Sociales', 0, 1);
INSERT INTO `ai_specialties` VALUES (8, 'Historia', 0, 1);
INSERT INTO `ai_specialties` VALUES (9, 'Geograf&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (10, 'Econom&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (11, 'Antropolog&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (12, 'Demograf&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (13, '&Aacute;lgebra', 0, 1);
INSERT INTO `ai_specialties` VALUES (14, 'Geometr&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (15, 'Estad&iacute;stica', 0, 1);
INSERT INTO `ai_specialties` VALUES (16, 'Ingl&eacute;s', 0, 1);
INSERT INTO `ai_specialties` VALUES (17, 'Inform&aacute;tica', 0, 1);
INSERT INTO `ai_specialties` VALUES (18, 'Artistica', 0, 1);
INSERT INTO `ai_specialties` VALUES (19, 'Educaci&oacute;n f&iacute;sica', 0, 1);
INSERT INTO `ai_specialties` VALUES (20, 'Formaci&oacute;n Integral, Humana y Religiosa', 0, 1);
INSERT INTO `ai_specialties` VALUES (21, 'Franc&eacute;s', 0, 1);
INSERT INTO `ai_specialties` VALUES (22, 'Lengua Espa&ntilde;ola', 0, 1);
INSERT INTO `ai_specialties` VALUES (23, 'Matem&aacute;ticas', 0, 1);
INSERT INTO `ai_specialties` VALUES (24, 'Ciencias Naturales', 0, 1);
INSERT INTO `ai_specialties` VALUES (25, 'Qu&iacute;mica', 0, 1);
INSERT INTO `ai_specialties` VALUES (26, 'F&iacute;sica', 0, 1);
INSERT INTO `ai_specialties` VALUES (27, 'Biolog&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (28, 'Ciencias Sociales', 0, 1);
INSERT INTO `ai_specialties` VALUES (29, 'Historia', 0, 1);
INSERT INTO `ai_specialties` VALUES (30, 'Geograf&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (31, 'Econom&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (32, 'Antropolog&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (33, 'Demograf&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (34, '&Aacute;lgebra', 0, 1);
INSERT INTO `ai_specialties` VALUES (35, 'Geometr&iacute;a', 0, 1);
INSERT INTO `ai_specialties` VALUES (36, 'Estad&iacute;stica', 0, 1);
INSERT INTO `ai_specialties` VALUES (37, 'Ingl&eacute;s', 0, 1);
INSERT INTO `ai_specialties` VALUES (38, 'Inform&aacute;tica', 0, 1);
INSERT INTO `ai_specialties` VALUES (39, 'Artistica', 0, 1);
INSERT INTO `ai_specialties` VALUES (40, 'Educaci&oacute;n f&iacute;sica', 0, 1);
INSERT INTO `ai_specialties` VALUES (41, 'Formaci&oacute;n Integral, Humana y Religiosa', 0, 1);
INSERT INTO `ai_specialties` VALUES (42, 'Franc&eacute;s', 0, 1);

-- ----------------------------
-- Table structure for ai_student_address
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_address`;
CREATE TABLE `ai_student_address`  (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `main` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`addressId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_student_diseases
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_diseases`;
CREATE TABLE `ai_student_diseases`  (
  `diseaseId` int(11) NOT NULL AUTO_INCREMENT,
  `studentId` int(11) NOT NULL DEFAULT 0,
  `typeId` int(11) DEFAULT 0,
  `last_reaction` date DEFAULT NULL,
  `last_visit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `treatment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`diseaseId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_student_diseases_items
-- ----------------------------
DROP TABLE IF EXISTS `ai_student_diseases_items`;
CREATE TABLE `ai_student_diseases_items`  (
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `diseaseId` int(11) NOT NULL DEFAULT 0,
  `key` int(11) DEFAULT 0,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  `key_parent` int(11) DEFAULT 0,
  PRIMARY KEY (`itemId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_students
-- ----------------------------
DROP TABLE IF EXISTS `ai_students`;
CREATE TABLE `ai_students`  (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `schoolId` int(11) DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `years_old` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '0',
  `sexId` int(11) DEFAULT 0,
  `blood_groupId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `schoolId` int(11) DEFAULT 0,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  `doc_typeId` int(11) DEFAULT 0,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `birthday` datetime(0) DEFAULT NULL,
  `specialtyId` int(11) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `teacherId` int(11) DEFAULT 0,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `main` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`addressId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ai_type_documents
-- ----------------------------
DROP TABLE IF EXISTS `ai_type_documents`;
CREATE TABLE `ai_type_documents`  (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `typeId` int(11) DEFAULT 0,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `abbreviation` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
  `schoolId` int(11) DEFAULT 0,
  `typeId` tinyint(1) DEFAULT 0,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `creation_date` datetime(0) DEFAULT NULL,
  `last_login` datetime(0) DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `statusId` tinyint(1) DEFAULT 0,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `owner` tinyint(1) NOT NULL DEFAULT 0,
  `is_employee` tinyint(1) DEFAULT 0,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `class` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_users_type
-- ----------------------------
INSERT INTO `ai_users_type` VALUES (1, 'Administrador(a)', NULL, 0);
INSERT INTO `ai_users_type` VALUES (2, 'Secretaria(o)', NULL, 0);
INSERT INTO `ai_users_type` VALUES (3, 'Docente', NULL, 0);

-- ----------------------------
-- View structure for ai_employees_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_employees_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_employees_view` AS SELECT
	`a`.`employeeId` AS `employeeId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.schoolId AS schoolId,
	a.document AS document,
	a.image AS image,
	IF(a.positionId = 7, a.position_name, b.name) AS position_name,
	a.statusId as statusId,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_employees` AS `a`
	LEFT JOIN ai_positions AS b ON a.positionId = b.positionId
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_inventory_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_inventory_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_inventory_view` AS SELECT
	`a`.`inventoryId` AS `inventoryId`,
	a.name,
	a.schoolId AS schoolId,
	CONCAT(b.first_name, ' ', b.last_name) AS student_name,
	a.image AS image,
	a.price AS price,
	( SELECT b.quantity FROM ai_inventory_entries AS b WHERE b.inventoryId = a.inventoryId ORDER BY b.entryId DESC LIMIT 1 ) AS quantity,
	a.date,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_inventory` AS `a` 
	LEFT JOIN ai_students AS b ON b.studentId = a.studentId
WHERE
	a.hidden = 0 and a.typeId = 1 ;

-- ----------------------------
-- View structure for ai_invoices_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_invoices_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_invoices_view` AS SELECT
	a.invoiceId,
	a.number,
	a.amount as amount_total,
	a.schoolId,
	CONCAT( c.first_name, ' ', c.last_name ) AS parent_name,
	a.statusId,
	b.name as status_name,
	b.class
FROM
	ai_invoices AS a
	LEFT JOIN ai_invoices_status as b on a.statusId = b.statusId
	LEFT JOIN ai_student_family AS c ON a.parentId = c.familyId
	WHERE a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_parents_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_parents_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_parents_view` AS SELECT
	`a`.`parentId` AS `parentId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.schoolId AS schoolId,
	a.image AS image,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_parents` AS `a`
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_students_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_students_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_students_view` AS SELECT
	`a`.`studentId` AS `studentId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.schoolId AS schoolId,
	a.years_old,
	a.birthday,
	a.image AS image,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_students` AS `a`
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_teachers_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_teachers_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_teachers_view` AS SELECT
	`a`.`teacherId` AS `teacherId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.schoolId AS schoolId,
	a.image AS image,
	a.statusId as statusId,
	`a`.`hidden` AS `hidden`,
	b.name AS specialty_name
FROM
	`ai_teachers` AS `a`
	LEFT JOIN ai_specialties AS b ON b.specialtyId = a.specialtyId
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_users_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_users_view`;
CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `ai_users_view` AS SELECT
	`a`.`userId` AS `userId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	`a`.`username` AS `username`,
	a.schoolId AS schoolId,
	a.image AS image,
	a.owner AS owner,
	b.name AS type_name,
	a.statusId as statusId,
	c.name AS status_name,
	c.class AS class,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_users` AS `a`
	LEFT JOIN ai_users_type AS b ON a.typeId = b.typeId
	LEFT JOIN ai_users_status AS c ON a.statusId = c.statusId 
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- Function structure for get_quantity
-- ----------------------------
DROP FUNCTION IF EXISTS `get_quantity`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_quantity`(`pInventoryId` int) RETURNS int(11)
BEGIN
	DECLARE quantity int(11);
	
	SET quantity = (SELECT IFNULL(a.quantity, 0) AS quantity FROM ai_inventory_entries as a WHERE a.inventoryId = pInventoryId ORDER BY entryId DESC LIMIT 1);

	RETURN quantity;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
