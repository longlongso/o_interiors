/*
Navicat MySQL Data Transfer

Source Server         : localhostMySQL5.7
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : o_interiors

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-07-14 10:49:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_z_project
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_project`;
CREATE TABLE `mg_z_project` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_hk` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `content_hk` text NOT NULL,
  `cover` int(11) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `video` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
