/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : bibliotech

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 02/05/2021 10:42:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ai_books
-- ----------------------------
DROP TABLE IF EXISTS `ai_books`;
CREATE TABLE `ai_books`  (
  `bookId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `edition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `publication_date` datetime(0) NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `editorialId` int NULL DEFAULT 0,
  PRIMARY KEY (`bookId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_books
-- ----------------------------

-- ----------------------------
-- Table structure for ai_editorials
-- ----------------------------
DROP TABLE IF EXISTS `ai_editorials`;
CREATE TABLE `ai_editorials`  (
  `editorialId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`editorialId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_editorials
-- ----------------------------
INSERT INTO `ai_editorials` VALUES (1, 'Pearson', 1);

-- ----------------------------
-- Table structure for ai_loans
-- ----------------------------
DROP TABLE IF EXISTS `ai_loans`;
CREATE TABLE `ai_loans`  (
  `loanId` int NOT NULL AUTO_INCREMENT,
  `date` datetime(0) NULL DEFAULT NULL,
  `personId` int NULL DEFAULT NULL,
  `person_typeId` int NULL DEFAULT NULL,
  `statusId` int NULL DEFAULT NULL,
  `hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`loanId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_loans
-- ----------------------------

-- ----------------------------
-- Table structure for ai_returns
-- ----------------------------
DROP TABLE IF EXISTS `ai_returns`;
CREATE TABLE `ai_returns`  (
  `returnId` int NOT NULL AUTO_INCREMENT,
  `date` datetime(0) NULL DEFAULT NULL,
  `loanId` int NULL DEFAULT NULL,
  `statusId` int NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`returnId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ai_returns
-- ----------------------------

-- ----------------------------
-- Table structure for ai_students
-- ----------------------------
DROP TABLE IF EXISTS `ai_students`;
CREATE TABLE `ai_students`  (
  `studentId` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `statusId` int NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`studentId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ai_students
-- ----------------------------
INSERT INTO `ai_students` VALUES (1, 'Jesus Enmanuel', 'De La Cruz', NULL, 1, 0, 'edelacruz9713@gmail.com', '809-906-0295', '809-906-0295');

-- ----------------------------
-- Table structure for ai_teachers
-- ----------------------------
DROP TABLE IF EXISTS `ai_teachers`;
CREATE TABLE `ai_teachers`  (
  `teacherId` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `statusId` int NULL DEFAULT 0,
  `hidden` tinyint(1) NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`teacherId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ai_teachers
-- ----------------------------
INSERT INTO `ai_teachers` VALUES (1, 'Jesus Enmanuel', 'De La Cruz', NULL, 1, 0, 'edelacruz9713@gmail.com', '809-906-0295', '809-906-0295');

-- ----------------------------
-- Table structure for ai_type_documents
-- ----------------------------
DROP TABLE IF EXISTS `ai_type_documents`;
CREATE TABLE `ai_type_documents`  (
  `typeId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ai_type_documents
-- ----------------------------
INSERT INTO `ai_type_documents` VALUES (1, 'Cédula', NULL, 0);
INSERT INTO `ai_type_documents` VALUES (2, 'Pasaporte', NULL, 0);
INSERT INTO `ai_type_documents` VALUES (3, 'Docente', NULL, 1);

-- ----------------------------
-- Table structure for ai_users
-- ----------------------------
DROP TABLE IF EXISTS `ai_users`;
CREATE TABLE `ai_users`  (
  `userId` int NOT NULL AUTO_INCREMENT,
  `typeId` tinyint(1) NULL DEFAULT 0,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `creation_date` datetime(0) NULL DEFAULT NULL,
  `last_login` datetime(0) NULL DEFAULT NULL,
  `hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `statusId` tinyint(1) NULL DEFAULT 0,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cellphone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`userId`) USING BTREE,
  INDEX `userId_index`(`userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ai_users
-- ----------------------------
INSERT INTO `ai_users` VALUES (1, 2, 'edelacruz9713@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Jesus Enmanuel', 'De La Cruz', 'edelacruz9713@gmail.com', '2020-06-11 10:15:49', NULL, NULL, 1, '', '', 0);

-- ----------------------------
-- Table structure for ai_users_status
-- ----------------------------
DROP TABLE IF EXISTS `ai_users_status`;
CREATE TABLE `ai_users_status`  (
  `statusId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`statusId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

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
  `typeId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hidden` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`typeId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ai_users_type
-- ----------------------------
INSERT INTO `ai_users_type` VALUES (1, 'Administrador', NULL, 0);
INSERT INTO `ai_users_type` VALUES (2, 'Usuario', NULL, 0);

-- ----------------------------
-- View structure for ai_books_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_books_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `ai_books_view` AS SELECT
	`a`.`bookId`,
	a.title,
	a.author,
	a.edition,
	a.publication_date,
	a.hidden
FROM
	`ai_books` AS `a`
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_students_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_students_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `ai_students_view` AS SELECT
	`a`.`studentId` AS `studentId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.email,
	a.statusId,
	a.hidden
FROM
	`ai_students` AS `a`
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_teachers_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_teachers_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `ai_teachers_view` AS SELECT
	`a`.`teacherId` AS `teacherId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	a.email,
	a.statusId,
	a.hidden
FROM
	`ai_teachers` AS `a`
WHERE
	a.hidden = 0 ;

-- ----------------------------
-- View structure for ai_users_view
-- ----------------------------
DROP VIEW IF EXISTS `ai_users_view`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `ai_users_view` AS SELECT
	`a`.`userId` AS `userId`,
	concat( `a`.`first_name`, ' ', `a`.`last_name` ) AS `full_name`,
	`a`.`username` AS `username`,
	b.NAME AS type_name,
	a.statusId AS statusId,
	c.NAME AS status_name,
	c.class AS class,
	`a`.`hidden` AS `hidden` 
FROM
	`ai_users` AS `a`
	LEFT JOIN ai_users_type AS b ON a.typeId = b.typeId
	LEFT JOIN ai_users_status AS c ON a.statusId = c.statusId 
WHERE
	a.hidden = 0 ;

SET FOREIGN_KEY_CHECKS = 1;
