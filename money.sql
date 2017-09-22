/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : money

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-19 11:35:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_number` (`number`) USING BTREE,
  KEY `goods_shop` (`shop_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `create_shop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `member_mobile` (`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(50) NOT NULL,
  `number` varchar(50) DEFAULT NULL,
  `shop_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `goods_money` decimal(10,2) NOT NULL,
  `receipt_money` decimal(10,2) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_guid` (`guid`) USING BTREE,
  KEY `order_shop` (`shop_id`,`create_time`) USING BTREE,
  KEY `order_user` (`user_id`,`create_time`,`shop_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for order_goods
-- ----------------------------
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `real_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `number` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_goods` (`order_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `create_user` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '1:系统默认创建店铺；0:用户主动创建店铺',
  `manager` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `alipay` varchar(4000) DEFAULT NULL,
  `weixin` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140434 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shop_member
-- ----------------------------
DROP TABLE IF EXISTS `shop_member`;
CREATE TABLE `shop_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `sex` smallint(6) DEFAULT NULL,
  `tag` varchar(500) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_member` (`shop_id`,`member_id`) USING BTREE,
  KEY `shop_member_shop` (`shop_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for shop_user
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `create_user` int(11) DEFAULT '0',
  `status` int(11) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_user_status` (`shop_id`,`status`) USING BTREE,
  KEY `shop_user` (`shop_id`,`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for sms
-- ----------------------------
DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `content` varchar(200) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_mobile` (`mobile`) USING BTREE,
  KEY `sms_mobile_action` (`mobile`,`action`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` varchar(50) NOT NULL,
  `client` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `token` (`token`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `lastshop` int(11) NOT NULL DEFAULT '0',
  `role` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user-mobile` (`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
