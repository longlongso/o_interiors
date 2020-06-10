/*
Navicat MySQL Data Transfer

Source Server         : localhostMySQL5.7
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : o_interiors

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-06-10 11:49:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_admin
-- ----------------------------
DROP TABLE IF EXISTS `mg_admin`;
CREATE TABLE `mg_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` char(128) NOT NULL DEFAULT '',
  `mobile` char(15) NOT NULL DEFAULT '',
  `reg_time` int(11) unsigned NOT NULL DEFAULT '0',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_admin
-- ----------------------------
INSERT INTO `mg_admin` VALUES ('1', 'admin', 'f79c689046f090506831c83846039724', 'admin@admin.admin', '', '0', '0', '1589513489', '0', '1472097371', '1');
INSERT INTO `mg_admin` VALUES ('19', 'test2', '7a88e893d678f74edb6bd1305c6c66d7', 'test@test.ccc2', '', '1472017607', '0', '1472199367', '0', '1472289042', '1');
INSERT INTO `mg_admin` VALUES ('10', 'test', 'f79c689046f090506831c83846039724', 'test@test.ccc', '', '1472005283', '0', '1519272728', '249327032', '1492756294', '1');
INSERT INTO `mg_admin` VALUES ('18', 'test1', 'f79c689046f090506831c83846039724', 'test@test.ccc1', '', '1472017592', '0', '1472108022', '0', '1472795715', '1');

-- ----------------------------
-- Table structure for mg_admin_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_admin_group`;
CREATE TABLE `mg_admin_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL DEFAULT '',
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_admin_group
-- ----------------------------
INSERT INTO `mg_admin_group` VALUES ('1', 'Admin', '[\"cms.about\",\"cms.award\",\"cms.client\",\"cms.column\",\"cms.home\",\"cms.magazine\",\"cms.media\",\"cms.project\",\"cms.projectcategory\",\"dashboard\",\"extension.index\",\"file\",\"member\",\"system.setting\",\"user.group\",\"user.user\"]');
INSERT INTO `mg_admin_group` VALUES ('2', 'test', '[\"dashboard\",\"file\"]');

-- ----------------------------
-- Table structure for mg_admin_n_group
-- ----------------------------
DROP TABLE IF EXISTS `mg_admin_n_group`;
CREATE TABLE `mg_admin_n_group` (
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_admin_n_group
-- ----------------------------
INSERT INTO `mg_admin_n_group` VALUES ('1', '2');
INSERT INTO `mg_admin_n_group` VALUES ('10', '1');
INSERT INTO `mg_admin_n_group` VALUES ('18', '2');
INSERT INTO `mg_admin_n_group` VALUES ('19', '2');

-- ----------------------------
-- Table structure for mg_admin_password_reset
-- ----------------------------
DROP TABLE IF EXISTS `mg_admin_password_reset`;
CREATE TABLE `mg_admin_password_reset` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_admin_password_reset
-- ----------------------------
INSERT INTO `mg_admin_password_reset` VALUES ('1', 'lQSPoxisAKAk2JmwuEnJyQzlpxv27WE3mJZBgFXF33jA3JOKBKEg3xGEWsDx3', '1477450706');

-- ----------------------------
-- Table structure for mg_admin_token
-- ----------------------------
DROP TABLE IF EXISTS `mg_admin_token`;
CREATE TABLE `mg_admin_token` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` char(40) NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_admin_token
-- ----------------------------
INSERT INTO `mg_admin_token` VALUES ('10', 'jYiNSuOpHlU0qGsbc96kQtWyCLMhBXozd15A4fFT', '1519272728');
INSERT INTO `mg_admin_token` VALUES ('1', '4bkiL7RNdhQmWn2TMCpwO6EBfeXSAvDZc8P3qIul', '1589513489');

-- ----------------------------
-- Table structure for mg_image
-- ----------------------------
DROP TABLE IF EXISTS `mg_image`;
CREATE TABLE `mg_image` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `path` char(10) NOT NULL DEFAULT '',
  `name` char(18) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `md5` char(32) NOT NULL DEFAULT '',
  `sha1` char(40) NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1074 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_image
-- ----------------------------
INSERT INTO `mg_image` VALUES ('1073', '20200610', '5ee0433044885.jpg', '20200610101837.jpg', '03421066376c80b43c7ed969fdc75854', '8aa0cc8418e998d4844da3307e53a51477101232', '1', '1591755568', '1591755568');
INSERT INTO `mg_image` VALUES ('1070', '20200515', '5ebe2e97ef5be.png', 'logo.png', '923fb086ed24692fe23d1bf7439cd3a1', 'b29f8ef5be856c7e99e8b7ef9692d4a3fa56df0e', '1', '1589522072', '1589522072');
INSERT INTO `mg_image` VALUES ('1071', '20200515', '5ebe2f1d7f3aa.jpg', 'banner.jpg', 'f8a6583cf1b8f64ee54175caa829862d', '93916e1e455f72eaa5652f39e8f34308e71241ff', '1', '1589522205', '1589522205');
INSERT INTO `mg_image` VALUES ('1072', '20200515', '5ebe41751eef9.jpg', 'logo_big.jpg', 'e159a2fdf73d7e5310f5bf517de06965', '9e635eb6037e2e93e160345f7e7411f2a90d9c48', '1', '1589526901', '1589526901');

-- ----------------------------
-- Table structure for mg_setting
-- ----------------------------
DROP TABLE IF EXISTS `mg_setting`;
CREATE TABLE `mg_setting` (
  `key` varchar(64) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `serialized` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_setting
-- ----------------------------
INSERT INTO `mg_setting` VALUES ('email_debug', '0', '0');
INSERT INTO `mg_setting` VALUES ('email_type', 'smtp', '0');
INSERT INTO `mg_setting` VALUES ('site_logo', '1070', '0');
INSERT INTO `mg_setting` VALUES ('site_name', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('site_status', 'development', '0');
INSERT INTO `mg_setting` VALUES ('smtp_host', 'smtp.163.com', '0');
INSERT INTO `mg_setting` VALUES ('smtp_password', 'edgital1234', '0');
INSERT INTO `mg_setting` VALUES ('smtp_port', '465', '0');
INSERT INTO `mg_setting` VALUES ('smtp_reply_to_email', 'edgitalccb@163.com', '0');
INSERT INTO `mg_setting` VALUES ('smtp_username', 'edgitalccb@163.com', '0');
INSERT INTO `mg_setting` VALUES ('site_url', '/', '0');
INSERT INTO `mg_setting` VALUES ('extra_alert_email', '', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_description', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_keywords', 'O Interiors\r\n', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_image2', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_link2', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_image3', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_link3', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_description_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item1_image1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item1_link1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item1_image2', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item2_image1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item2_link1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item2_image2', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item2_link2', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_image1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_item3_link1', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner', '{\"1\":{\"img\":\"1071\",\"link\":\"index.html\"}}', '1');
INSERT INTO `mg_setting` VALUES ('home_about', '', '0');
INSERT INTO `mg_setting` VALUES ('map_url', '', '0');
INSERT INTO `mg_setting` VALUES ('smtp_secure', 'ssl', '0');
INSERT INTO `mg_setting` VALUES ('about_hk', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '0');
INSERT INTO `mg_setting` VALUES ('home_about_hk', 'O Interiors Ltd. is an interior design firm based in Hong Kong. We create space for residential, restaurant, office and retail. We are a team of professional, energetic individual’s with talented designers and experienced managers available to guide our client’s through the flawless and timely execution of any residential design project.', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_1_img', '1071', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_1_text', 'index.html', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_2_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_2_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_about_image', '1072', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_1_link', 'index.html', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_2_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_about_en', 'O Interiors Ltd. is an interior design firm based in Hong Kong. We create space for residential, restaurant, office and retail. We are a team of professional, energetic individual’s with talented designers and experienced managers available to guide our client’s through the flawless and timely execution of any residential design project.', '0');
INSERT INTO `mg_setting` VALUES ('home_about_zh', 'O Interiors Ltd. is an interior design firm based in Hong Kong. We create space for residential, restaurant, office and retail. We are a team of professional, energetic individual’s with talented designers and experienced managers available to guide our client’s through the flawless and timely execution of any residential design project.', '0');
INSERT INTO `mg_setting` VALUES ('name=', '39', '0');
INSERT INTO `mg_setting` VALUES ('home_project_list', '[\"41\",\"17\",\"16\",\"19\",\"42\",\"15\",\"18\",\"43\"]', '1');
INSERT INTO `mg_setting` VALUES ('project_flow_title_1_en', '1', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_1_zh', '1', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_2_en', '2', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_2_zh', '2', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_3_en', '3', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_3_zh', '3', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_4_en', '4', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_4_zh', '4', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_5_en', '5', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_5_zh', '5', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_6_en', '6', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_6_zh', '6', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_img', '1071', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_title', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_company', 'O Interiors Limited', '0');
INSERT INTO `mg_setting` VALUES ('contact_address', 'Unit A, 21/F, DAN 6, NO.6 FUI YIU KOK STREET,TSUEN WAN,HK \r\n荃灣灰窰角街6號 DAN6 21樓 A室', '0');
INSERT INTO `mg_setting` VALUES ('contact_tel', '+852 3612 4670', '0');
INSERT INTO `mg_setting` VALUES ('contact_fax', '+852 3612 4671', '0');
INSERT INTO `mg_setting` VALUES ('contact_facebook_name', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_facebook_link', 'https://www.facebook.com/o.interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_whatsapp', '+852 5547 6974', '0');
INSERT INTO `mg_setting` VALUES ('contact_email', 'info@ointeriorshk.com', '0');
INSERT INTO `mg_setting` VALUES ('contact_address_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.6672701143543!2d114.11431811505426!3d22.366188985289313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403f8eb980881cb%3A0x2aa18bd521bfbab3!2sDAN6!5e0!3m2!1sen!2shk!4v1589872190468!5m2!1sen!2shk\" width=\"100%', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_icon', '1070', '0');
INSERT INTO `mg_setting` VALUES ('home_description', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"mso-spacerun: \'yes\'; font-family: \'Century Gothic\'; mso-fareast-font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 18.0000pt; mso-font-kerning: 0.0000pt;\">&nbsp;Mas Studio Limited</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"font-family: \'Century Gothic\'; color: #2f2f2f; font-size: 14pt;\">&nbsp;<span style=\"font-size: 12pt;\">actualizes imagination with creative designs</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: widow-orphan; text-align: center; mso-line-height-alt: 0pt;\" align=\"center\"><span style=\"font-family: \'Century Gothic\'; color: #2f2f2f; font-size: 12pt;\">&nbsp;We strive to create exquisite interior space to realize stylish &ldquo;Green&rdquo; living</span></p>\r\n', '0');
INSERT INTO `mg_setting` VALUES ('home_description_hk', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"mso-spacerun: \'yes\'; font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 18.0000pt; mso-font-kerning: 0.0000pt;\">Mas Studio Limited</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; mso-char-indent-count: 2.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 12pt;\"><span style=\"font-family: Microsoft JhengHei;\">以創意空間設計成就無限想像</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-autospace: ideograph-numeric; mso-pagination: widow-orphan; text-align: center;\" align=\"center\"><span style=\"font-size: 12pt;\"><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">我</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">們</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">致</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">力成就優質空間設計</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">,</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">創造時尚</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">&rdquo;</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">綠</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">&rdquo;</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">色生活</span></span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-pagination: widow-orphan; text-align: center;\" align=\"center\">&nbsp;</p>\r\n</body>\r\n</html>', '0');
INSERT INTO `mg_setting` VALUES ('home_item1_link2', '', '0');
INSERT INTO `mg_setting` VALUES ('about', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n', '0');

-- ----------------------------
-- Table structure for mg_user
-- ----------------------------
DROP TABLE IF EXISTS `mg_user`;
CREATE TABLE `mg_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(16) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` char(128) NOT NULL DEFAULT '',
  `mobile` char(15) NOT NULL DEFAULT '',
  `reg_time` int(11) unsigned NOT NULL DEFAULT '0',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0',
  `last_login_time` int(11) NOT NULL DEFAULT '0',
  `last_login_ip` bigint(20) NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`status`) USING BTREE,
  KEY `username` (`username`) USING BTREE,
  KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user
-- ----------------------------
INSERT INTO `mg_user` VALUES ('1', 'test', 'f79c689046f090506831c83846039724', '909485905@qq.com', '', '1428740838', '3232235895', '1482851164', '1949423508', '1428740838', '1');

-- ----------------------------
-- Table structure for mg_user_auth
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_auth`;
CREATE TABLE `mg_user_auth` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` char(40) NOT NULL DEFAULT '',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user_auth
-- ----------------------------

-- ----------------------------
-- Table structure for mg_user_fb
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_fb`;
CREATE TABLE `mg_user_fb` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `fb_id` varchar(32) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birth` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `locale` varchar(8) NOT NULL,
  `timezone` varchar(8) NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user_fb
-- ----------------------------

-- ----------------------------
-- Table structure for mg_user_password_reset
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_password_reset`;
CREATE TABLE `mg_user_password_reset` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user_password_reset
-- ----------------------------

-- ----------------------------
-- Table structure for mg_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_profile`;
CREATE TABLE `mg_user_profile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `real_name` varchar(255) NOT NULL DEFAULT '',
  `gender` enum('1','2','0') NOT NULL DEFAULT '0',
  `line` varchar(255) NOT NULL DEFAULT '',
  `facebook` varchar(255) NOT NULL DEFAULT '',
  `wechat` varchar(255) NOT NULL DEFAULT '',
  `qq` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `whatsapp` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user_profile
-- ----------------------------

-- ----------------------------
-- Table structure for mg_user_token
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_token`;
CREATE TABLE `mg_user_token` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` char(40) NOT NULL DEFAULT '',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_user_token
-- ----------------------------

-- ----------------------------
-- Table structure for mg_video
-- ----------------------------
DROP TABLE IF EXISTS `mg_video`;
CREATE TABLE `mg_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `path` char(8) NOT NULL DEFAULT '',
  `name` char(18) NOT NULL DEFAULT '',
  `md5` char(32) NOT NULL DEFAULT '',
  `sha1` char(40) NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_video
-- ----------------------------

-- ----------------------------
-- Table structure for mg_z_award
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_award`;
CREATE TABLE `mg_z_award` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_hk` varchar(255) NOT NULL DEFAULT '',
  `title_desc` text NOT NULL,
  `title_desc_hk` text NOT NULL,
  `image` int(11) unsigned NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_award
-- ----------------------------
INSERT INTO `mg_z_award` VALUES ('6', 'CAPITAL BEST OF THE BEST CHOICE 2013', '資本傑出行政品牌 2013', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer South China Media</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 南華傳媒</p>\r\n</body>\r\n</html>', '475', '2', '2013', '1');
INSERT INTO `mg_z_award` VALUES ('7', 'TOP 10 MOST INFLUENTIAL DESIGNER 2013', '十大最貝影響力設計師( 餐飲空間類) 2013', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer China International Architectural Decoration and Design Art Fair</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 中國國際建築裝飾及設計藝術博覽會</p>\r\n</body>\r\n</html>', '474', '1', '2013', '1');
INSERT INTO `mg_z_award` VALUES ('8', 'SUCCESSFUL DESIGN AWARDS', '成功設計大獎 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;SPACE Organizer Successful Design Organization</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 &nbsp;成功設計大賽組織委員會</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '472', '2', '2014', '1');
INSERT INTO `mg_z_award` VALUES ('9', 'CAPITAL BEST OF THE BEST CHOICE 2014', '資本傑出行政品牌 2014', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer South China Media</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 南華傳媒</p>\r\n</body>\r\n</html>', '476', '1', '2014', '1');
INSERT INTO `mg_z_award` VALUES ('14', 'CAPITAL BEST OF THE BEST CHOICE 2016', '資本傑出行政品牌 2016', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer South China Media&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>&nbsp;主辦單位 南華傳媒</p>\r\n</body>\r\n</html>', '847', '1', '2016', '1');
INSERT INTO `mg_z_award` VALUES ('15', 'BRONZE A DESIGN AWARD WINNER', 'A DESIGN AWARD WINNER', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer A Design Award &amp; Competition</p>\r\n<p>Project Ciak All Day Italian</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 A Design Award &amp; Competition</p>\r\n<p>項目 Ciak All Day Italian&nbsp;</p>\r\n</body>\r\n</html>', '867', '5', '2017', '1');
INSERT INTO `mg_z_award` VALUES ('16', 'SLIVER A DESIGN AWARD WINNER', 'A DESIGN AWARD WINNER ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer &nbsp; A Design Award &amp; Competition</p>\r\n<p>Project &nbsp; Mou Mou Club</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 A Design Award &amp; Competition</p>\r\n<p>項目 牛涮鍋</p>\r\n</body>\r\n</html>', '868', '4', '2017', '1');
INSERT INTO `mg_z_award` VALUES ('17', 'CAPITAL BEST OF THE BEST CHOICE 2017', '資本傑出行政品牌 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer &nbsp; South China Media</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 南華傳媒</p>\r\n</body>\r\n</html>', '864', '3', '2017', '1');
INSERT INTO `mg_z_award` VALUES ('18', 'SUCCESSFUL DESIGN AWARDS SPACE ', '成功設計大獎 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer &nbsp;Successful Design Organization</p>\r\n<p>Project &nbsp;Operetta</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 成功設計大賽組織委員會</p>\r\n<p>項目 Operetta</p>\r\n</body>\r\n</html>', '865', '2', '2017', '1');
INSERT INTO `mg_z_award` VALUES ('19', 'TOP 10 MOST INFLUENTIAL DESIGNER 2017', '十大最貝影響力設計師( 餐飲空間類) 2017', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer China International Architectural Decoration and Design Art Fair</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 中國國際建築裝飾及設計藝術博覽會</p>\r\n</body>\r\n</html>', '866', '1', '2017', '1');
INSERT INTO `mg_z_award` VALUES ('20', 'GERMAN DESIGN AWARD WINNER', '德國設計大獎', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer German Design Council</p>\r\n<p>Project Ciak All Day Italian</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 德國設計理事會</p>\r\n<p>項目 Ciak All Day Italian</p>\r\n</body>\r\n</html>', '1073', '2', '2018', '1');
INSERT INTO `mg_z_award` VALUES ('21', 'GERMAN DESIGN AWARD SPECIAL ', '德國設計大獎 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Organizer German Design Council&nbsp;</p>\r\n<p>Project &nbsp;Mou Mou Club&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>主辦單位 德國設計理事會</p>\r\n<p>項目 牛涮鍋</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '1073', '1', '2018', '1');

-- ----------------------------
-- Table structure for mg_z_client
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_client`;
CREATE TABLE `mg_z_client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `name_hk` varchar(255) NOT NULL DEFAULT '',
  `image` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_client
-- ----------------------------

-- ----------------------------
-- Table structure for mg_z_column
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_column`;
CREATE TABLE `mg_z_column` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_hk` varchar(255) NOT NULL DEFAULT '',
  `title_prefix` varchar(255) NOT NULL DEFAULT '',
  `title_prefix_hk` varchar(255) NOT NULL DEFAULT '',
  `preview` int(11) NOT NULL DEFAULT '0',
  `date` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `content_hk` text NOT NULL,
  `image` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_column
-- ----------------------------
INSERT INTO `mg_z_column` VALUES ('24', 'News1', 'News1', 'News Short Description', 'News Short Description', '1071', '1591718400', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>News content!!</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>News content!!</p>\r\n</body>\r\n</html>', '', '0', '1');
INSERT INTO `mg_z_column` VALUES ('25', 'new2', 'new2', 'new2 short des', 'new2 short des', '1071', '1591718400', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content !!</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content !!</p>\r\n</body>\r\n</html>', '', '0', '1');
INSERT INTO `mg_z_column` VALUES ('26', 'news3', 'news3', 'news3 short des', 'news3 short des', '1071', '1591718400', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content</p>\r\n</body>\r\n</html>', '', '0', '1');
INSERT INTO `mg_z_column` VALUES ('27', 'news 4', 'news 4', 'news 4 short des', 'news 4 short des', '1071', '1591718400', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>news content</p>\r\n</body>\r\n</html>', '', '0', '1');

-- ----------------------------
-- Table structure for mg_z_magazine
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_magazine`;
CREATE TABLE `mg_z_magazine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_hk` varchar(255) NOT NULL DEFAULT '',
  `small_title` varchar(255) NOT NULL DEFAULT '',
  `small_title_hk` varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `preview` int(11) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_magazine
-- ----------------------------

-- ----------------------------
-- Table structure for mg_z_media
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_media`;
CREATE TABLE `mg_z_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_hk` varchar(255) NOT NULL DEFAULT '',
  `title_b` varchar(255) NOT NULL DEFAULT '',
  `title_b_hk` varchar(255) NOT NULL DEFAULT '',
  `small_title` varchar(255) NOT NULL DEFAULT '',
  `small_title_hk` varchar(255) NOT NULL DEFAULT '',
  `date` int(11) NOT NULL DEFAULT '0',
  `image` int(11) NOT NULL DEFAULT '0',
  `video` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_media
-- ----------------------------
INSERT INTO `mg_z_media` VALUES ('1', 'i-Cable', '有線電視', 'Casa Series（1）', '空間大改造（1）', 'Designer Profile ', '設計師簡介', '1512662400', '916', 'https://www.youtube.com/embed/H6UmTqF31oM?ecver=1', '10', '1');
INSERT INTO `mg_z_media` VALUES ('3', 'i-Cable', '有線電視', 'Casa Series（2）', '空間大改造（2）', 'Residence Design', '住宅設計案例', '1514563200', '917', 'https://www.youtube.com/embed/ELvQhWquG0M', '9', '1');
INSERT INTO `mg_z_media` VALUES ('4', 'i-Cable', '有線電視', 'Casa Series（3）', '空間大改造（3）', 'Stone Type & Care', '石材種類及打理', '1514995200', '918', 'https://www.youtube.com/embed/S-QzpAiMm7w?ecver=1', '8', '1');
INSERT INTO `mg_z_media` VALUES ('5', 'i-Cable', '有線電視', 'Casa Series（4）', '空間大改造（4）', 'Door Lock ', '門鎖種類', '1514995200', '919', 'https://www.youtube.com/embed/RPVCMsEqQ2w?ecver=1', '7', '1');
INSERT INTO `mg_z_media` VALUES ('6', 'i-Cable', '有線電視', 'Casa Series（5）', '空間大改造（5）', 'Bathroom Waterproof', '浴室防水', '1514995200', '920', 'https://www.youtube.com/embed/ACngNIez-mc?ecver=1', '6', '1');
INSERT INTO `mg_z_media` VALUES ('7', 'i-Cable', '有線電視', 'Casa Series（6） ', '空間大改造（6）', 'Wallpaper', '牆紙種類及選擇', '1514995200', '921', 'https://www.youtube.com/embed/mG8KjC63-WA?ecver=1', '5', '1');
INSERT INTO `mg_z_media` VALUES ('8', 'i-Cable', '有線電視', 'Casa Series（7）', '空間大改造（7）', 'Cabinet Design', '廚櫃傢俬設計', '1514995200', '922', 'https://www.youtube.com/embed/8vdSYbPKhlw?ecver=1', '4', '1');
INSERT INTO `mg_z_media` VALUES ('9', 'i-Cable', '有線電視', 'Casa Series（8）', '空間大改造（8）', 'Tiles ', '瓷磚種類', '1514995200', '923', 'https://www.youtube.com/embed/XUQa_a7PBJw?ecver=1', '3', '1');
INSERT INTO `mg_z_media` VALUES ('10', 'i-Cable', '有線電視', 'Casa Series（9）', '空間大改造（9）', 'Wooden Floor ', '木地板種類', '1514995200', '925', 'https://www.youtube.com/embed/xWKjUAHx_fY', '2', '1');
INSERT INTO `mg_z_media` VALUES ('11', 'i-Cable', '有線電視', 'Casa Series（10）', '空間大改造（10）', 'Window Waterproof', '鋁窗防水', '1514995200', '924', 'https://www.youtube.com/embed/A0iEUtamPu8?ecver=1', '1', '1');

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
  `image` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_project
-- ----------------------------
INSERT INTO `mg_z_project` VALUES ('1', '1', 'SZ New World Signature Hill ', '深圳新世界名鐫', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>', '[\"454\",\"455\",\"456\",\"457\",\"458\",\"460\",\"459\",\"461\",\"462\",\"463\"]', '1', '29', '1');
INSERT INTO `mg_z_project` VALUES ('2', '2', 'The Mayfair', '梅道1號', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"439\",\"440\",\"441\",\"442\",\"443\",\"444\",\"445\",\"446\"]', '1', '39', '1');
INSERT INTO `mg_z_project` VALUES ('3', '5', 'Kaiseki Den By Saotome ', 'Kasieki Den By Saotome', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"447\",\"448\",\"449\",\"452\",\"451\",\"453\",\"450\"]', '1', '40', '1');
INSERT INTO `mg_z_project` VALUES ('7', '2', 'Bel Air', '貝沙灣', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"523\",\"525\",\"528\",\"529\",\"526\",\"524\",\"527\",\"530\",\"531\"]', '1', '38', '1');
INSERT INTO `mg_z_project` VALUES ('8', '2', 'Sai Kung Village House ', '香港獨立屋', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>House in Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港獨立居</p>\r\n</body>\r\n</html>', '[\"532\",\"538\",\"533\",\"537\",\"535\",\"534\",\"536\"]', '1', '10', '1');
INSERT INTO `mg_z_project` VALUES ('9', '2', 'The Mayfair ( B )', '梅道1號( B )', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"539\",\"541\",\"545\",\"543\",\"540\",\"542\",\"544\",\"547\",\"546\",\"548\"]', '1', '31', '1');
INSERT INTO `mg_z_project` VALUES ('10', '2', 'One Hyde Park', '逸林首府', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"556\",\"560\",\"558\",\"561\",\"559\",\"562\",\"557\"]', '1', '17', '1');
INSERT INTO `mg_z_project` VALUES ('11', '2', 'Cullinan', '天璽 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"563\",\"564\",\"565\",\"566\",\"567\",\"570\",\"568\",\"569\"]', '1', '16', '1');
INSERT INTO `mg_z_project` VALUES ('12', '2', 'Kowloon Apartment', '香港住宅 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"571\",\"575\",\"573\",\"576\",\"574\",\"572\"]', '1', '12', '1');
INSERT INTO `mg_z_project` VALUES ('13', '2', 'Tai Wai Apartment ', '香港住宅', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"577\",\"578\"]', '1', '11', '1');
INSERT INTO `mg_z_project` VALUES ('14', '2', 'Yuen Long Village House ', '香港獨立居', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"579\",\"580\"]', '1', '32', '1');
INSERT INTO `mg_z_project` VALUES ('15', '2', 'The Great Hill', '嘉御山 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '7', '1');
INSERT INTO `mg_z_project` VALUES ('16', '2', 'No. 8 Royal Park BJ', '中國住宅 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Beijing,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國北京</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '6', '1');
INSERT INTO `mg_z_project` VALUES ('17', '2', 'Mission Hills SZ', '中國住宅', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '5', '1');
INSERT INTO `mg_z_project` VALUES ('18', '2', 'Tseung Kwan O Apartment ', '香港住宅', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '4', '1');
INSERT INTO `mg_z_project` VALUES ('19', '2', 'Parc Oasis ', '香港住宅', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '3', '1');
INSERT INTO `mg_z_project` VALUES ('20', '1', 'SZ New World Yishan Garden（B1）', '深圳新世界倚山花園（B1）', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"609\",\"611\",\"610\"]', '1', '23', '1');
INSERT INTO `mg_z_project` VALUES ('21', '1', 'SZ New World Yishan Garden（B2）', '深圳新世界倚山花園（B2)', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"612\",\"613\"]', '1', '22', '1');
INSERT INTO `mg_z_project` VALUES ('22', '1', 'SZ New World Yishan Garden（B3）', '深圳新世界倚山花園（B3）', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"614\",\"616\",\"615\"]', '1', '21', '1');
INSERT INTO `mg_z_project` VALUES ('23', '1', 'SZ New World Yishan Garden（B4）', '深圳新世界倚山花園（B4)', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"617\",\"619\",\"618\"]', '1', '20', '1');
INSERT INTO `mg_z_project` VALUES ('24', '1', 'SZ New World Yishan Garden（B5）', '深圳新世界花園（B5）', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"620\",\"621\"]', '1', '19', '1');
INSERT INTO `mg_z_project` VALUES ('25', '1', 'SZ New World Yishan Garden（B6）', '深圳新世界花園（B6）', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>ShenZhen,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國深圳</p>\r\n</body>\r\n</html>', '[\"622\"]', '1', '18', '1');
INSERT INTO `mg_z_project` VALUES ('26', '5', 'Sushi Masataka', 'Sushi Masataka', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"625\",\"626\",\"623\",\"627\",\"624\"]', '1', '37', '1');
INSERT INTO `mg_z_project` VALUES ('27', '5', 'Takumii by Daisuke Mori', 'Takumii by Daisuke Mori', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"628\",\"632\",\"630\",\"629\",\"633\"]', '1', '36', '1');
INSERT INTO `mg_z_project` VALUES ('28', '5', 'Old Bazzar Kitchen', '老巴剎廚房 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"634\",\"635\",\"638\",\"639\",\"636\",\"637\",\"640\"]', '1', '34', '1');
INSERT INTO `mg_z_project` VALUES ('29', '5', 'ASK Cafe', 'ASK Cafe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"641\",\"642\",\"644\",\"643\"]', '1', '35', '1');
INSERT INTO `mg_z_project` VALUES ('30', '5', 'The Chin\'s', '中華滙館', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"645\",\"647\",\"651\",\"653\",\"649\",\"646\",\"648\",\"650\",\"652\",\"654\",\"655\",\"657\",\"656\"]', '1', '33', '1');
INSERT INTO `mg_z_project` VALUES ('31', '5', 'Mou Mou Club_MOKO Mall', '牛涮鍋_新世紀廣場 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"660\",\"664\",\"659\",\"662\",\"661\",\"658\",\"665\",\"663\",\"666\"]', '1', '15', '1');
INSERT INTO `mg_z_project` VALUES ('32', '5', 'Operetta', 'Operetta', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"667\",\"668\",\"670\",\"672\",\"674\",\"669\",\"673\",\"671\",\"675\"]', '1', '28', '1');
INSERT INTO `mg_z_project` VALUES ('33', '5', 'CIAK all day italian', 'Ciak all day italian', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"681\",\"680\",\"677\",\"676\",\"678\",\"679\",\"683\",\"684\",\"682\"]', '1', '27', '1');
INSERT INTO `mg_z_project` VALUES ('34', '5', 'Pizza View', 'Pizza View', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Beijing,China</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>中國北京</p>\r\n</body>\r\n</html>', '[\"685\",\"688\",\"689\",\"687\",\"686\"]', '1', '26', '1');
INSERT INTO `mg_z_project` VALUES ('35', '5', 'Tang²', '廳²', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"690\",\"691\",\"696\",\"692\",\"695\",\"694\",\"693\"]', '1', '25', '1');
INSERT INTO `mg_z_project` VALUES ('36', '5', 'The Green Atrium', 'The Green Atrium', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"698\",\"700\",\"701\",\"697\",\"703\",\"699\",\"702\",\"704\",\"705\",\"706\"]', '1', '30', '1');
INSERT INTO `mg_z_project` VALUES ('37', '5', 'Mou Mou Club_Island Resort Mall', '牛涮鍋_藍灣廣場 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"709\",\"713\",\"712\",\"707\",\"711\",\"708\",\"710\"]', '1', '24', '1');
INSERT INTO `mg_z_project` VALUES ('38', '5', 'Tamashii', '魂', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"714\",\"717\",\"719\",\"715\",\"718\",\"716\"]', '1', '13', '1');
INSERT INTO `mg_z_project` VALUES ('39', '5', 'Gyu Kaku ', '牛角', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"720\",\"721\",\"725\",\"723\",\"722\",\"724\",\"726\"]', '1', '14', '1');
INSERT INTO `mg_z_project` VALUES ('40', '5', 'The Banqueting House_Metroplaza ', '御苑皇宴_新都會廣場 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong&nbsp;</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"729\",\"728\",\"730\",\"727\",\"731\"]', '1', '9', '1');
INSERT INTO `mg_z_project` VALUES ('41', '5', 'Kam Tin Long ', '金田長 ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '8', '1');
INSERT INTO `mg_z_project` VALUES ('42', '5', 'The Banqueting House_Mega Box ', '御苑皇宴_Mega Box ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '2', '1');
INSERT INTO `mg_z_project` VALUES ('43', '5', 'TWG Tea_IFC    ', 'TWG Tea_國際金融中心', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '[\"1071\"]', '1', '1', '1');

-- ----------------------------
-- Table structure for mg_z_project_category
-- ----------------------------
DROP TABLE IF EXISTS `mg_z_project_category`;
CREATE TABLE `mg_z_project_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `name_hk` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_project_category
-- ----------------------------
INSERT INTO `mg_z_project_category` VALUES ('1', 'Show Flat', '樓盤示範單位', '1', '1');
INSERT INTO `mg_z_project_category` VALUES ('2', 'Residence', '住宅', '3', '1');
INSERT INTO `mg_z_project_category` VALUES ('5', 'Restaurant', '餐廳食店', '2', '1');
