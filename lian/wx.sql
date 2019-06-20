/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : wx

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-20 16:12:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for add
-- ----------------------------
DROP TABLE IF EXISTS `add`;
CREATE TABLE `add` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of add
-- ----------------------------
INSERT INTO `add` VALUES ('24', 'fstgbh', 'yhjey', 'ghj', 'ghjuk');
INSERT INTO `add` VALUES ('23', 'gfb', 'gfsndfg', 'hj', 'gjk,');
INSERT INTO `add` VALUES ('22', 'rtwh', 'th', 'ryehj', 'ryuk');
INSERT INTO `add` VALUES ('21', '576', '7837', '535', '56363');
INSERT INTO `add` VALUES ('20', '576', '7837', '535', '56363');
INSERT INTO `add` VALUES ('19', '576', '7837', '535', '56363');
INSERT INTO `add` VALUES ('18', '576', '7837', '535', '56363');
INSERT INTO `add` VALUES ('25', 'fstgbh', 'yhjey', 'ghj', 'ghjuk');
INSERT INTO `add` VALUES ('26', 'fstgbh', 'yhjey', 'ghj', 'ghjuk');
INSERT INTO `add` VALUES ('27', 'fstgbh', 'yhjey', 'ghj', 'ghjuk');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `time` varchar(12) DEFAULT NULL,
  `integral` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('4', '张三', 'ads', '1559177998', null);

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(60) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('1', '笔记本', 'uploads/notebook.png');
INSERT INTO `classify` VALUES ('2', '台式机', 'uploads/ts.png');
INSERT INTO `classify` VALUES ('3', '电脑外设', 'uploads/ws.png');
INSERT INTO `classify` VALUES ('4', '手机配件', 'uploads/sjpj.png');
INSERT INTO `classify` VALUES ('5', '智能手机', 'uploads/sj.png');
INSERT INTO `classify` VALUES ('6', 'pc配件', 'uploads/pcpj.png');
INSERT INTO `classify` VALUES ('7', '数码', 'uploads/shuma.png');
INSERT INTO `classify` VALUES ('8', '智能穿戴', 'uploads/znpd.png');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '狼蛛AULA', 'uploads/aula.jpg');
INSERT INTO `goods` VALUES ('2', '达尔优机械师108键', 'uploads/dareu.jpg');
INSERT INTO `goods` VALUES ('3', '狼蛛收割者', 'uploads/shou.jpg');
INSERT INTO `goods` VALUES ('4', '赛德斯（Sades）', 'uploads/sades.jpg');

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('1', 'uploads/03.jpg');
INSERT INTO `image` VALUES ('3', 'uploads/02.jpg');
INSERT INTO `image` VALUES ('4', 'uploads/01.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'root', 'root', null);
