/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : test2

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 25/04/2019 11:38:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (0, 'zero', 'zero0000', '110');
INSERT INTO `user` VALUES (1, 'one', 'one1111', '120');
INSERT INTO `user` VALUES (2, 'two', 'two2222', '119');
INSERT INTO `user` VALUES (3, 'three', 'three3333', '911');
INSERT INTO `user` VALUES (4, 'four', 'four4444', '444');
INSERT INTO `user` VALUES (5, 'five', 'five5555', '555');
INSERT INTO `user` VALUES (6, 'six', 'six6666', '666');
INSERT INTO `user` VALUES (7, 'seven', 'seven7777', '777');
INSERT INTO `user` VALUES (8, 'eight', 'eight8888', '888');

SET FOREIGN_KEY_CHECKS = 1;
