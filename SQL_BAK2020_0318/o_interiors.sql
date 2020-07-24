/*
Navicat MariaDB Data Transfer

Source Server         : edgital.customer
Source Server Version : 100138
Source Host           : localhost:3306
Source Database       : o_interiors

Target Server Type    : MariaDB
Target Server Version : 100138
File Encoding         : 65001

Date: 2020-07-20 21:31:41
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
INSERT INTO `mg_admin` VALUES ('1', 'admin', 'f79c689046f090506831c83846039724', 'admin@admin.admin', '', '0', '0', '1595215742', '1912532041', '1472097371', '1');
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
INSERT INTO `mg_admin_token` VALUES ('1', '9IOQfqktnUXvRPYAxr1zFmEj4MBesZJ2TGibSHo7', '1595215742');

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
) ENGINE=MyISAM AUTO_INCREMENT=1545 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_image
-- ----------------------------
INSERT INTO `mg_image` VALUES ('1073', '20200610', '5ee0433044885.jpg', '20200610101837.jpg', '03421066376c80b43c7ed969fdc75854', '8aa0cc8418e998d4844da3307e53a51477101232', '1', '1591755568', '1591755568');
INSERT INTO `mg_image` VALUES ('1070', '20200515', '5ebe2e97ef5be.png', 'logo.png', '923fb086ed24692fe23d1bf7439cd3a1', 'b29f8ef5be856c7e99e8b7ef9692d4a3fa56df0e', '1', '1589522072', '1589522072');
INSERT INTO `mg_image` VALUES ('1071', '20200515', '5ebe2f1d7f3aa.jpg', 'banner.jpg', 'f8a6583cf1b8f64ee54175caa829862d', '93916e1e455f72eaa5652f39e8f34308e71241ff', '1', '1589522205', '1589522205');
INSERT INTO `mg_image` VALUES ('1072', '20200515', '5ebe41751eef9.jpg', 'logo_big.jpg', 'e159a2fdf73d7e5310f5bf517de06965', '9e635eb6037e2e93e160345f7e7411f2a90d9c48', '1', '1589526901', '1589526901');
INSERT INTO `mg_image` VALUES ('1075', '20200611', '5ee1d23fa74d3.jpg', 'IMG_7240.jpg', '5d092101b11dd11a4565059cd36640c2', 'c77f3e76404cb576426734550c4a93b6f78adeb3', '1', '1591857727', '1591857727');
INSERT INTO `mg_image` VALUES ('1076', '20200611', '5ee1d2461ff84.JPG', 'IMG_7263.JPG', 'f5fc38ba534be3281129ba279e858179', '2ccd32854ce9ec1da1246c5b85e9e8bb64a70dd1', '1', '1591857734', '1591857734');
INSERT INTO `mg_image` VALUES ('1077', '20200611', '5ee1d2463efe4.JPG', 'IMG_7254.JPG', '0b9d26489e892ff2f5e60e11ef46b612', '4396a9eb0a9689df426d1e6e014d67858476ebdc', '1', '1591857734', '1591857734');
INSERT INTO `mg_image` VALUES ('1078', '20200611', '5ee1d2468b44e.jpg', 'IMG_7291.jpg', 'a7d820e477241d59151439bf4108378b', '43caa5f566755d7ae941cb600b8a29d1e97d3f16', '1', '1591857734', '1591857734');
INSERT INTO `mg_image` VALUES ('1079', '20200611', '5ee1d247b5575.JPG', 'IMG_7252.JPG', '5507715f03fcf586e0addd997baa4219', '66aa6dfc1860d0ac72072c83ec9fa63c64d75121', '1', '1591857735', '1591857735');
INSERT INTO `mg_image` VALUES ('1080', '20200611', '5ee1d24b3994d.jpg', 'IMG_7293.jpg', 'a85e14ac11f8e48bf9c72223b2bdb518', '1725c74dc2de81c248527d8d530a90f22dadc360', '1', '1591857739', '1591857739');
INSERT INTO `mg_image` VALUES ('1081', '20200611', '5ee1d24d3009b.JPG', 'IMG_7336.JPG', 'b2ce4bf58079b47ed4c9133b97de047e', '55d19540e067c4b50c381c41472eca16f7bb2141', '1', '1591857741', '1591857741');
INSERT INTO `mg_image` VALUES ('1082', '20200611', '5ee1d24d3f528.jpg', 'IMG_7271.jpg', '5007a43fca483fa79abd8a3a2cc59852', '2a4216c752601d0feef29137211d0fb0c2ed99a6', '1', '1591857741', '1591857741');
INSERT INTO `mg_image` VALUES ('1083', '20200611', '5ee1d24d71e75.JPG', 'IMG_7332.JPG', '4045974e59b6f819ef7b152f6aba1a81', '25e311cd9cf19cd7bc1cdc39fe1cae6453374290', '1', '1591857741', '1591857741');
INSERT INTO `mg_image` VALUES ('1084', '20200611', '5ee1d24f1983c.JPG', 'IMG_7338.JPG', 'ccf185923ec6a5b0583303f9f8ab3a77', 'dfa404db16457874925e044a75566e13b47b94a9', '1', '1591857743', '1591857743');
INSERT INTO `mg_image` VALUES ('1085', '20200611', '5ee1d250044f8.JPG', 'IMG_7349.JPG', 'd800b3e141608d4c694ed2148b567e7d', 'ce0d8dbefdc23ac9d0ff48a900211425da3b20d4', '1', '1591857744', '1591857744');
INSERT INTO `mg_image` VALUES ('1086', '20200611', '5ee1d25037000.JPG', 'IMG_7320.JPG', '4a2d65eb2ec87461635aa3ab6f6af91e', '359262a876245f199b6b1978768affbac2cbfe00', '1', '1591857744', '1591857744');
INSERT INTO `mg_image` VALUES ('1087', '20200611', '5ee1d255d868d.JPG', 'IMG_7360.JPG', '921130b2582d47baf87adb070fee04f0', '2c56e9ad09eb1a2524775ff478211113412b49a7', '1', '1591857749', '1591857749');
INSERT INTO `mg_image` VALUES ('1088', '20200611', '5ee1d255eaf0e.JPG', 'IMG_7358.JPG', '5526e80d126be3c19c33ab37e9eced6c', '505d8f1d65109b7c06f332fbf9996934eb484ceb', '1', '1591857749', '1591857749');
INSERT INTO `mg_image` VALUES ('1089', '20200611', '5ee1d2560337a.JPG', 'IMG_7354.JPG', '8d1ddd23ade815dd81f1b6cc76c1d5dd', '27eeeba14124189e64fc121e441ba176e4df5a73', '1', '1591857750', '1591857750');
INSERT INTO `mg_image` VALUES ('1090', '20200611', '5ee1d2588be72.jpg', 'IMG_7260.jpg', 'ff5de45b46ab12b3ae9ab3b34434ffc5', 'e39d202a85838818720b80bfc46022af9abac11b', '1', '1591857752', '1591857752');
INSERT INTO `mg_image` VALUES ('1091', '20200611', '5ee1e26fe3770.jpg', 'award.jpg', '5cc195a24fa378f2c4ec5fa01b1c560c', 'c60e592e1e9288a7cf32ed4b9acf254f10fc07ed', '1', '1591861871', '1591861871');
INSERT INTO `mg_image` VALUES ('1092', '20200611', '5ee1e2703bd25.png', 'award2.png', 'ac839126a8001b4a41b70ed991a047c1', 'c5068926feee4f40f8eef1194ca17b13abb0dedb', '1', '1591861872', '1591861872');
INSERT INTO `mg_image` VALUES ('1093', '20200611', '5ee1e2f775b33.jpg', 'award2.jpg', 'd077054a890ba579fd9abdc0c1beb176', '21658a9de95b47d49c7846823e1de8fb0f140839', '1', '1591862007', '1591862007');
INSERT INTO `mg_image` VALUES ('1094', '20200611', '5ee1e33a515ab.jpg', 'award3.jpg', '075bfc717c5d81042a1be53d263b0d28', '75375c77a6eea94057c9f2dc5d90255f4e7595a2', '1', '1591862074', '1591862074');
INSERT INTO `mg_image` VALUES ('1095', '20200611', '5ee1e53c46483.jpg', 'DSC07456.jpg', '884982b2ef666ec34b9d179c44659a06', '0a39bbefe274bfe7df3e88a8f1d038bd4206a4ba', '1', '1591862588', '1591862588');
INSERT INTO `mg_image` VALUES ('1096', '20200611', '5ee1e5403bd84.jpg', 'DSC07486.jpg', '5df92dc4234f9adbb98b8c50045565fa', 'ced1e4fc5f9e1cd10a85474115426c13b47d1a5e', '1', '1591862592', '1591862592');
INSERT INTO `mg_image` VALUES ('1097', '20200611', '5ee1e5470ecf9.jpg', 'DSC07489.jpg', 'be2b69f2e334962a2cb4527814cff371', 'f0c683ee6e97535a2df7636c469b9be32f17c4a8', '1', '1591862599', '1591862599');
INSERT INTO `mg_image` VALUES ('1098', '20200611', '5ee1e54971dc0.jpg', 'DSC07504.jpg', '70503a7be5a8fc20f7ff20db9da68f3f', 'f61640caf7413b458ddd1a315f7be6d79893b73e', '1', '1591862601', '1591862601');
INSERT INTO `mg_image` VALUES ('1099', '20200611', '5ee1e54a45f29.jpg', 'DSC07471.jpg', 'b59642f93e52304b1359b1ef1a134e78', '50ad9d0bb718fd7ad9c122d88b7e85685c7a463d', '1', '1591862602', '1591862602');
INSERT INTO `mg_image` VALUES ('1100', '20200611', '5ee1e54e5d5a9.jpg', 'DSC07534.jpg', '172ffd02a4efc6ab8059144e33680e95', '21cd37e0bcb17b40e58d349d6deb105fd2ec0a53', '1', '1591862606', '1591862606');
INSERT INTO `mg_image` VALUES ('1101', '20200611', '5ee1e5503127e.jpg', 'DSC07531.jpg', '0f6feadabdf14ca83f2addf80769c54d', 'fa96f671ec91a08427ae232f64c31ca686ffdc0b', '1', '1591862608', '1591862608');
INSERT INTO `mg_image` VALUES ('1102', '20200611', '5ee1e55882745.jpg', 'DSC07527.jpg', 'bd1f6e262f7fe53b9192e4df023d15e4', '714f54c4a9cf06586fac256ee3cf5755d4c80df4', '1', '1591862616', '1591862616');
INSERT INTO `mg_image` VALUES ('1103', '20200611', '5ee1e558a3479.jpg', 'DSC07550 (1).jpg', '1050bc877527590cfa896370a9e9fb69', '98d40c0ebb02709e835b8c9bb039825ee1436777', '1', '1591862616', '1591862616');
INSERT INTO `mg_image` VALUES ('1104', '20200611', '5ee1e558c0a0f.jpg', 'DSC07542.jpg', '353a99e90915f94af7f0335f715a97fc', 'a1602fe200e0f8e4026f925b26a2bcdafeec9726', '1', '1591862616', '1591862616');
INSERT INTO `mg_image` VALUES ('1105', '20200611', '5ee1e558da1af.jpg', 'DSC07554 (1).jpg', 'ea5f91e7b76efe455ba871d11f772b0b', '49e0cf8077e33652a5a00be9d4e59d3596691eee', '1', '1591862616', '1591862616');
INSERT INTO `mg_image` VALUES ('1106', '20200611', '5ee1e55d23dfb.jpg', 'DSC07561 (1).jpg', 'b3368b452e0629adebb6da2be23cfe24', 'aec52441563766c72ed17dc1303f8bd41a0adbc2', '1', '1591862621', '1591862621');
INSERT INTO `mg_image` VALUES ('1107', '20200611', '5ee1e609759ea.jpg', 'DSC03908.jpg', '00e9d512492f6913c203a1d38776a85c', '3293142b1dda4d4ee7483032557ea9227933b199', '1', '1591862793', '1591862793');
INSERT INTO `mg_image` VALUES ('1108', '20200611', '5ee1e60cbc812.jpg', 'DSC03902.jpg', '9f1937a531038754f16f2a6ca73d90c1', '2d26758d1465c1d5a6e516ff45bc2f60f9f80c18', '1', '1591862796', '1591862796');
INSERT INTO `mg_image` VALUES ('1109', '20200611', '5ee1e60d3fb08.jpg', 'DSC03921.jpg', 'c52ba2335245bf2bee3c662adb532f74', '1b104159a259891af5f9a4e8235743922ec48e03', '1', '1591862797', '1591862797');
INSERT INTO `mg_image` VALUES ('1110', '20200611', '5ee1e61848020.jpg', 'DSC03934.jpg', 'c53fc84de818274ebe84905df1267580', '5cb14f4a2dd87341eedfd5bbf1c15bbdc256fd5e', '1', '1591862808', '1591862808');
INSERT INTO `mg_image` VALUES ('1111', '20200611', '5ee1e61c47ad8.jpg', 'DSC03923.jpg', '48acd917607785247e55a25b30134d88', '04e074f52a5abf31a04f02690f385c854f99ede0', '1', '1591862812', '1591862812');
INSERT INTO `mg_image` VALUES ('1112', '20200611', '5ee1e6219ae92.jpg', 'DSC03938.jpg', 'dc6648dc8515eec6419f19877d810b1e', 'cdc645f97bbf91306e9fa2f9354af243b724e72e', '1', '1591862817', '1591862817');
INSERT INTO `mg_image` VALUES ('1113', '20200611', '5ee1e621b8b3a.jpg', 'DSC03911.jpg', 'c575013c61e219d2faade00e837933b1', 'd02931a4bd5c76637f10993dc8839c7f6c8ac7ab', '1', '1591862817', '1591862817');
INSERT INTO `mg_image` VALUES ('1114', '20200611', '5ee1e629e857f.jpg', 'DSC03939.jpg', 'be7f285a9d7934ae672ad435982e3b13', 'a66e8655c9dbe3a7f9c634e2917cdaa6a783d06c', '1', '1591862825', '1591862825');
INSERT INTO `mg_image` VALUES ('1115', '20200611', '5ee1e633aad51.jpg', 'DSC03937.jpg', 'cc8a58be724fce45f06d34637c6aed73', 'f962780054e22867a0916b8b89f8a616a302f8c5', '1', '1591862835', '1591862835');
INSERT INTO `mg_image` VALUES ('1116', '20200611', '5ee1e633d6632.jpg', 'DSC03927.jpg', '51265a6d1839d068e6bd8feaa8fd6dce', '50fffa7293ebc2040114b6525463a1b4f69505cd', '1', '1591862835', '1591862835');
INSERT INTO `mg_image` VALUES ('1117', '20200611', '5ee1e634025d8.jpg', 'DSC03949.jpg', '39396f8b3feb9cfe42030bf89f2bd739', '016514955781ece987006ef8c7b10f34ae8fe7fd', '1', '1591862836', '1591862836');
INSERT INTO `mg_image` VALUES ('1118', '20200611', '5ee1e634261b3.jpg', 'DSC03964.jpg', '13dc27c24599c8bdd8840efed9db40c7', '82241adc9c7a08814290c3b351fa8e01b89f6592', '1', '1591862836', '1591862836');
INSERT INTO `mg_image` VALUES ('1119', '20200611', '5ee1e6385210a.jpg', 'DSC03961.jpg', '91d56a9e6cdc527b2a1ad5d4d9442539', 'fb3dad588cf3197a32342b99c0e971db28cd0cd9', '1', '1591862840', '1591862840');
INSERT INTO `mg_image` VALUES ('1120', '20200611', '5ee1e708280a5.jpg', 'DSC06790.r2.jpg', '493ee3992954c35267c875f9c91f173c', '465c96894cbfe3d3d7a43422c26b67c9b6e09340', '1', '1591863048', '1591863048');
INSERT INTO `mg_image` VALUES ('1121', '20200611', '5ee1e70caaab7.jpg', 'DSC06791.r2.jpg', '7c786c7e0337740b9f537449bc6df15e', '7cfba614c261f4a812a1d2cd605079d82e86bca0', '1', '1591863052', '1591863052');
INSERT INTO `mg_image` VALUES ('1122', '20200611', '5ee1e70e4ec99.jpg', 'DSC06818.r3.jpg', '2b7b669f0f254518f60b9e50db47d795', 'cbfe5e9a61f453d04e367599aa93a0dfbd714ab8', '1', '1591863054', '1591863054');
INSERT INTO `mg_image` VALUES ('1123', '20200611', '5ee1e710947a4.jpg', 'DSC06828.r2.jpg', 'eb0c80e347357270bff43cbb17f8b5ea', '25a5dbb0f1b4e37d6b5082634b285c507fbafe8b', '1', '1591863056', '1591863056');
INSERT INTO `mg_image` VALUES ('1124', '20200611', '5ee1e710a6ec1.jpg', 'IMG_1084.r2.jpg', '68d3b1f9cb5bb1d8c84981950bdc0978', '92dda4554a86b5075fe29ea45d009b56c184e839', '1', '1591863056', '1591863056');
INSERT INTO `mg_image` VALUES ('1125', '20200611', '5ee1e711132db.JPG', 'IMG_1086r1.JPG', '5583105131b8075c7409224ad4ff598a', '1c28e9fb7469b4de312cc27dbb04cc8b26fb549f', '1', '1591863057', '1591863057');
INSERT INTO `mg_image` VALUES ('1126', '20200611', '5ee1e713a3f16.jpg', 'DSC06879r2.jpg', '12c10a4fffbf06a590d61f43542b6b28', '796ffd98a4105aeffe81d7b60dd40a6f67c3c2ae', '1', '1591863059', '1591863059');
INSERT INTO `mg_image` VALUES ('1127', '20200611', '5ee1e71429244.jpg', 'IMG_1128.r2.jpg', '2c5c7da713d74c66706fbbf1f2d3d880', 'dda146462d1a3a3392d8dde335510cbc8bf74446', '1', '1591863060', '1591863060');
INSERT INTO `mg_image` VALUES ('1128', '20200611', '5ee1e7160e883.jpg', 'DSC06892.r2.jpg', 'd50bd402a1de7030f4cf234d5f0127fd', '8c3f85474ac2452c068a8a0873e7ed6dfc5f5ee0', '1', '1591863062', '1591863062');
INSERT INTO `mg_image` VALUES ('1129', '20200611', '5ee1e71aca4fa.jpg', 'IMG_3737.r3.jpg', '486b764fcfb4bd82787a6f770006daa0', 'd94d3de9103e1c9f06890178a99295d1f5d28ca8', '1', '1591863066', '1591863066');
INSERT INTO `mg_image` VALUES ('1130', '20200611', '5ee1e71b817be.JPG', 'IMG_3751r1.JPG', '772d04818389d7567ed36e0b3e56719d', '29c22006aabe4b9b5a615fbb562c714a8d3f0567', '1', '1591863067', '1591863067');
INSERT INTO `mg_image` VALUES ('1131', '20200611', '5ee1e72201acd.JPG', 'anucell_14.JPG', '1a01381048b1c7085e3f89775846a294', 'd183442d90a5f5f3eaef403c08d4effdfff6c1bd', '1', '1591863074', '1594810341');
INSERT INTO `mg_image` VALUES ('1132', '20200611', '5ee1e72215369.JPG', 'IMG_3816r1.JPG', 'd2fb1bef2b198f8dce1457603ae02543', 'd23e56856eb216f57f78996ca3f797fd13ce5938', '1', '1591863074', '1591863074');
INSERT INTO `mg_image` VALUES ('1133', '20200611', '5ee1e7222b9f2.jpg', 'IMG_3722.r1.jpg', 'c44d2b020e0a636fe8d083a899185edb', 'a1b3f9c6d5ec1b873f65f87242bfd947a2fb2fb8', '1', '1591863074', '1591863074');
INSERT INTO `mg_image` VALUES ('1134', '20200611', '5ee1e7223fc0a.jpg', 'IMG_3850.r2.jpg', '7ee12c7ffb85a679faf98533ec139e28', '8e31c5cf8a650311f3075b9af23847a3c1ae9a46', '1', '1591863074', '1591863074');
INSERT INTO `mg_image` VALUES ('1135', '20200611', '5ee1e72252c60.jpg', 'IMG_3798r1.jpg', 'c801900dc2f026f4880e6a3371bbb2b1', 'aab8508bbf730a1c617b70cbea891b4da6984918', '1', '1591863074', '1591863074');
INSERT INTO `mg_image` VALUES ('1142', '20200611', '5ee1e8f6133ea.jpg', 'wannaeat_05.jpg', 'eac6b990485b4dd3d258bebe7470d349', '5bb8927c68b8cda9eb7f0b52e8ca32c6833e5d5c', '1', '1591863542', '1595216825');
INSERT INTO `mg_image` VALUES ('1144', '20200611', '5ee1e8f79067d.jpg', 'wannaeat_01.jpg', 'cfad841971453f55ff507dff54e3d60c', '628a15c06877f529337f7ca13623601e54466df9', '1', '1591863543', '1595216825');
INSERT INTO `mg_image` VALUES ('1145', '20200611', '5ee1e8f8649fc.jpg', 'wannaeat_04.jpg', '8c12d54a01ed518510a32dbf9892dd25', '808167708d7397771316a16ba59727bb626942c6', '1', '1591863544', '1595216825');
INSERT INTO `mg_image` VALUES ('1146', '20200611', '5ee1e8f87efb4.jpg', 'wannaeat_14.jpg', 'ba9373bf94ab5b69cda0825578770d8b', 'eeedc1d2050e4c970b8210a466d038c18cfffa95', '1', '1591863544', '1595216825');
INSERT INTO `mg_image` VALUES ('1535', '20200720', '5f1513ba5600d.jpg', 'wannaeat_02.jpg', '279865d8ddbe9e2f1a17dc06a18a276a', '23d6e4c79b4c8d9dda21eda844ada04a770c576b', '1', '1595216826', '1595216826');
INSERT INTO `mg_image` VALUES ('1151', '20200611', '5ee1ea7663fdc.jpg', 'news01.jpg', '2f8ec41939948135c73de656ef73a3ab', 'e420e74a242550a84ce0dd563f13ad41bcbc8e1c', '1', '1591863926', '1591863926');
INSERT INTO `mg_image` VALUES ('1152', '20200611', '5ee1ea76bfe9f.jpg', 'news02.jpg', '23be20d9e0c662baec9a05ec7a5c46f2', '8082c35edd3c07db0417c3032f2a6ae78d99b72c', '1', '1591863926', '1591863926');
INSERT INTO `mg_image` VALUES ('1153', '20200611', '5ee1ea771c644.jpg', 'news03.jpg', '4853d80293d1c70cc1bc3c650c8d0fd3', '94b06d82acdb8abafdc746134016cdd80ea21749', '1', '1591863927', '1591863927');
INSERT INTO `mg_image` VALUES ('1154', '20200611', '5ee1ee0092816.png', 'now_cover.png', 'b907cbcd6f3d9023c5ef32e0526dae68', 'eb6d14103fff192a9fac7752cb52e2f9ebfd5a62', '1', '1591864832', '1591864832');
INSERT INTO `mg_image` VALUES ('1155', '20200611', '5ee1f1a38a6b7.jpg', 'banner02.jpg', '0db8f1bf6795ba87afe9f8a6ac449bb7', '97e46ebfa08789d7352d406a52321306703f15ae', '1', '1591865763', '1591865763');
INSERT INTO `mg_image` VALUES ('1156', '20200611', '5ee1f1f1b1a95.jpg', 'banner03.jpg', 'ce28caf990068387e5dac6c476ff4ee1', '79c29b00b1ec69b5477f5578ba31fec3dbe8fd71', '1', '1591865841', '1591865841');
INSERT INTO `mg_image` VALUES ('1157', '20200713', '5f0bfb5b4fe9f.jpg', 'FLEURPAVILIA01.jpg', 'd774c6240768fbe6efbc5f2802f84b3d', 'cd60c6502f21fcc1598ac8c68f095924a137cd86', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1158', '20200713', '5f0bfb5ba3035.jpg', 'FLEURPAVILIA02.jpg', 'e875f0c9a226628bb346edca9358875d', 'e007f543c0bde212b248ae4011deac95121cb203', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1159', '20200713', '5f0bfb5badc55.jpg', 'FLEURPAVILIA03.jpg', 'b3056424d8604763a227e8f2bcb383df', 'c7b6c29d0fc6def8bb3583201f32256159f929a6', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1160', '20200713', '5f0bfb5bb5a42.jpg', 'FLEURPAVILIA04.jpg', 'd386b4b63b5a20407ca10bfeda4529d9', '15f3c12995452cb784aa602dfbd0bdf9eceadfb0', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1161', '20200713', '5f0bfb5bc839e.jpg', 'FLEURPAVILIA05.jpg', 'e72c8ca0cb00b3af6aa6d8a22632a475', 'fc239a3fbefb8fcda87b5386fe918b57814675fd', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1162', '20200713', '5f0bfb5bd96b4.jpg', 'FLEURPAVILIA06.jpg', '5acb47094c55a220ccbcd0815c89c5fb', '6b5c6d93e86958e72af5a726740b2b4eca73e7fc', '1', '1594620763', '1594620763');
INSERT INTO `mg_image` VALUES ('1163', '20200713', '5f0bfb5c6997f.jpg', 'FLEURPAVILIA07.jpg', '6321f189440dd32fa57a15370b625b29', '481e3492ba611bc4f095ac3c7849061d39cb6b6e', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1164', '20200713', '5f0bfb5c71ecc.jpg', 'FLEURPAVILIA08.jpg', '213b8686bdb0b091de01962a5f0d1dfa', '63a33a2c8e45d122acbc07b4d05653258d6072f0', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1165', '20200713', '5f0bfb5c79f75.jpg', 'FLEURPAVILIA10.jpg', '0e493de4f5125bef5ce68f14655ae9d1', '01b549ee03fe76b2537eca7d3b8f06053edd3179', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1166', '20200713', '5f0bfb5c835cc.jpg', 'FLEURPAVILIA09.jpg', '87ae2f57d5339130fd2d912cf7f8403d', '7045a64c10e8983a3463cc724045bf4719703819', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1167', '20200713', '5f0bfb5c8e565.jpg', 'FLEURPAVILIA11.jpg', 'f176e558e7dbf53287d10e3d4a8cdab7', '2a3bd0dde6a83d00255f634e20e4ab5f7dca9166', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1168', '20200713', '5f0bfb5c980ab.jpg', 'FLEURPAVILIA13.jpg', 'edef51efd55d2db52d36772ef6758fcd', 'd6ba87ac2f793037897a56ecbc5be4d361e7ef86', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1169', '20200713', '5f0bfb5cbc00e.jpg', 'FLEURPAVILIA12.jpg', '30b83d74bb6ea0cd749f599f8f2effc9', '6e01f6d1a2d36a8fd2c80de4f55b4fc943c981cd', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1170', '20200713', '5f0bfb5cc9b72.jpg', 'FLEURPAVILIA14.jpg', '9b95fc6d835a07aa8e2050b9757b0f73', '0222e57b9f93a9f09d7a7a2d281d81bfaebb60cc', '1', '1594620764', '1594620764');
INSERT INTO `mg_image` VALUES ('1171', '20200713', '5f0bfb5db457a.jpg', 'FLEURPAVILIA15.jpg', 'b1252683cf636e2bcb971823e10a85d8', 'ff5fa1097040f03e8f0c14fd82de57abe2799683', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1172', '20200713', '5f0bfb5dba9bc.jpg', 'FLEURPAVILIA17.jpg', 'd455cdacdeeffb29d98ef0c9c6b8fcec', 'f94396ab0814c97ef563973e494a01925cc6a607', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1173', '20200713', '5f0bfb5dc3c48.jpg', 'FLEURPAVILIA16.jpg', '16f170e536bd68e6a48aca4dd5314ba9', '8013d11fe02baf727ce8f430815b8574c89a6fa9', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1174', '20200713', '5f0bfb5dcaa81.jpg', 'FLEURPAVILIA19.jpg', '0831877bc2b706dfb181c897e4191427', 'c01c92814faae011db64f9764cf8bc029c5973c3', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1175', '20200713', '5f0bfb5de0eda.jpg', 'FLEURPAVILIA18.jpg', '3a61b4402fc13a2219b2811f73fe1535', '5398337a1aa23697b7fcfc2f34add9bd7dc0e794', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1176', '20200713', '5f0bfb5de7680.jpg', 'FLEURPAVILIA20.jpg', 'daba27f9f85510618fbf6d90eeaed757', '6a02664b0ca3cf79ce67ba87ea646871ae309d88', '1', '1594620765', '1594620765');
INSERT INTO `mg_image` VALUES ('1177', '20200713', '5f0bfb5e117c1.jpg', 'FLEURPAVILIA21.jpg', 'a5f3f28fac3c84710e24542e9c8fdf12', 'b359ae1c37543223a3451f84698c3434ad3c4af4', '1', '1594620766', '1594620766');
INSERT INTO `mg_image` VALUES ('1178', '20200713', '5f0bfb5e415cc.jpg', 'FLEURPAVILIA24.jpg', 'cc45d882b35128417b737e72024fab6c', 'bf4560dcf0bed3f583fd1ea3c8428d51a9d311be', '1', '1594620766', '1594620766');
INSERT INTO `mg_image` VALUES ('1179', '20200713', '5f0bfb5e480c0.jpg', 'FLEURPAVILIA23.jpg', 'a74c7b01e653d41d43a7b4642e189ea6', '599cb05471838f5104e80a3b1e925a10cd804216', '1', '1594620766', '1594620766');
INSERT INTO `mg_image` VALUES ('1180', '20200713', '5f0bfb5f49d53.jpg', 'FLEURPAVILIA22.jpg', '301ad5da2d90d19eee0f986286a2ab13', 'b58fbad9253f063dd97f121c38cead6bf0c6a06f', '1', '1594620767', '1594620767');
INSERT INTO `mg_image` VALUES ('1181', '20200713', '5f0bfb5f52207.jpg', 'FLEURPAVILIA26.jpg', 'bc6337c5cf4fe5442bad0455ebffd56c', 'cb0b13784369949116ba36369a2efcc75788640c', '1', '1594620767', '1594620767');
INSERT INTO `mg_image` VALUES ('1182', '20200713', '5f0bfb5f5c6f3.jpg', 'FLEURPAVILIA25.jpg', '47d9c37f9d03f4ddc5953ccd45927600', '1d81e8d373b8a946d7cb5295f0d5134b59df5389', '1', '1594620767', '1594620767');
INSERT INTO `mg_image` VALUES ('1183', '20200713', '5f0c01e9e2bcc.jpg', 'GreenwoodTerrace 01.jpg', '37cfb1dc4cf6603a0859536e7186e242', '0fbf76c4fe6d4e1086b4fc960d5bd7c0be42acc5', '1', '1594622441', '1594624542');
INSERT INTO `mg_image` VALUES ('1184', '20200713', '5f0c01ea32c03.jpg', 'GreenwoodTerrace 02.jpg', 'e90a37fec446d5830063515050fa23e4', '063eb8271ee72d72d1938b343f84fc78816d0f21', '1', '1594622442', '1594624542');
INSERT INTO `mg_image` VALUES ('1185', '20200713', '5f0c01ea3be8f.jpg', 'GreenwoodTerrace 03.jpg', '91c55fb6792c4c60935d75318d4239f9', '2795c53fbe63583b12430fc2b44e9e41752fa291', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1186', '20200713', '5f0c01ea60d1f.jpg', 'GreenwoodTerrace 04.jpg', 'b59f7177fa7ebb35b6017b2ffef712ce', '5b475006737be81ee17ee6c6af33af887f8f6022', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1187', '20200713', '5f0c01eaba757.jpg', 'GreenwoodTerrace 07.jpg', '7f40bc65cbf42a6ac4533eb6a2cdc838', '95de8fad4cf33495c85d88d67efc686c8a47bb96', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1188', '20200713', '5f0c01eac5e9f.jpg', 'GreenwoodTerrace 05.jpg', '0d539e760f69caa874221aa809eb79e4', 'ff387efb62272bf32924bd39ee4e334fa02ab1a5', '1', '1594622442', '1594624542');
INSERT INTO `mg_image` VALUES ('1189', '20200713', '5f0c01eacce91.jpg', 'GreenwoodTerrace 09.jpg', '2efc6b446fbbf04a1419b87661dde583', '806a3718a26eab5751debf1304feb6b6cc7e1666', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1190', '20200713', '5f0c01ead37c5.jpg', 'GreenwoodTerrace08.jpg', '42fb2c8a1da3c9c0c5938b1d517c69b8', '88ed5b1001f9b37cba8b99a018f5bc0a5581689c', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1191', '20200713', '5f0c01eaddd0b.jpg', 'GreenwoodTerrace 06.jpg', 'bd31436893100d8ab0ad1b138df44a0a', '32d07db78d5a1ed1c017745b2f0a071c8558cbda', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1192', '20200713', '5f0c01eae973a.jpg', 'GreenwoodTerrace10.jpg', 'ac6ad0759d037db8a160c7d00faaba10', 'faaebefafa7efe49c5dc52ee13e556e4ddd7d4cd', '1', '1594622442', '1594624543');
INSERT INTO `mg_image` VALUES ('1193', '20200713', '5f0c01eb117fd.jpg', 'GreenwoodTerrace11.jpg', '6293bf3c452a0b0881c2990250668b66', '868b1d132a667b69c7f8f1a1f69d53eaf2d86edd', '1', '1594622443', '1594624543');
INSERT INTO `mg_image` VALUES ('1194', '20200713', '5f0c01ebc184f.jpg', 'GreenwoodTerrace14.jpg', 'ff3dfea7318d5c2471a3292bff9977d8', 'ce39ebb99984ae87b70230889f88354c9b196da5', '1', '1594622443', '1594624543');
INSERT INTO `mg_image` VALUES ('1195', '20200713', '5f0c01ec337cc.jpg', 'GreenwoodTerrace18.jpg', '13a5570cb4ddadda23b8769c11f7c8c0', 'c2d46024784e425364fd5f46d9b23e3077ceccbb', '1', '1594622444', '1594624543');
INSERT INTO `mg_image` VALUES ('1196', '20200713', '5f0c01ec65586.jpg', 'GreenwoodTerrace19.jpg', '61ccd7c23b524c9655fb1388f23539fd', '6600b7c93e7e43c69c042ac6fc30cec2b4564d70', '1', '1594622444', '1594624543');
INSERT INTO `mg_image` VALUES ('1197', '20200713', '5f0c01ec704e9.jpg', 'GreenwoodTerrace17.jpg', 'ac471b7bd55b5d93b4f70514e09bfe80', 'b6716cd1793d1f8c02cc3355e6bd25ae406cd1f8', '1', '1594622444', '1594624543');
INSERT INTO `mg_image` VALUES ('1198', '20200713', '5f0c01ed061b8.jpg', 'GreenwoodTerrace20.jpg', 'e6365d3a0194c3a335e9dab0c56ae943', '68789beb118c9194e249e9a06a6a7c0508ad846f', '1', '1594622445', '1594624543');
INSERT INTO `mg_image` VALUES ('1199', '20200713', '5f0c01eec2842.jpg', 'GreenwoodTerrace15.jpg', 'ca5e53c4a05db2f040649de5b2a51a16', '207e59622c03bdbddf600f5b382a68eeb1d319b2', '1', '1594622446', '1594624543');
INSERT INTO `mg_image` VALUES ('1200', '20200713', '5f0c01eec87f6.jpg', 'GreenwoodTerrace12.jpg', '434cb33f815ba015e63792c1cc9aba54', '899dbb25f7fa3d5ed752993a1c5256d5fb19ad0d', '1', '1594622446', '1594624543');
INSERT INTO `mg_image` VALUES ('1201', '20200713', '5f0c01f0581d2.jpg', 'GreenwoodTerrace13.jpg', '5ba3a7b8f0f6157b610f70a3ab0ab5b6', '8d23c46e9a5dc47a097060e8e798a05112117db8', '1', '1594622448', '1594624543');
INSERT INTO `mg_image` VALUES ('1202', '20200713', '5f0c01f2a53ed.jpg', 'GreenwoodTerrace16.jpg', 'c336c593075b50e081d37ab3ab50f6a2', 'ab7169a2ff01efee50d1dab1c4af59e988cdc74f', '1', '1594622450', '1594624543');
INSERT INTO `mg_image` VALUES ('1203', '20200713', '5f0c0a217a719.jpg', 'GreenwoodTerrace21.jpg', 'b51dccce5fe2444cfd3fa9eb5ead2dd3', '0c75c0e3fc6b5dbc4e97fa88c65cb5ed3962d5d6', '1', '1594624545', '1594624545');
INSERT INTO `mg_image` VALUES ('1204', '20200713', '5f0c0a2180e64.jpg', 'GreenwoodTerrace22.jpg', '435bd4d92f4cb80cff0bf40310372559', 'ca7ad8faf706a5f8c880c46586fd46447da78b52', '1', '1594624545', '1594624545');
INSERT INTO `mg_image` VALUES ('1205', '20200713', '5f0c0a21e8a49.jpg', 'GreenwoodTerrace23.jpg', '67100788bfb8e58e197bd9afa6052d69', 'ed8f81d0efdd6f1fccb25378cabdf72303a984a3', '1', '1594624545', '1594624545');
INSERT INTO `mg_image` VALUES ('1206', '20200713', '5f0c0a2216277.jpg', 'GreenwoodTerrace28.jpg', '9ec5a10e4d215cd0adb599bd6f5fd84b', 'f2eea42847d07fc778dae14e7d42fecad60f7c4b', '1', '1594624546', '1594624546');
INSERT INTO `mg_image` VALUES ('1207', '20200713', '5f0c0a22698c7.jpg', 'GreenwoodTerrace24.jpg', 'caf65980eb3efb1a7025756478a4285b', 'baa2d484496cc9b10159d9469aacf9b8f4a858c3', '1', '1594624546', '1594624546');
INSERT INTO `mg_image` VALUES ('1208', '20200713', '5f0c0a22effd5.jpg', 'GreenwoodTerrace26.jpg', 'a5007f61cd71cb26ade1fca020ad7455', 'bf86668568e85dfcb78cc89d4dc838a5c99e81de', '1', '1594624546', '1594624546');
INSERT INTO `mg_image` VALUES ('1209', '20200713', '5f0c0a23019a0.jpg', 'GreenwoodTerrace25.jpg', '59355cedd92113ab18c01fbf2dc49538', 'e2854c5e30650270452d9812ed77310cbdf7f3b1', '1', '1594624547', '1594624547');
INSERT INTO `mg_image` VALUES ('1210', '20200713', '5f0c0a2381796.jpg', 'GreenwoodTerrace27.jpg', '688a2b87ac3fa6b329d02a91c4555604', 'aadb64c1ee46187a94ba9d7ac3b4f177e4b558d4', '1', '1594624547', '1594624547');
INSERT INTO `mg_image` VALUES ('1211', '20200713', '5f0c0ab6700bf.jpg', 'KwanYick01.jpg', '1c5d83dae807b69d4c292381a44fa147', '6937b334630d7f14f2fe29de9fd286f040f3506c', '1', '1594624694', '1594624694');
INSERT INTO `mg_image` VALUES ('1212', '20200713', '5f0c0ab6e3fba.jpg', 'KwanYick02.jpg', '8951b4103ce87aa5d298475462f53510', 'a6c41d52d08dcd7572ee866994b08764ed18f10f', '1', '1594624694', '1594624694');
INSERT INTO `mg_image` VALUES ('1213', '20200713', '5f0c0ab72a46f.jpg', 'KwanYick03.jpg', '6603c68e1a4c11f63854bbbc285efa5d', '42a03227b7c17cb46963302353a547920d4e51a1', '1', '1594624695', '1594624695');
INSERT INTO `mg_image` VALUES ('1214', '20200713', '5f0c0ab734d57.jpg', 'KwanYick07.jpg', '10c2ea5e4217b8541613d7ce5620c299', '07195e922e215b2a0f5ca9ea621396bb735705e8', '1', '1594624695', '1594624695');
INSERT INTO `mg_image` VALUES ('1215', '20200713', '5f0c0ab86a81a.jpg', 'KwanYick05.jpg', '755502986d21d2ae87e64626f6040bf2', '77eb89f0fd5bace84c13c15babca49a0442a3ccf', '1', '1594624696', '1594624696');
INSERT INTO `mg_image` VALUES ('1216', '20200713', '5f0c0ab873b17.jpg', 'KwanYick08.jpg', '13ad92423554adae9469a191a640e12b', '30c5415967545c61613af9234b808ed910c730dd', '1', '1594624696', '1594624696');
INSERT INTO `mg_image` VALUES ('1217', '20200713', '5f0c0ab87b206.jpg', 'KwanYick09.jpg', '43894f26dd35264c785850206ee754d1', '14ee519615d9bbceeb08823ef9420b5ce0391540', '1', '1594624696', '1594624696');
INSERT INTO `mg_image` VALUES ('1218', '20200713', '5f0c0ab884463.jpg', 'KwanYick04.jpg', 'fd6c97970e707a75132a0e1339bcc574', '5102c678dc323c44178ad49e6f4bf17f4a2dfdfb', '1', '1594624696', '1594624696');
INSERT INTO `mg_image` VALUES ('1219', '20200713', '5f0c0ab88be26.jpg', 'KwanYick06.jpg', '97748628205f34e7ca4bfe7b4e6b8524', '8a4b7256f2deb0d327a6563d7f212119b9b5cfd2', '1', '1594624696', '1594624696');
INSERT INTO `mg_image` VALUES ('1220', '20200713', '5f0c0ab90cf61.jpg', 'KwanYick15.jpg', 'd2ee8ed082cd306c1e0d6920fd63b523', '3ca3f7ddbbf497c087dc816b67dff4469b886c47', '1', '1594624697', '1594624697');
INSERT INTO `mg_image` VALUES ('1221', '20200713', '5f0c0ab93a70a.jpg', 'KwanYick11.jpg', '9646ec87f1818cea6650e875406a8048', 'b853069f67db951e3b62e6bbb3666dcc20c8387d', '1', '1594624697', '1594624697');
INSERT INTO `mg_image` VALUES ('1222', '20200713', '5f0c0ab96fa7e.jpg', 'KwanYick12.jpg', 'c36817a103f8e0ca498053be08f3895b', '62ce2c988d463caa9890a7de2d023d84d7e87e4b', '1', '1594624697', '1594624697');
INSERT INTO `mg_image` VALUES ('1223', '20200713', '5f0c0ab981b86.jpg', 'KwanYick13.jpg', '5b156840621718a45056af5da3f0de61', '7a6b885d39410e11f5bf2ff9e33bb3a4e875c464', '1', '1594624697', '1594624697');
INSERT INTO `mg_image` VALUES ('1224', '20200713', '5f0c0aba518e5.jpg', 'KwanYick18.jpg', 'c48797760fa2792b2072b819ae541247', '9d205999de5c25ed81ada06efd12e819df262201', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1225', '20200713', '5f0c0aba57c22.jpg', 'KwanYick16.jpg', '5ce586b41f08293bc95156b48e9a2aaf', '541f0a73f347e7ca48d8d785f244c2eeb2d7e35d', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1226', '20200713', '5f0c0aba5f9b7.jpg', 'KwanYick17.jpg', '98e17b55ddf45f2307a2e43725271ebf', 'bb5b8e89b5aa2bee945db7b9b25749cc03131620', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1227', '20200713', '5f0c0aba68087.jpg', 'KwanYick19.jpg', 'c9491c2cf8893f8e314ff6742c82e541', '0dd0b23de8b36fc180cc68243c9e2041df09e1bf', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1228', '20200713', '5f0c0aba84340.jpg', 'KwanYick14.jpg', '84f60ec374fb36d4c7529c8764b81420', '4115abd89ecc23b9db801f0408829766b5612851', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1229', '20200713', '5f0c0abaa591d.jpg', 'KwanYick22.jpg', '57bbd7e842b991d0bc547990f1b6e69f', '5b292d1cd9669bb6bfd09dce5ac290f6c8c2442b', '1', '1594624698', '1594624698');
INSERT INTO `mg_image` VALUES ('1230', '20200713', '5f0c0abb19686.jpg', 'KwanYick25.jpg', 'b77c19ab109379daf4ccc07d4b076bb6', 'c23ae92f0683296e80e69596231751ea9f64835b', '1', '1594624699', '1594624699');
INSERT INTO `mg_image` VALUES ('1231', '20200713', '5f0c0abb43332.jpg', 'KwanYick20.jpg', '3098838e1695f0dae58f802c3299eafc', '063ffc2447863f78947d15c63afae4d501376928', '1', '1594624699', '1594624699');
INSERT INTO `mg_image` VALUES ('1232', '20200713', '5f0c0abb62785.jpg', 'KwanYick10.jpg', 'd479da2d40e077237ecef5c9f75f8e6c', '682c65a4e377315f6b491ddb5384fb9b2b84afe7', '1', '1594624699', '1594624699');
INSERT INTO `mg_image` VALUES ('1233', '20200713', '5f0c0abd62d81.jpg', 'KwanYick23.jpg', '57ef5dc00b2cf83520fe6768c4eae826', '27d1dbbdc5c2643c07173c6594a08b71b22c4c2c', '1', '1594624701', '1594624701');
INSERT INTO `mg_image` VALUES ('1234', '20200713', '5f0c0abd6ba11.jpg', 'KwanYick21.jpg', '10f529d077d846430d4d8b705c6b13c8', '55fca380cc3b859131c3d9601653ebf5fd04acf1', '1', '1594624701', '1594624701');
INSERT INTO `mg_image` VALUES ('1235', '20200713', '5f0c0abd74658.jpg', 'KwanYick26.jpg', '4af449383304b0961c7924bb90538979', '72405eb3cf90bb469b787252c553e19210f428fa', '1', '1594624701', '1594624701');
INSERT INTO `mg_image` VALUES ('1236', '20200713', '5f0c0abde10b0.jpg', 'KwanYick24.jpg', '723e2ab25067eec65614d9740290b3d0', '7e2f15b944c2344e6527e3ced7df47ee78528efb', '1', '1594624701', '1594624701');
INSERT INTO `mg_image` VALUES ('1237', '20200713', '5f0c0b139c816.jpg', 'ManhattanHill36F_01.jpg', 'd8febb401138524b189ce0689adc98ca', 'aedaa2f17287ddc86e097ae696d90b140423c91c', '1', '1594624787', '1594624787');
INSERT INTO `mg_image` VALUES ('1238', '20200713', '5f0c0b13ee555.jpg', 'ManhattanHill36F_02.jpg', 'f04e0561afe44715437b0bb881ae04ed', '95ecbeb71a9017e4960f38c3e10f30a9f47b21c0', '1', '1594624787', '1594624787');
INSERT INTO `mg_image` VALUES ('1239', '20200713', '5f0c0b14028ee.jpg', 'ManhattanHill36F_03.jpg', 'bd6b59fc02b53b7b18ad3243570a2f54', '6c68d0a6fff17a08ced69807352b4fbad2e5d5e6', '1', '1594624788', '1594624788');
INSERT INTO `mg_image` VALUES ('1240', '20200713', '5f0c0b1599c70.jpg', 'ManhattanHill36F_04.jpg', '2a0b5d05b29f63300b77f444e1927533', 'f9974f8e38675f4e1b748c1184c1e36fc4a43d14', '1', '1594624789', '1594624789');
INSERT INTO `mg_image` VALUES ('1241', '20200713', '5f0c0b1621d3c.jpg', 'ManhattanHill36F_07.jpg', 'ca9127b59236f1b418f124373b6f75f3', '9df6da563a55ecdfc82b8e5ee200e510272cdca8', '1', '1594624790', '1594624790');
INSERT INTO `mg_image` VALUES ('1242', '20200713', '5f0c0b16293c5.jpg', 'ManhattanHill36F_05.jpg', '98ebeddce334b689926d1a1d800a0d5a', '434bb3e412297e6d81e3b68c4dd59db24da1c66b', '1', '1594624790', '1594624790');
INSERT INTO `mg_image` VALUES ('1243', '20200713', '5f0c0b1644243.jpg', 'ManhattanHill36F_06.jpg', '3ba2443f73b56cd5afd525e440f1dc5b', '572350b534a21157782ad5b4bb611ccb939dc5ae', '1', '1594624790', '1594624790');
INSERT INTO `mg_image` VALUES ('1244', '20200713', '5f0c0b17cc348.jpg', 'ManhattanHill36F_10.jpg', '6a408cf8f1f32a3f20309676ff031ef5', 'bc388cb9f73f03bc23495b1a303fcdd0c0a44299', '1', '1594624791', '1594624791');
INSERT INTO `mg_image` VALUES ('1245', '20200713', '5f0c0b17d2399.jpg', 'ManhattanHill36F_12.jpg', '00462478029ba5d2b2042ae354a8e652', '6013cb213e9d3332e18eee904af439f70e24584d', '1', '1594624791', '1594624791');
INSERT INTO `mg_image` VALUES ('1246', '20200713', '5f0c0b186f844.jpg', 'ManhattanHill36F_13.jpg', '365c6e4eb83a64261025caea339fbcc6', 'a4983e54efbb43859da47cce7f5b54eaee6b64a2', '1', '1594624792', '1594624792');
INSERT INTO `mg_image` VALUES ('1247', '20200713', '5f0c0b18776f7.jpg', 'ManhattanHill36F_11.jpg', '3aaed21c491903080f87c8549751f7f5', '23359a7224db0a97f15f2b3a53485e8f8271bda6', '1', '1594624792', '1594624792');
INSERT INTO `mg_image` VALUES ('1248', '20200713', '5f0c0b196ad26.jpg', 'ManhattanHill36F_08.jpg', '9a34f3d17d24510b0a3c2dabfaa3e548', 'a68f0fff13737ed10b8ab06dce49ebb01c781bdc', '1', '1594624793', '1594624793');
INSERT INTO `mg_image` VALUES ('1249', '20200713', '5f0c0b19b6ffd.jpg', 'ManhattanHill36F_09.jpg', 'cecb58584aa315bd30c21ee82ea16f36', '27da1fa542cc34bcce361b49857cf8ea72711466', '1', '1594624793', '1594624793');
INSERT INTO `mg_image` VALUES ('1250', '20200713', '5f0c0b8aea7ca.jpg', 'TheHermitage_8B_01.jpg', '97889f183ac83199a75661e0d46f6d29', '8d9c123547d17cf403dbc3127912364d45934870', '1', '1594624906', '1594624906');
INSERT INTO `mg_image` VALUES ('1251', '20200713', '5f0c0b8b6398a.jpg', 'TheHermitage_8B_02.jpg', 'a4bd0c6e2d4fe04953503188a805f6e2', '54cd366f3346a311567ca0540720e12c0518fd23', '1', '1594624907', '1594624907');
INSERT INTO `mg_image` VALUES ('1252', '20200713', '5f0c0b8b6cdf6.jpg', 'TheHermitage_8B_03.jpg', 'bbd00596c30fc1895f507cb772e82297', '08fb74b165912e5f1b963f5f741feff3b35f9d0c', '1', '1594624907', '1594624907');
INSERT INTO `mg_image` VALUES ('1253', '20200713', '5f0c0b8cc5519.jpg', 'TheHermitage_8B_04.jpg', 'd1a05f65caa83e3a89663c49849e036e', '9f88b484177f2c27eeeb7c40b79df83cab1f79eb', '1', '1594624908', '1594624908');
INSERT INTO `mg_image` VALUES ('1254', '20200713', '5f0c0b8d20342.jpg', 'TheHermitage_8B_05.jpg', '67cf5310a9c6d4831f44df295f7edeeb', '0ca82263df0a015a09fb77736cf154e2d6921e8b', '1', '1594624909', '1594624909');
INSERT INTO `mg_image` VALUES ('1255', '20200713', '5f0c0b8d340c6.jpg', 'TheHermitage_8B_08.jpg', 'bf24b1b71de720afc024efa6f6807043', '187c659da31cdcdb23d43912e2b1404519713cb2', '1', '1594624909', '1594624909');
INSERT INTO `mg_image` VALUES ('1256', '20200713', '5f0c0b8e00215.jpg', 'TheHermitage_8B_11.jpg', 'ed65d7b5e3c2a5ca443ee4478a892038', 'cf194f6f735c8f8ec49797f5fea1afb6b9cbe02d', '1', '1594624909', '1594624909');
INSERT INTO `mg_image` VALUES ('1257', '20200713', '5f0c0b8e5cc7e.jpg', 'TheHermitage_8B_13.jpg', '40057a1056cbbae6721b0906a5105764', 'e00609937f5271f5176ace416a34e7936b353131', '1', '1594624910', '1594624910');
INSERT INTO `mg_image` VALUES ('1258', '20200713', '5f0c0b8e888a4.jpg', 'TheHermitage_8B_14.jpg', '1fabb9837cd99d5b2581d4413d4572b3', 'c927d69a675b76f8842bc40f69423a6f7a986b9e', '1', '1594624910', '1594624910');
INSERT INTO `mg_image` VALUES ('1259', '20200713', '5f0c0b8eb9269.jpg', 'TheHermitage_8B_15.jpg', '0463e66329256aa89ba584af65d2b048', '9cd0ca3ea7d15580e1f733d1acc0338c44748cb3', '1', '1594624910', '1594624910');
INSERT INTO `mg_image` VALUES ('1260', '20200713', '5f0c0b8eebbf1.jpg', 'TheHermitage_8B_16.jpg', 'a16f393209a07ed0b401e29cc89c759c', 'ac025cfac0507951416c6ef36e458c23816d8aa0', '1', '1594624910', '1594624910');
INSERT INTO `mg_image` VALUES ('1261', '20200713', '5f0c0b8f37cb8.jpg', 'TheHermitage_8B_17.jpg', 'e9e20f72c5b26a49bfb43888462fb768', '2bb1a92328b7dd88bfba27ea3abd9c089a906b59', '1', '1594624911', '1594624911');
INSERT INTO `mg_image` VALUES ('1262', '20200713', '5f0c0b8f4dab8.jpg', 'TheHermitage_8B_06.jpg', '4948c01144f8b33904eb3ea2568aba61', '4a9f2f6a60ef22e0f643e8e6553ba9dd6a10d544', '1', '1594624911', '1594624911');
INSERT INTO `mg_image` VALUES ('1263', '20200713', '5f0c0b8f9f897.jpg', 'TheHermitage_8B_10.jpg', 'a2023888ed5001b0c6eb177ffea2b9f6', 'cd136806a16304e30267545a14d6135de5709c6e', '1', '1594624911', '1594624911');
INSERT INTO `mg_image` VALUES ('1264', '20200713', '5f0c0b8fbcb6f.jpg', 'TheHermitage_8B_09.jpg', '4b7993948796f9b05fefb677a83602cf', '0a0ebcf117801723167da0afa35c261b5dda5f43', '1', '1594624911', '1594624911');
INSERT INTO `mg_image` VALUES ('1265', '20200713', '5f0c0b902a00b.jpg', 'TheHermitage_8B_18.jpg', 'aedc4ad55573f01a573c6c54badd6547', 'bb86e1bebfaac1da2ad2f44059a4f0e2544b0e92', '1', '1594624912', '1594624912');
INSERT INTO `mg_image` VALUES ('1266', '20200713', '5f0c0b90f1dc2.jpg', 'TheHermitage_8B_20.jpg', '839dc40d397a44ad7a6569f55b0f80ec', '27b8643db088050d240e29438ed2b5c42d07fc4b', '1', '1594624912', '1594624912');
INSERT INTO `mg_image` VALUES ('1267', '20200713', '5f0c0b910426e.jpg', 'TheHermitage_8B_22.jpg', 'b426fb5b5b47a573a770f058eb667dce', '85eadf4342b9fcccb1357aea9c18605d07f6d8ca', '1', '1594624913', '1594624913');
INSERT INTO `mg_image` VALUES ('1268', '20200713', '5f0c0b917c371.jpg', 'TheHermitage_8B_24.jpg', '25dcff7c98ae41bebf889626483b9a51', 'dd6f8825609e2d058315c0e4396decedab174d87', '1', '1594624913', '1594624913');
INSERT INTO `mg_image` VALUES ('1269', '20200713', '5f0c0b91ba700.jpg', 'TheHermitage_8B_19.jpg', '05cde5f3fa10723d08c6abf5572f9f5e', 'e7053338815a567595eb22538f945c8d94c640f9', '1', '1594624913', '1594624913');
INSERT INTO `mg_image` VALUES ('1270', '20200713', '5f0c0b91cb85c.jpg', 'TheHermitage_8B_12.jpg', '30f38cb861c3882eb6a6a837bfa26b2c', '976e0737edb4c41f6e8a86fd776aa55c22300624', '1', '1594624913', '1594624913');
INSERT INTO `mg_image` VALUES ('1271', '20200713', '5f0c0b9201f02.jpg', 'TheHermitage_8B_25.jpg', 'dc150c231a33b31449465eb08e75972b', '81a2e9f3ed68ab7c5cf950c00610504e1ae057f3', '1', '1594624914', '1594624914');
INSERT INTO `mg_image` VALUES ('1272', '20200713', '5f0c0b9209905.jpg', 'TheHermitage_8B_21.jpg', '5e8374f1ebdc5ba0262f1fc620e63ce0', '2520870049ef51a0ef8f60b7416d7048745087ae', '1', '1594624914', '1594624914');
INSERT INTO `mg_image` VALUES ('1273', '20200713', '5f0c0b925bca7.jpg', 'TheHermitage_8B_28.jpg', 'da2ab4faec6c7b1142f5abc890992e4d', '5675597fdf3a8e7403136ece77a7266bdcc97c75', '1', '1594624914', '1594624914');
INSERT INTO `mg_image` VALUES ('1274', '20200713', '5f0c0b927791a.jpg', 'TheHermitage_8B_23.jpg', '74fc9f2ec6696fdb97d6ed33eb6f07aa', '2ee051d56cd7d99900c2ed94430851bf2cc56a38', '1', '1594624914', '1594624914');
INSERT INTO `mg_image` VALUES ('1275', '20200713', '5f0c0b94bc911.jpg', 'TheHermitage_8B_07.jpg', 'b4e6b8d1d414d15b44c564e2ae344ae8', '7cf4cec6f2033d2c3cdb7acbb74110b33f4d78f5', '1', '1594624916', '1594624916');
INSERT INTO `mg_image` VALUES ('1276', '20200713', '5f0c0b94ca0db.jpg', 'TheHermitage_8B_26.jpg', '58cc08f97ace71fa19e9a2369b0251e0', '92217343d9fa175ad9f6dba1711e35253cd4d5a6', '1', '1594624916', '1594624916');
INSERT INTO `mg_image` VALUES ('1277', '20200713', '5f0c0b94d25d0.jpg', 'TheHermitage_8B_29.jpg', '0e23f10255f3885ef65f3c54b93789aa', '3d98a6aa1322f0350fb8ea3e4fdff094b8cd7172', '1', '1594624916', '1594624916');
INSERT INTO `mg_image` VALUES ('1278', '20200713', '5f0c0b94dc380.jpg', 'TheHermitage_8B_27.jpg', 'ad69557ecd40396aeaf6308844712eea', 'c4eb0c8194fd727a2af7ca8ba09e4f0bf545a7d4', '1', '1594624916', '1594624916');
INSERT INTO `mg_image` VALUES ('1279', '20200713', '5f0c0cc8c4053.jpg', 'Hermita60A_01.jpg', 'fc27f7756086af21fff3f30608bb5353', '9aa4cbef7b94352de2c2842dcb88ba9bdfb75a76', '1', '1594625224', '1594625224');
INSERT INTO `mg_image` VALUES ('1280', '20200713', '5f0c0cc92b25d.jpg', 'Hermita60A_02.jpg', 'd0a864f157db9137ce4621777da3e4fd', '2db95a5727313eaf4df910ceae3d18e9413dc953', '1', '1594625225', '1594625225');
INSERT INTO `mg_image` VALUES ('1281', '20200713', '5f0c0cc93a665.jpg', 'Hermita60A_03.jpg', '0c38d10092d272f33d2f30d698910bad', 'eb0eeebf134d7787e080662c8fb118507d3596e3', '1', '1594625225', '1594625225');
INSERT INTO `mg_image` VALUES ('1282', '20200713', '5f0c0cc943d79.jpg', 'Hermita60A_04.jpg', '5209993b425889e2eb72eb4be0a65e04', 'bfe76c764cd1e2fd9abf2c3e0613091415392242', '1', '1594625225', '1594625225');
INSERT INTO `mg_image` VALUES ('1283', '20200713', '5f0c0ccb1a419.jpg', 'Hermita60A_08.jpg', 'f3c65c9b272320d56656355fd5b39e18', '2601e9e16bca3ae8d29039896e0e12a58abb838a', '1', '1594625227', '1594625227');
INSERT INTO `mg_image` VALUES ('1284', '20200713', '5f0c0ccb9498a.jpg', 'Hermita60A_07.jpg', '6a5c46c610f268e9b3f10a1b6c882fd3', 'e972416f75cd0bf6f2c7637dfc5a58983eef0476', '1', '1594625227', '1594625227');
INSERT INTO `mg_image` VALUES ('1285', '20200713', '5f0c0ccc070ff.jpg', 'Hermita60A_05.jpg', '2aa8a73f004ef801882c157fd3e3800e', 'd8011ba52731bdcb33e55e4c21a68c6a0818cb6c', '1', '1594625228', '1594625228');
INSERT INTO `mg_image` VALUES ('1286', '20200713', '5f0c0ccc8ac4e.jpg', 'Hermita60A_06.jpg', 'c5e8badd2facf4660118152160f6e3bb', 'b5ea6a54c15f471cf282dfb96e2dd575b66a7ae2', '1', '1594625228', '1594625228');
INSERT INTO `mg_image` VALUES ('1287', '20200713', '5f0c0cce1cc41.jpg', 'Hermita60A_11.jpg', '158dc4bb9c3b1f59f863347d5f1b6aad', 'ae611a6efdb031ab6d987fb427b1f4207ad72976', '1', '1594625230', '1594625230');
INSERT INTO `mg_image` VALUES ('1288', '20200713', '5f0c0ccf59b8c.jpg', 'Hermita60A_10.jpg', '4cb6a329e041e5267c96dcac86c4f158', 'c3298cdb084d1f657e7df51b2698bc7b92911e5e', '1', '1594625231', '1594625231');
INSERT INTO `mg_image` VALUES ('1289', '20200713', '5f0c0cd071d63.jpg', 'Hermita60A_09.jpg', 'e26ae13395720cf14ad24dd04a9d417b', 'cfd134f3a909bcbc042fb193392404e48f8adbca', '1', '1594625232', '1594625232');
INSERT INTO `mg_image` VALUES ('1290', '20200713', '5f0c0d0a21723.jpg', 'Hermita69C_01.jpg', '473dffc3c0c8cda579049c477a047338', '6450f24258a55446dba26c3ff6dfbec343ce8e53', '1', '1594625290', '1594625290');
INSERT INTO `mg_image` VALUES ('1291', '20200713', '5f0c0d0a74ee7.jpg', 'Hermita69C_02.jpg', '91a648c6bde34d594396087b7029c2ff', '633df6551c659d28cbeabe7c3234eb7edfec8668', '1', '1594625290', '1594625290');
INSERT INTO `mg_image` VALUES ('1292', '20200713', '5f0c0d0b2ec67.jpg', 'Hermita69C_03.jpg', '150a55bbe237c5b399313f95fbe71b34', 'debee05e2a834464315f9a192d7700f6bd0dd7d5', '1', '1594625291', '1594625291');
INSERT INTO `mg_image` VALUES ('1293', '20200713', '5f0c0d0bc50db.jpg', 'Hermita69C_04.jpg', 'd31b3afd8cd6d9593b2a581391fd2cd0', '093bea3f91e20613a8e911d55187b4c3d6a4afb3', '1', '1594625291', '1594625291');
INSERT INTO `mg_image` VALUES ('1294', '20200713', '5f0c0d0c45f13.jpg', 'Hermita69C_09.jpg', '315dbad25701b747be013ccf2ff75560', '6b2f6987bcde7faa4e9c8c01600a5187c875bff8', '1', '1594625292', '1594625292');
INSERT INTO `mg_image` VALUES ('1295', '20200713', '5f0c0d0c91686.jpg', 'Hermita69C_10.jpg', 'ad19e052d038ae8b97a118f410c7a250', '927a888a43400e7b74020848a996162e55e4b499', '1', '1594625292', '1594625292');
INSERT INTO `mg_image` VALUES ('1296', '20200713', '5f0c0d0d0285b.jpg', 'Hermita69C_05.jpg', '386a593a4e18dc9d9779530b5400a916', '09a176d40eb375cb37b3f8f4756e4b1ef8b435c3', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1297', '20200713', '5f0c0d0d09946.jpg', 'Hermita69C_12.jpg', 'f83aac4c2ba2105b5f80cee7519ab86c', '042c5b9b194b7eb3dd7e19293538d26b6749b1a6', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1298', '20200713', '5f0c0d0d103da.jpg', 'Hermita69C_07.jpg', '6b4bf8d352248fb3ff6637fbd5ee3c72', '751784247fc4ec7f5017889df9f65802f55084c6', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1299', '20200713', '5f0c0d0d7a1f8.jpg', 'Hermita69C_14.jpg', 'b41210fc9040aa4b60ec7df69640f6c9', 'a7ddb3cb060d34d9cc87b9ffbfa8f3f65c3186df', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1300', '20200713', '5f0c0d0da2578.jpg', 'Hermita69C_06.jpg', 'd9d3837e3bd56977823b98652d83231a', '3c6a8a0bba76935ec5011bd755d1a6342cacfd89', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1301', '20200713', '5f0c0d0dbe802.jpg', 'Hermita69C_16.jpg', 'e6c0ba38c98f2eed6ed9c5453ef05612', '8d7597f75bc87fac3579af46302b9ed39e552de6', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1302', '20200713', '5f0c0d0dded96.jpg', 'Hermita69C_13.jpg', '5761aad960f24f2830c36ec6f21ab734', '2c68832fb172101641023db38b1a95dfac7a78a9', '1', '1594625293', '1594625293');
INSERT INTO `mg_image` VALUES ('1303', '20200713', '5f0c0d0e26536.jpg', 'Hermita69C_17a.jpg', 'b4c464df2113e9646483836b9909c6c1', '8f2ea71fc6adbbc01d607cbf4d4c0030f9ac389e', '1', '1594625294', '1594625294');
INSERT INTO `mg_image` VALUES ('1304', '20200713', '5f0c0d0eb19ac.jpg', 'Hermita69C_19.jpg', 'eb304a61cdb68028e60c0af86a8e3855', 'c0e34919d1adf1d154fc0dd110ee86c35f08bd38', '1', '1594625294', '1594625294');
INSERT INTO `mg_image` VALUES ('1305', '20200713', '5f0c0d0eb9adf.jpg', 'Hermita69C_17.jpg', '1b0d46654c22a0106d3919e567b18afe', '106677299cfa8651f81d00555b76570c6090e7d5', '1', '1594625294', '1594625294');
INSERT INTO `mg_image` VALUES ('1306', '20200713', '5f0c0d0ec89a8.jpg', 'Hermita69C_11.jpg', '0722ebc27a35b95f1a86dd746dffe160', '95a24e7c852f848b93030766ae658b71e37be48b', '1', '1594625294', '1594625294');
INSERT INTO `mg_image` VALUES ('1307', '20200713', '5f0c0d0f0ba07.jpg', 'Hermita69C_08.jpg', '47f274456775a772681bbf9124e2d214', '42b006802654ead3aac35fdb40dffe210a6984e0', '1', '1594625295', '1594625295');
INSERT INTO `mg_image` VALUES ('1308', '20200713', '5f0c0d0f1302b.jpg', 'Hermita69C_20.jpg', '1e5f45671d5248308abdba284d83f7cb', 'd1e1840c1bdaa93d6a5cb7a21acc8d2cfa0e0bc3', '1', '1594625295', '1594625295');
INSERT INTO `mg_image` VALUES ('1309', '20200713', '5f0c0d0f73d03.jpg', 'Hermita69C_22.jpg', '95a394f6af3054d44f841d33a0ddab76', 'dc54ab796c7065ea2878a71584a4a26f44417afe', '1', '1594625295', '1594625295');
INSERT INTO `mg_image` VALUES ('1310', '20200713', '5f0c0d0f80bc5.jpg', 'Hermita69C_15.jpg', 'f5066a792e96a2f4f6f761b79e160815', '498ab99621d425f002438fdee29a3d8026f2ee19', '1', '1594625295', '1594625295');
INSERT INTO `mg_image` VALUES ('1311', '20200713', '5f0c0d0f89ea7.jpg', 'Hermita69C_24.jpg', '13a1087bd83ed499bc3ac0beb9af7ac4', 'b067ddf5c7ef7e3c67f7f4a745d326d60d550a2e', '1', '1594625295', '1594625295');
INSERT INTO `mg_image` VALUES ('1312', '20200713', '5f0c0d117660b.jpg', 'Hermita69C_18.jpg', '5704b1deec17d5e9d8eb25a4ea033ce8', '5d3d69d24d6220eb12b2b7dccfb6a77ed5183dcd', '1', '1594625297', '1594625297');
INSERT INTO `mg_image` VALUES ('1313', '20200713', '5f0c0d117d11c.jpg', 'Hermita69C_26.jpg', '541e15f035e1459ca7a03f06ea8810f9', '31c49e0c7a1db0fa73d715751b8691f4f796e8eb', '1', '1594625297', '1594625297');
INSERT INTO `mg_image` VALUES ('1314', '20200713', '5f0c0d1182cc1.jpg', 'Hermita69C_25.jpg', 'e7474c0e5a64ab2461ec5cf63d6f1e89', 'c34499e6ed6c36a023aa75eb4f1d93bc2e4a440b', '1', '1594625297', '1594625297');
INSERT INTO `mg_image` VALUES ('1315', '20200713', '5f0c0d1192ba0.jpg', 'Hermita69C_21.jpg', 'cb89cd406665b068b8d12061f1175e4d', '9a0fcd8edd8437f1f0fbf1dc536ed691aad8af8e', '1', '1594625297', '1594625297');
INSERT INTO `mg_image` VALUES ('1316', '20200713', '5f0c0d1352817.jpg', 'Hermita69C_23.jpg', '133b8377a6206bc025578ebdef3defa5', 'd2b33cd2f479c2fd25fa79914331487efdaea841', '1', '1594625299', '1594625299');
INSERT INTO `mg_image` VALUES ('1317', '20200713', '5f0c0d7278ce1.jpg', 'Monterey_01.jpg', '48a9310379758190f75d6cf436007ad6', 'a59cd0476c26e2925e436b31f2f3d8177eb844a7', '1', '1594625394', '1594625394');
INSERT INTO `mg_image` VALUES ('1318', '20200713', '5f0c0d72c1905.jpg', 'Monterey_02.jpg', '7db7863785a07ac378aaa47c0be07cf8', '9d1a186cd293f91394f472c0f8fc6e87a9daa002', '1', '1594625394', '1594625394');
INSERT INTO `mg_image` VALUES ('1319', '20200713', '5f0c0d72d2ee7.jpg', 'Monterey_03.jpg', '90e957832cc84aa2ca458aa463582e75', 'ed6b7d082126f538582344fe97fe062f7f4996e5', '1', '1594625394', '1594625394');
INSERT INTO `mg_image` VALUES ('1320', '20200713', '5f0c0d7335add.jpg', 'Monterey_08.jpg', 'cd84976df2e95a8b63b53eb16f18fb8c', '0d41ed04eb840e11a551df29af5d682969e8c81b', '1', '1594625395', '1594625395');
INSERT INTO `mg_image` VALUES ('1321', '20200713', '5f0c0d73b854d.jpg', 'Monterey_05.jpg', 'fa23f7b505700a8deb1bf7d8ec40baa4', 'd1ab7c1f800d38ce6a250e1d2fb3bc6ed7176827', '1', '1594625395', '1594625395');
INSERT INTO `mg_image` VALUES ('1322', '20200713', '5f0c0d74040a9.jpg', 'Monterey_06.jpg', '583bae3839deabe34df413e96bebd39b', '972a32b9011a859e024f6b070f3ad4834d62af5a', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1323', '20200713', '5f0c0d743ea90.jpg', 'Monterey_09.jpg', 'fef958dd4d3740cd5d596009b52d9e56', 'ea30f167361a92ff73930b79bb01c835404a6d75', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1324', '20200713', '5f0c0d74463f7.jpg', 'Monterey_07.jpg', 'd2f79b7d3d250f34378fb38e3a114ff9', '5a503b37734a673cd51daf7fc20b70377b00b191', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1325', '20200713', '5f0c0d748ae4f.jpg', 'Monterey_04.jpg', '2fbea3d745bc6b02578caa3a614b6ed4', 'c69382170ad4c322e21215ba1ecbbe70e6ea22d8', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1326', '20200713', '5f0c0d74938a9.jpg', 'Monterey_11.jpg', 'de15fd4260122b607549b49c306ded9b', '77c04b854fa2dc53bab71efe229bbabbda1af606', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1327', '20200713', '5f0c0d749a3cc.jpg', 'Monterey_12.jpg', 'dce8d2fd999a0c1cdbde1f2825917c48', '677bd51471eda1af6677f0bf0520c9fb835dcf80', '1', '1594625396', '1594625396');
INSERT INTO `mg_image` VALUES ('1328', '20200713', '5f0c0d7585707.jpg', 'Monterey_15.jpg', '6cd3be660296735340ce9d5957d90ae9', '8056a71f6812174ebb0c8df4c8723c27978a1d32', '1', '1594625397', '1594625397');
INSERT INTO `mg_image` VALUES ('1329', '20200713', '5f0c0d758e6e3.jpg', 'Monterey_13.jpg', '09b6f6d11b82fa1f540513c48290fb99', '0bc154d097bfbbee044189339bd370fd222b52d1', '1', '1594625397', '1594625397');
INSERT INTO `mg_image` VALUES ('1330', '20200713', '5f0c0d7597222.jpg', 'Monterey_10.jpg', '09470ca29a4712d6c526d8c8da3a92ed', '773321aee62e5de22fe96c6a0f4477ef7bfb8156', '1', '1594625397', '1594625397');
INSERT INTO `mg_image` VALUES ('1331', '20200713', '5f0c0d759fee1.jpg', 'Monterey_16.jpg', '76696abd1bc2d1987176970f6b05dc20', '927fc18f41dc0248cf95be81d6fd121807310f85', '1', '1594625397', '1594625397');
INSERT INTO `mg_image` VALUES ('1332', '20200713', '5f0c0d7615476.jpg', 'Monterey_21.jpg', 'eafc9795d2c293b38f0933a5e1b51678', '430b7d74446b96bac423312948287859106ec8f2', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1333', '20200713', '5f0c0d766c397.jpg', 'Monterey_22.jpg', 'dc2bfc2233fb392b4769a82c831b0c5a', '124f30735abc39bbf2bb30d1d11913765220bb6b', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1334', '20200713', '5f0c0d76881ff.jpg', 'Monterey_17.jpg', '77d5b3c83202928513f535d943e24224', '314c22f8d6ffcdc3b939833f18ae5dd260a03a15', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1335', '20200713', '5f0c0d76b8a1c.jpg', 'Monterey_18.jpg', 'adda65edc6a75734861cab2e37fc6a86', '4095d520838b03b27bee4e0b7efc50d14b6d56a6', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1336', '20200713', '5f0c0d76c18b4.jpg', 'Monterey_19.jpg', 'd2eceba6787780108345b6c2c11bc0a3', '9eb15af9a57e1fc4eaa4393ee324a5c6c18e7994', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1337', '20200713', '5f0c0d76caf0b.jpg', 'Monterey_23.jpg', '0e81e377ac77aa5b53e761938db55d6b', '35da2691121cbf0f9ebb4c346a90266fe67fe23a', '1', '1594625398', '1594625398');
INSERT INTO `mg_image` VALUES ('1338', '20200713', '5f0c0d78019e0.jpg', 'Monterey_24.jpg', 'a6648e4b62f4073ce881fe55d6a98f95', 'aad583b1c0457126a03241e670e191ed0b581187', '1', '1594625400', '1594625400');
INSERT INTO `mg_image` VALUES ('1339', '20200713', '5f0c0d7809bc7.jpg', 'Monterey_20.jpg', '88b99b4eb3dbada3b96350e826c50331', '9b2f42ad21316b62dfb9a2ab877a21591513d8a3', '1', '1594625400', '1594625400');
INSERT INTO `mg_image` VALUES ('1340', '20200713', '5f0c0d7816959.jpg', 'Monterey_14.jpg', '62e5180f23a9e387b2279c0fede975b5', '6f48eeaca854f74461cc4fafc46c163ace17e925', '1', '1594625400', '1594625400');
INSERT INTO `mg_image` VALUES ('1341', '20200713', '5f0c0e0c843e2.jpg', 'Palazzo_01.jpg', '1724da2bfe75be6c3b1eb83d9b083df6', '684d8494880d52ed1355f7534fae04b2f088b444', '1', '1594625548', '1594625548');
INSERT INTO `mg_image` VALUES ('1342', '20200713', '5f0c0e0d710e3.jpg', 'Palazzo_02.jpg', 'ab4ae2f308381c4e317309bc703aa318', 'fbd673140a2bfd7a8e32eebd94ce101d387b15eb', '1', '1594625549', '1594625549');
INSERT INTO `mg_image` VALUES ('1343', '20200713', '5f0c0e0d7eabb.jpg', 'Palazzo_03.jpg', 'aa1e336217f027a078e16a471b7fc2e3', '556e3d0c74bdef834579f59fa96d5af8eb708e2a', '1', '1594625549', '1594625549');
INSERT INTO `mg_image` VALUES ('1344', '20200713', '5f0c0e0dc2813.jpg', 'Palazzo_07.jpg', 'c5060bf140e7c9a41ab68f653ad78fbc', '4099e9a879fa0dc2019491985d505108cdb85e31', '1', '1594625549', '1594625549');
INSERT INTO `mg_image` VALUES ('1345', '20200713', '5f0c0e0e72efe.jpg', 'Palazzo_04.jpg', '20f0b781c51980267cceca697b4fa301', 'fbac757ba2275917a4702aae867c7b88de3997ea', '1', '1594625550', '1594625550');
INSERT INTO `mg_image` VALUES ('1346', '20200713', '5f0c0e0e7ba3a.jpg', 'Palazzo_08.jpg', '88553fd6d9c79f12e6f090fef0a420bd', '910b9e048bc2f8f020762778eba382cc70c9985b', '1', '1594625550', '1594625550');
INSERT INTO `mg_image` VALUES ('1347', '20200713', '5f0c0e0f06d98.jpg', 'Palazzo_05.jpg', 'fda17c8ac81c749f5a83ecae7c09ebb9', 'dee7704ad50f462d9cb519fa5fbf8996f5e252e5', '1', '1594625551', '1594625551');
INSERT INTO `mg_image` VALUES ('1348', '20200713', '5f0c0e0f41eaa.jpg', 'Palazzo_11.jpg', 'b6eadcd2864acbacdb18351a96bb5c83', 'eba7640cdf8f6f97ee0f5033b489f770707c38af', '1', '1594625551', '1594625551');
INSERT INTO `mg_image` VALUES ('1349', '20200713', '5f0c0e0f5ff3d.jpg', 'Palazzo_10.jpg', '6170eca3276ce1d135ec046ccc54530a', 'ca7f7d51cc622ddf2397c196134bf3dd1bd7f37a', '1', '1594625551', '1594625551');
INSERT INTO `mg_image` VALUES ('1350', '20200713', '5f0c0e0fd708c.jpg', 'Palazzo_14.jpg', '88f20a1a3c65e0297adf930c135d3824', '42a319a6d9698778884c6d69491cbe5656172201', '1', '1594625551', '1594625551');
INSERT INTO `mg_image` VALUES ('1351', '20200713', '5f0c0e0fdfd0b.jpg', 'Palazzo_06.jpg', 'abe7533fd78bd5e023538f4398cd602a', '4fc9528201915dd7a433d603bddaabc35ac5a3d3', '1', '1594625551', '1594625551');
INSERT INTO `mg_image` VALUES ('1352', '20200713', '5f0c0e101aece.jpg', 'Palazzo_15.jpg', 'a3b5190a5cb0513ba2a64fc8761ea8d0', '951b013866ef6be93a68f8bd2e4c8290fb84cb12', '1', '1594625552', '1594625552');
INSERT INTO `mg_image` VALUES ('1353', '20200713', '5f0c0e1026919.jpg', 'Palazzo_13.jpg', '048634f6d405f8cba69cd74f063cde08', 'fee763f7b6932c866bfe08811e38c675844c2f0f', '1', '1594625552', '1594625552');
INSERT INTO `mg_image` VALUES ('1354', '20200713', '5f0c0e11664ce.jpg', 'Palazzo_17.jpg', '8807b949a19912177bc34cf8b6900200', '9e88df9b4a694d4c1962097018a46af21acd12cd', '1', '1594625553', '1594625553');
INSERT INTO `mg_image` VALUES ('1355', '20200713', '5f0c0e116f27a.jpg', 'Palazzo_09.jpg', 'aa5d22d77f6008a21084795c00c59ae0', '014b05b8550a177252fa0f19b2c45ffaa8410333', '1', '1594625553', '1594625553');
INSERT INTO `mg_image` VALUES ('1356', '20200713', '5f0c0e1177c79.jpg', 'Palazzo_18.jpg', 'ce248cca3e8b1bf3759ccccbec24f7da', 'c90baff62a46b5b3fdf48c0cd0d4ac22f4232b2c', '1', '1594625553', '1594625553');
INSERT INTO `mg_image` VALUES ('1357', '20200713', '5f0c0e117d9a6.jpg', 'Palazzo_12.jpg', '8fb192654306b13f497bebebbcd5b5af', '993276c469bf3b9d739fc304fb9cc3479c06bb1d', '1', '1594625553', '1594625553');
INSERT INTO `mg_image` VALUES ('1358', '20200713', '5f0c0e11b30cb.jpg', 'Palazzo_19.jpg', '848ae75dfd3623309da1bcb1de086800', '8543b8ff9a11c75c220c16d74a68c3ec5f311f9f', '1', '1594625553', '1594625553');
INSERT INTO `mg_image` VALUES ('1359', '20200713', '5f0c0e1201795.jpg', 'Palazzo_16.jpg', 'c2d6aa11659c2781093f11430ba7f404', '2725cfe95a909ce25fcbb10d667eb956b100b7f0', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1360', '20200713', '5f0c0e123583d.jpg', 'Palazzo_23.jpg', '114eb2eeb5c0f02661a3693ccc9b8ccf', 'ae5586efe7cbf623c68f1736ec77a07b9b42776c', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1361', '20200713', '5f0c0e1242c5c.jpg', 'Palazzo_25a.jpg', 'cce51755a5cc20c9b20006a38eb86ae0', '57fbef451ae7773028e82d0ebaec03e2d0054b77', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1362', '20200713', '5f0c0e1261685.jpg', 'Palazzo_20.jpg', '1ae11ab51f987d07ecdfaa683cc9dae2', '9198ce42e066df2eccf3714da5247f577f70ffb8', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1363', '20200713', '5f0c0e12886ae.jpg', 'Palazzo_26.jpg', 'bde418f96e93cc89b076a3ee5d72effe', '243178a504c116296a49342aebf06dcf0509c2d6', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1364', '20200713', '5f0c0e128e5bd.jpg', 'Palazzo_25b.jpg', '94880ea49bf9c3c0dfbdba486ace86eb', '37a660ccba332adab26c5d27d041e25135480f3e', '1', '1594625554', '1594625554');
INSERT INTO `mg_image` VALUES ('1365', '20200713', '5f0c0e132cff8.jpg', 'Palazzo_29.jpg', '974e70d34657775075351a028b64b878', '2c41864dbd9f630586517f39471aacc05bda0210', '1', '1594625555', '1594625555');
INSERT INTO `mg_image` VALUES ('1366', '20200713', '5f0c0e1333b35.jpg', 'Palazzo_27.jpg', 'e74354bae523557ea7eb311e4607e5df', 'b82d0224ab899184a6bc2f745b2aa8ecb30fe2a0', '1', '1594625555', '1594625555');
INSERT INTO `mg_image` VALUES ('1367', '20200713', '5f0c0e1345020.jpg', 'Palazzo_25.jpg', '213ddf805940718e7919a0993441930e', 'a9f2efeee8fd8decfc3c81670b7e7c785b9d88be', '1', '1594625555', '1594625555');
INSERT INTO `mg_image` VALUES ('1368', '20200713', '5f0c0e13ae144.jpg', 'Palazzo_30.jpg', '69c5314389edb20900d4122869f623d6', 'ca8167c974ba549005d84f43f39d2ee6c2af3189', '1', '1594625555', '1594625555');
INSERT INTO `mg_image` VALUES ('1369', '20200713', '5f0c0e13d4820.jpg', 'Palazzo_28.jpg', 'f6eb305372e5b1e5c861d67b29851904', '1d2df9ed0b190c855abc39df879f00414722e442', '1', '1594625555', '1594625555');
INSERT INTO `mg_image` VALUES ('1370', '20200713', '5f0c0e14101fa.jpg', 'Palazzo_31.jpg', '49a06624b036c4e118020d19295ebb36', '732126c60bebc96b841844316bc358c684286b2b', '1', '1594625556', '1594625556');
INSERT INTO `mg_image` VALUES ('1371', '20200713', '5f0c0e1437032.jpg', 'Palazzo_33.jpg', 'fa9e4e8489a1169f25eddefcddc8092a', 'a50b59450b6d82a7d2578601c93319a828aed79f', '1', '1594625556', '1594625556');
INSERT INTO `mg_image` VALUES ('1372', '20200713', '5f0c0e144287d.jpg', 'Palazzo_24.jpg', 'a3f330a3eec412d233f0f8f2b13547c2', '638ddc2a99f70b9d080815317fac8a85a976e21f', '1', '1594625556', '1594625556');
INSERT INTO `mg_image` VALUES ('1373', '20200713', '5f0c0e1533427.jpg', 'Palazzo_25c.jpg', 'ef6a36853202d3e3b992954f7c278cbf', 'a7a453bce2a803e0b85e10e245494031d509fb82', '1', '1594625557', '1594625557');
INSERT INTO `mg_image` VALUES ('1374', '20200713', '5f0c0e15392c0.jpg', 'Palazzo_35.jpg', '720e9e32b353db5e4344b9b22bfaad0f', 'dcc9faa9a1ab83f2b40cce4215db3c8d6cce8a80', '1', '1594625557', '1594625557');
INSERT INTO `mg_image` VALUES ('1375', '20200713', '5f0c0e157653e.jpg', 'Palazzo_36.jpg', 'c1b75e42289baf568f6a84a96764ff50', 'cf5820ce20f5e69531978754d091dd80dab5f903', '1', '1594625557', '1594625557');
INSERT INTO `mg_image` VALUES ('1376', '20200713', '5f0c0e17d18a1.jpg', 'Palazzo_plan.jpg', 'e192cb10db63429c9476f3178ad1af79', 'fc54060d696ce30557620d1240febc55679cd5dc', '1', '1594625559', '1594625559');
INSERT INTO `mg_image` VALUES ('1377', '20200713', '5f0c0e17da322.jpg', 'Palazzo_37.jpg', '77a01353c9556ae702c806aa42851696', '06e88bcd98f0f0b0b2322635b692a4f82090235b', '1', '1594625559', '1594625559');
INSERT INTO `mg_image` VALUES ('1378', '20200713', '5f0c0e17e4732.jpg', 'Palazzo_34.jpg', 'ce7d1c41c93652750fd370e7b125214f', 'bc1a159d5d2fe7824d9601ae915e76432423e1db', '1', '1594625559', '1594625559');
INSERT INTO `mg_image` VALUES ('1379', '20200713', '5f0c0e17ee85c.jpg', 'Palazzo_32.jpg', '7514abe5b69d5dacae09ed1f9b1c0328', '5cdebd27f478e8d6aa02895dea5566829c6adb50', '1', '1594625559', '1594625559');
INSERT INTO `mg_image` VALUES ('1380', '20200713', '5f0c0e8330b96.jpg', 'Twinpeak01.jpg', '676ba895f4ff63ea50ddc187d53f16a2', 'ab8eb49069d15976a76ecfd942e567acd7796329', '1', '1594625667', '1594625667');
INSERT INTO `mg_image` VALUES ('1381', '20200713', '5f0c0e83993a4.jpg', 'Twinpeak06.jpg', 'ad047d1ccab91bc99c1d9a39ebe60196', '0e250b8bc9cf2406b431a37baff38d996a93e317', '1', '1594625667', '1594625667');
INSERT INTO `mg_image` VALUES ('1382', '20200713', '5f0c0e83d5ba1.jpg', 'Twinpeak03.jpg', 'a5aaf74fb9abf581423a0ca3ee8a3aae', '21221992733bef123eb6b9a8a4eb801cd3f873a1', '1', '1594625667', '1594625667');
INSERT INTO `mg_image` VALUES ('1383', '20200713', '5f0c0e8401f9f.jpg', 'Twinpeak08.jpg', 'c73d216ed4a9e5b9cffcd54e2a48cdc2', '25d32753920a8a76d61fde2cb85aefedccb1a33e', '1', '1594625668', '1594625668');
INSERT INTO `mg_image` VALUES ('1384', '20200713', '5f0c0e849c0c8.jpg', 'Twinpeak09.jpg', 'da062305fa0472f714fe59de0944a7a4', 'e37b67e1631b2fa9635f478510cc0c6e94ce58af', '1', '1594625668', '1594625668');
INSERT INTO `mg_image` VALUES ('1385', '20200713', '5f0c0e84b9e6d.jpg', 'Twinpeak10.jpg', '3a72d5b634c10301aa418aba9a06e5ef', '9dd2c1d6c00d0f628e821be6e46c084bd2b5d361', '1', '1594625668', '1594625668');
INSERT INTO `mg_image` VALUES ('1386', '20200713', '5f0c0e84c3877.jpg', 'Twinpeak04.jpg', '4c4b34d773e58a39c2bddf1268793711', '4ca8ee674177260878c80a756020ac620b545af4', '1', '1594625668', '1594625668');
INSERT INTO `mg_image` VALUES ('1387', '20200713', '5f0c0e85df66e.jpg', 'Twinpeak11.jpg', '43b94e8e3784ae3aae1bc20a270dd8f0', 'bbef3d8f7f6c4fca160c1df977d2858208163b40', '1', '1594625669', '1594625669');
INSERT INTO `mg_image` VALUES ('1388', '20200713', '5f0c0e85e5a7f.jpg', 'Twinpeak12.jpg', '72007f4cbbf28b8380e1d23f6b7707de', '3ac90ef13604857ec9bdfc7c06a7e89fab895413', '1', '1594625669', '1594625669');
INSERT INTO `mg_image` VALUES ('1389', '20200713', '5f0c0e85effde.jpg', 'Twinpeak02.jpg', '868d2ea2fdc3cec15c15500ef0f6d3d0', '3a2ff58357779eb3a044e5d5d36e1efc4b7ca120', '1', '1594625669', '1594625669');
INSERT INTO `mg_image` VALUES ('1390', '20200713', '5f0c0e860639d.jpg', 'Twinpeak07.jpg', '7471b03912bdaa413c5a9fc200eced8e', '23e8b4e6749767f3cd11475ded46bc94364aa44d', '1', '1594625670', '1594625670');
INSERT INTO `mg_image` VALUES ('1391', '20200713', '5f0c0e860f452.jpg', 'Twinpeak13.jpg', '762a1c236e1ee58e9490767d43844a02', '2eb39973010f59a701807a500c24e2fc31e27320', '1', '1594625670', '1594625670');
INSERT INTO `mg_image` VALUES ('1392', '20200713', '5f0c0e87326df.jpg', 'Twinpeak14.jpg', 'f96b8e182800f39a1ef8abf136b558b3', 'e469b6e7bda98bfa9b8aab724b0670825a4e36ed', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1393', '20200713', '5f0c0e8741ae0.jpg', 'Twinpeak15.jpg', '5fa092832490da273900823487978df4', '2417055652f9a647d623e792a36d230367d8e939', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1394', '20200713', '5f0c0e874adc5.jpg', 'Twinpeak18.jpg', '235e593883aab2b1eede46a5f1f1f590', 'a3acdf7a1b6304bca6d2b4ab741df6b4351e6bef', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1395', '20200713', '5f0c0e87741d4.jpg', 'Twinpeak17.jpg', 'e2a9176c9022d4489a6a7503f050aa13', 'b972693a75722740bf6e6e5c69f364245577f80b', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1396', '20200713', '5f0c0e87e000a.jpg', 'Twinpeak20.jpg', '2d0b983e742dc4ca2915e548ff8a756e', '759c66b55b3383b26d6e80c46d250935be01ff53', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1397', '20200713', '5f0c0e87e9934.jpg', 'Twinpeak21.jpg', 'e2d007b6ef45534716c12586b7e3211e', '0d391c8efcf87b64fbf3bfc9cc4bfa189cbf1dee', '1', '1594625671', '1594625671');
INSERT INTO `mg_image` VALUES ('1398', '20200713', '5f0c0e8853d7e.jpg', 'Twinpeak24.jpg', 'a0298f3b29dc85e56bd91e1d263efadf', '669117e4c33b3eed53f1ded075a42de0708c6f8f', '1', '1594625672', '1594625672');
INSERT INTO `mg_image` VALUES ('1399', '20200713', '5f0c0e88767e2.jpg', 'Twinpeak19.jpg', 'c2233b875ab0826e90be166ddbb4de5c', '3f2c1ce7e5e7bc8632b83b70acfaafe9238c5cf4', '1', '1594625672', '1594625672');
INSERT INTO `mg_image` VALUES ('1400', '20200713', '5f0c0e88d3553.png', 'twinpeaksexistingplan.png', 'a7a2b72da95af1a94c4230c04c2a6842', '93802198f50d45afab234e0253b4559be00a3844', '1', '1594625672', '1594625672');
INSERT INTO `mg_image` VALUES ('1401', '20200713', '5f0c0e88e3c98.jpg', 'Twinpeak25.jpg', '557974ab46f2b41f48ccb25e4be837ed', '597da6bb6a97fcaae677ffaa9ee8083fe394d0e2', '1', '1594625672', '1594625672');
INSERT INTO `mg_image` VALUES ('1402', '20200713', '5f0c0e88f1504.png', 'twinpeakslayoutplan.png', '4f60e01f9df3336e75dfee39fbfe4846', '729b6071cc903c38ca832184b6d9790c1175df3d', '1', '1594625672', '1594625672');
INSERT INTO `mg_image` VALUES ('1403', '20200713', '5f0c0e8b0504d.jpg', 'Twinpeak23.jpg', 'f4751f7215bf988bebab585e239e5318', '9c99aaca6a4c67fd0a71242eb1c76546874a4635', '1', '1594625675', '1594625675');
INSERT INTO `mg_image` VALUES ('1404', '20200713', '5f0c0e8b125b1.jpg', 'Twinpeak22.jpg', 'f32d69075ca2c420a5b441edbbaa2fba', 'fa46f9f2e0119da1f52052e6db503286be53ce64', '1', '1594625675', '1594625675');
INSERT INTO `mg_image` VALUES ('1405', '20200713', '5f0c0e8b1b7e8.jpg', 'Twinpeak05.jpg', '332c2b60bd75e705f9375ca5831f208e', '4e437f1b32675bf15e665faaf7e259bdd63be355', '1', '1594625675', '1594625675');
INSERT INTO `mg_image` VALUES ('1406', '20200713', '5f0c0e8c17daf.jpg', 'Twinpeak16.jpg', '8607baf9eb5d88d53968fb3121c5daad', 'a1c45fb9520fba2c97fb1b768f214177ca3fd315', '1', '1594625676', '1594625676');
INSERT INTO `mg_image` VALUES ('1407', '20200713', '5f0c1c6777979.jpg', 'C_Studio_01.jpg', '26cc10187338a4ce96ea3b8b63512bed', '6333b8d3333705b5f53e05e6e7bcb75d70babaa4', '1', '1594629223', '1594629223');
INSERT INTO `mg_image` VALUES ('1408', '20200713', '5f0c1c67d3640.jpg', 'C_Studio_02.jpg', 'aa0c56c6bde4e6cf93d6942b6a650055', '85934d9650a5ef2c57291b9851228e93dab5dbd5', '1', '1594629223', '1594629223');
INSERT INTO `mg_image` VALUES ('1409', '20200713', '5f0c1c67dcbec.jpg', 'C_Studio_03.jpg', '57de94ed743cf3f4c3705b422171ac16', '1e0130af7c7506a8eff7681f422190d62291a01e', '1', '1594629223', '1594629223');
INSERT INTO `mg_image` VALUES ('1410', '20200713', '5f0c1c6800cf0.jpg', 'C_Studio_04.jpg', '681d88b30a6d61598806e5f61e6e6fcb', '0abf7c51d0d7135c439ede72c857ac8c32a5a872', '1', '1594629224', '1594629224');
INSERT INTO `mg_image` VALUES ('1411', '20200713', '5f0c1c6a742d4.jpg', 'C_Studio_07.jpg', 'fe656c9041038086967c5a8af8497d3a', 'ea7e003ed36bdc089a7a8a510fc0e5fbe5bf1442', '1', '1594629226', '1594629226');
INSERT INTO `mg_image` VALUES ('1412', '20200713', '5f0c1c6bafd47.jpg', 'C_Studio_11.jpg', '1719f42a8d376d679367121fec0458d9', 'c4c88063f00a486a0c2bf9b65a8b9fd45fd7cdff', '1', '1594629227', '1594629227');
INSERT INTO `mg_image` VALUES ('1413', '20200713', '5f0c1c6bd7e6e.jpg', 'C_Studio_05.jpg', 'b28c86f9b85816d6dba6412221293670', '737201e2f8029937fb2477bbb1c7563f527c4689', '1', '1594629227', '1594629227');
INSERT INTO `mg_image` VALUES ('1414', '20200713', '5f0c1c6bdeff9.jpg', 'C_Studio_06.jpg', '76dd9ee07dbcbde870cdcb61cc05b288', '35cdec9c0f949e9bcc4793cfd0b30549852f98f2', '1', '1594629227', '1594629227');
INSERT INTO `mg_image` VALUES ('1415', '20200713', '5f0c1c6be7908.jpg', 'C_Studio_09.jpg', '07067b35884b639a2f289bd71a178649', 'd7a3b0f0f4bfe8e687d2d9512eda1d944ecb1903', '1', '1594629227', '1594629227');
INSERT INTO `mg_image` VALUES ('1416', '20200713', '5f0c1c6ce4a8f.jpg', 'C_Studio_08.jpg', 'dc2429a2667574a300c1735345d8d654', 'bd58775e5de6dab8f881b36fe3de26df5338d710', '1', '1594629228', '1594629228');
INSERT INTO `mg_image` VALUES ('1417', '20200713', '5f0c1c73085f8.jpg', 'C_Studio_10.jpg', 'fedcc32394b9e08f79a66a42a944a79b', '25a9dcbf91973c5f405a01b233d58b8446eecc98', '1', '1594629235', '1594629235');
INSERT INTO `mg_image` VALUES ('1418', '20200715', '5f0edfe6f209e.jpg', 'anucell_01.jpg', '701438f7c6d99e0b68d2c37982ccc0c8', '7d83aad3f3262bb789a3d4e86cb37bdab98cf37f', '1', '1594810342', '1594810342');
INSERT INTO `mg_image` VALUES ('1419', '20200715', '5f0edfe74088a.jpg', 'anucell_07.jpg', '909b13c1e07bc8dcae8189a1d1df7507', '6de5f6d6091d2176f4ca0694bc190694771cb9be', '1', '1594810343', '1594810343');
INSERT INTO `mg_image` VALUES ('1420', '20200715', '5f0edfe74b0d6.jpg', 'anucell_02.jpg', 'e44572c3a542384229ec31f0863bca10', '944ae4176009fdbe5915d57923e849a9b967cea8', '1', '1594810343', '1594810343');
INSERT INTO `mg_image` VALUES ('1421', '20200715', '5f0edfe7cfe9d.jpg', 'anucell_04.jpg', '4d57c0e7b1b2976bc87d9979eecc751e', 'c3583e82644982829d3af74704c892c34670c67a', '1', '1594810343', '1594810343');
INSERT INTO `mg_image` VALUES ('1422', '20200715', '5f0edfe7d6fee.jpg', 'anucell_08.jpg', '35b3326c671fc97184d5a4c38213ffd7', '5013c0e05b1d21f6ca119e654c9be846f9dfa311', '1', '1594810343', '1594810343');
INSERT INTO `mg_image` VALUES ('1423', '20200715', '5f0edfe9877d7.jpg', 'anucell_11.jpg', '70ac24630d9e1897b09fad29089b2d2e', 'ce39a045a457dc11b852bbd5cf916f9bce204b12', '1', '1594810345', '1594810345');
INSERT INTO `mg_image` VALUES ('1424', '20200715', '5f0edfe991a20.jpg', 'anucell_03.jpg', '2f49107c545e67190fd5911e856389e7', '42c28e616ac89899ce5ee9053fd24360fb9194a7', '1', '1594810345', '1594810345');
INSERT INTO `mg_image` VALUES ('1425', '20200715', '5f0edfea5b492.jpg', 'anucell_05.jpg', '963c946e858ff7d3e0dc47da666329d7', '3c4cc06ef20833076e91b6ede670dc76f59542a9', '1', '1594810346', '1594810346');
INSERT INTO `mg_image` VALUES ('1426', '20200715', '5f0edfea7d9bf.JPG', 'anucell_10.JPG', 'abfb4fb4c078afbde2fd65edd5a759b8', 'aea30418cd5528d0de6fdb52e8ebc0ee7b0803d0', '1', '1594810346', '1594810346');
INSERT INTO `mg_image` VALUES ('1427', '20200715', '5f0edfeab3129.jpg', 'anucell_13.jpg', '6331723928d34de7bf2f3a71cb8ff0ec', '9ad2fc20eead93e7965ec798c2300e97465ca07b', '1', '1594810346', '1594810346');
INSERT INTO `mg_image` VALUES ('1428', '20200715', '5f0edfeacd0de.jpg', 'anucell_09.jpg', '593ea1c4a344f0fc701058e83005cd49', '95a8541dd35f514452102feb065683b3ac3f2cc7', '1', '1594810346', '1594810346');
INSERT INTO `mg_image` VALUES ('1429', '20200715', '5f0edfebd61ee.JPG', 'anucell_16.JPG', 'a182606078b647e1152df3ff5407d95d', '9b54577ede14685e1a7cc56ff48171636c06480c', '1', '1594810347', '1594810347');
INSERT INTO `mg_image` VALUES ('1430', '20200715', '5f0edfebe0161.jpg', 'anucell_06.jpg', 'ac18cadf681316c319e9ffbe620ebfa9', 'ec3290aad13425db7b466f1ee11c9b6400b49d24', '1', '1594810347', '1594810347');
INSERT INTO `mg_image` VALUES ('1431', '20200715', '5f0edfebeb504.JPG', 'anucell_12.JPG', '4559b117df48407a3bf2e6dfa3a439b4', 'a10cf547198cd70f8e0c54153016c14d3ce7c927', '1', '1594810347', '1594810347');
INSERT INTO `mg_image` VALUES ('1432', '20200715', '5f0edfed40bd6.jpg', 'anucell_15.jpg', '78fe3ad3957294771de196a64c37ddc7', '71468a534990c824a19ee06ff0c2a608b7f89ac7', '1', '1594810349', '1594810349');
INSERT INTO `mg_image` VALUES ('1433', '20200716', '5f102e26f34b6.jpg', 'chelseaKC_01.jpg', '4a95ec9293ba54dbb55485e088f7ba04', '088ff5fb79bc17aa18593b9c58bcbbc7d8f3092a', '1', '1594895910', '1594895910');
INSERT INTO `mg_image` VALUES ('1434', '20200716', '5f102e276ace7.jpg', 'chelseaKC_02.jpg', '4e06114e1975baab6c2d5290f86851f8', '500d34688bf7fa32804cfaeabb9eb711c31bfddb', '1', '1594895911', '1594895911');
INSERT INTO `mg_image` VALUES ('1435', '20200716', '5f102e27a9291.jpg', 'chelseaKC_03.jpg', 'd9a41ef760aeb52029cb39916a23e8e3', '39b49a94ec970395f6c3f34c3af558f2ece05467', '1', '1594895911', '1594895911');
INSERT INTO `mg_image` VALUES ('1436', '20200716', '5f102e28a3296.jpg', 'chelseaKC_07.jpg', '39cc523604fe75f1f80bdfb86ece9f3b', '6c014f1ccd4175cedbb2386c75f92c75718864c6', '1', '1594895912', '1594895912');
INSERT INTO `mg_image` VALUES ('1437', '20200716', '5f102e28b38a4.jpg', 'chelseaKC_06.jpg', '01b430c804bf8922b2c380c107bfe03d', '3c670131abde80f678c8ca548701b2dcc690b07d', '1', '1594895912', '1594895912');
INSERT INTO `mg_image` VALUES ('1438', '20200716', '5f102e2951d5e.jpg', 'chelseaKC_10.jpg', '9eaa549dc699a5437da85242dcd40a7c', 'f40c1c802d64f80725eba928cc07cf7f45a2e1b3', '1', '1594895913', '1594895913');
INSERT INTO `mg_image` VALUES ('1439', '20200716', '5f102e2a75b98.jpg', 'chelseaKC_11.jpg', '75516269f000a4c8ead559039244d6fe', '9c1ce8745d3e24112e65e7e4964d9baeefc45bb4', '1', '1594895914', '1594895914');
INSERT INTO `mg_image` VALUES ('1440', '20200716', '5f102e2b185fb.jpg', 'chelseaKC_09.jpg', 'abad26434dc56541b249d7a8dca0330c', '9e914ac60dc83b6ef8118cafb3058d9af9d36a3c', '1', '1594895915', '1594895915');
INSERT INTO `mg_image` VALUES ('1441', '20200716', '5f102e2b5d07f.jpg', 'chelseaKC_12.jpg', '5ff311d4ce725dc364adae37959f2299', 'c1807534dfb5b7f0f8952e46cc6d254c6e07d7f9', '1', '1594895915', '1594895915');
INSERT INTO `mg_image` VALUES ('1442', '20200716', '5f102e2bf2c5a.jpg', 'chelseaKC_08.jpg', '8ad33e5a95ff1e94fa9fcf738bf360ad', '6d7baafaa20204036b73adb2af570563bfbfc814', '1', '1594895915', '1594895915');
INSERT INTO `mg_image` VALUES ('1443', '20200716', '5f102e2c6029b.jpg', 'chelseaKC_13.jpg', '11f0a7a70872405d8b70420c27ae3696', 'c2f6fe314645af5ca747e79723d2f9cb71fb3370', '1', '1594895916', '1594895916');
INSERT INTO `mg_image` VALUES ('1444', '20200716', '5f102e2c98eaf.jpg', 'chelseaKC_14.jpg', 'b74dd25efc3943ce8cd49d42f0df83e0', '23f8891920718bf5721f0e82980b966a7cc24f6f', '1', '1594895916', '1594895916');
INSERT INTO `mg_image` VALUES ('1445', '20200716', '5f102e2d441a1.jpg', 'chelseaKC_15.jpg', '5392f5b307e3697678b20b5136206444', '5376f494b4e6214866569e55fbed5f913a2e7c11', '1', '1594895917', '1594895917');
INSERT INTO `mg_image` VALUES ('1446', '20200716', '5f102e2ee6904.jpg', 'chelseaKC_18.jpg', 'be4028038c0039a2ffcb37db063b0c0d', '2e5f1fb58e227df5250d5d1cdef4827ea0bc085d', '1', '1594895918', '1594895918');
INSERT INTO `mg_image` VALUES ('1447', '20200716', '5f102e2eee1d7.jpg', 'chelseaKC_05.jpg', '6364a286b1763ccef4a504cea38692c0', 'd874270735fcd28f476b5d80bca6b9bfed0ab09c', '1', '1594895918', '1594895918');
INSERT INTO `mg_image` VALUES ('1448', '20200716', '5f102e2f70d73.jpg', 'chelseaKC_17.jpg', '1ff5ea12e6195005417978c68f4694e5', '68073d59b012e692c89f257380cd5532df0e9259', '1', '1594895919', '1594895919');
INSERT INTO `mg_image` VALUES ('1449', '20200716', '5f102e2f81d33.jpg', 'chelseaKC_19.jpg', '38992edad1fe3eff95b45f843d5f904a', '889aba2ca920cd0410996e6aeeaa5153fac867ca', '1', '1594895919', '1594895919');
INSERT INTO `mg_image` VALUES ('1450', '20200716', '5f102e30cdb59.jpg', 'chelseaKC_22.jpg', 'f6eec6b391b188fe504de803f4c7f497', '0c8babf136364dd8381c8c4e276528decc913e73', '1', '1594895920', '1594895920');
INSERT INTO `mg_image` VALUES ('1451', '20200716', '5f102e310b5e6.jpg', 'chelseaKC_16.jpg', '3ac260029d63fdb1603a72994c713ee2', 'af9d87e324f137b631169f0a1d1f90a7e3d3560f', '1', '1594895921', '1594895921');
INSERT INTO `mg_image` VALUES ('1452', '20200716', '5f102e315f85e.jpg', 'chelseaKC_23.jpg', 'f6952c836d332d0e8cd5bdbfb24bd974', '8a4e2af6182f45894ebfbd00d03bd617aa184356', '1', '1594895921', '1594895921');
INSERT INTO `mg_image` VALUES ('1453', '20200716', '5f102e322b9ba.jpg', 'chelseaKC_24.jpg', '72f4dc5e43cba7bb8a26f41dc30c64e6', '74814dd32663a613ebd7fa01e2879b60007b96a9', '1', '1594895922', '1594895922');
INSERT INTO `mg_image` VALUES ('1454', '20200716', '5f102e33d5794.jpg', 'chelseaKC_25.jpg', '8109cf17c0ae8e3c905c8677f2e56522', 'e870dfff792e294420946d2cec6b65802240ebf9', '1', '1594895923', '1594895923');
INSERT INTO `mg_image` VALUES ('1455', '20200716', '5f102e34638af.jpg', 'chelseaKC_20.jpg', '99784dc9922f227fa041c19f021d50d3', '8b41dc82a015245041678a9a7d1798c68b1aeb54', '1', '1594895924', '1594895924');
INSERT INTO `mg_image` VALUES ('1456', '20200716', '5f102e364dcd9.jpg', 'chelseaKC_04.jpg', '84aa814f834ea9a8c8d7a74ff1a4ddef', '5af752f475ac1d0c0f251ffe38b3f0c6c0984577', '1', '1594895926', '1594895926');
INSERT INTO `mg_image` VALUES ('1457', '20200716', '5f102e3690d30.jpg', 'chelseaKC_26.jpg', '89019ce3724e0da2072481feb7380b64', '886701ca544540bf8037f6822297f072dd48ccb3', '1', '1594895926', '1594895926');
INSERT INTO `mg_image` VALUES ('1458', '20200716', '5f102e3e28577.jpg', 'chelseaKC_21.jpg', '18ffce273dae2c1483825eead0231f4e', '34285c1bc96c1c6358fbe6accf717f596a81ee64', '1', '1594895934', '1594895934');
INSERT INTO `mg_image` VALUES ('1459', '20200716', '5f10322b9255c.JPG', 'olive_01.JPG', '58a613fb5a408c73db6ec192bc2b31f0', '2452b60191afff565746c4a1855f7d2157243d13', '1', '1594896939', '1594896939');
INSERT INTO `mg_image` VALUES ('1460', '20200716', '5f10322c4be35.JPG', 'olive_05.JPG', '6cc3e3bae29003986fd71859ed2a2110', '1f04162ac00a234adfa0522be9291934cee45778', '1', '1594896940', '1594896940');
INSERT INTO `mg_image` VALUES ('1461', '20200716', '5f10322e60e90.jpg', 'olive_03.jpg', 'a55517c9c7e4f1445f75f0389d6fe783', 'a882243787d13569215601fcf8d087dc01f954a9', '1', '1594896942', '1594896942');
INSERT INTO `mg_image` VALUES ('1462', '20200716', '5f10322ea6284.JPG', 'olive_02.JPG', 'c82d2cfa96e8589cdf9c84da10a571cf', 'c023da386f2eded01aae5996d0064d89be024dbb', '1', '1594896942', '1594896942');
INSERT INTO `mg_image` VALUES ('1463', '20200716', '5f10322edc837.JPG', 'olive_04.JPG', '93a8905259bc73022208a77a4f673611', 'd6a0892836574a0fe1327a867be9d0c969ef1e69', '1', '1594896942', '1594896942');
INSERT INTO `mg_image` VALUES ('1464', '20200716', '5f10322ee5cd5.jpg', 'olive_06.jpg', '58964ffe2ccdc3243aba01ae99904540', '82c435e406e22245d8fdafa7a58823b1c95e9336', '1', '1594896942', '1594896942');
INSERT INTO `mg_image` VALUES ('1465', '20200716', '5f10322f2419e.jpg', 'olive_07.jpg', '3446550f86ecb52cd43981a26a0a03f7', 'e417f0e1510dd7249426b7c2926e46be28528567', '1', '1594896943', '1594896943');
INSERT INTO `mg_image` VALUES ('1466', '20200716', '5f10323031544.JPG', 'olive_08.JPG', '1a02e63014cd0c448cd191bf090422ed', 'ead435d74593c33139e74b588d1152ea3c10c089', '1', '1594896944', '1594896944');
INSERT INTO `mg_image` VALUES ('1467', '20200716', '5f1032329db54.JPG', 'olive_14.JPG', 'e573ec73ca086f5b4dfe5ef23984f1a7', '19d25c511a038e1531d7e0832445082db90f6e29', '1', '1594896946', '1594896946');
INSERT INTO `mg_image` VALUES ('1468', '20200716', '5f1032331e524.JPG', 'olive_11.JPG', 'a42be37e369310f7065935cf811230b4', '32cd7b38d5cd72c0fead0d38c7f479cd01c4df72', '1', '1594896947', '1594896947');
INSERT INTO `mg_image` VALUES ('1469', '20200716', '5f1032335351f.JPG', 'olive_09.JPG', '9d02447411062217a67bd91a790d0e6b', '1c78bab7b25f22da7a7e459da367311521b77414', '1', '1594896947', '1594896947');
INSERT INTO `mg_image` VALUES ('1470', '20200716', '5f103234a3f6f.jpg', 'olive_12.jpg', 'f576cec3565cde5e24556b1a32b8f390', '60809a6319036bbb896e58044226ebb59dc1a48a', '1', '1594896948', '1594896948');
INSERT INTO `mg_image` VALUES ('1471', '20200716', '5f103234ab7e2.JPG', 'olive_13.JPG', '1ed8c1314d0e0861e8730fa248e881a2', '5933bd9120b4b38b18ea1fdfdc8a9fa55d3331ad', '1', '1594896948', '1594896948');
INSERT INTO `mg_image` VALUES ('1472', '20200716', '5f103234b88cc.JPG', 'olive_10.JPG', '0eafd68ae4ed5f163c57472cdaf0a6d1', 'ef354c81b30096671641165f132e999f78e50da4', '1', '1594896948', '1594896948');
INSERT INTO `mg_image` VALUES ('1473', '20200716', '5f103237dc62b.jpg', 'olive_16.jpg', '66e94643ca521314b5552b5fea8935ce', '242b838712d293e20b038fb024227c7cbe0d453a', '1', '1594896951', '1594896951');
INSERT INTO `mg_image` VALUES ('1474', '20200716', '5f10323844982.JPG', 'olive_15.JPG', 'c62bf74d3576599ad588a069c2a34ee1', '4839db05e28ed3556da243cb8e70824c12758274', '1', '1594896952', '1594896952');
INSERT INTO `mg_image` VALUES ('1475', '20200720', '5f150fbc4e6b4.jpg', 'colonnade_02.jpg', 'b9cd43653162b2e87c2133f934714bf0', 'efd8a0434d0e91b8ad75dbe672a8603afcd26350', '1', '1595215804', '1595215804');
INSERT INTO `mg_image` VALUES ('1476', '20200720', '5f150fbc553cf.jpg', 'colonnade_01.jpg', '6721af20f22c2eff9b7bc135a0d219fc', '2d99a52efc4c4cecadb24211654a51cf5dc5e9b9', '1', '1595215804', '1595215804');
INSERT INTO `mg_image` VALUES ('1477', '20200720', '5f150fbcaec88.jpg', 'colonnade_03.jpg', '189d298061c4828cd56337a09b2a70e1', '5d2c5be16c8e7ed8e997333c5c47020d65eab913', '1', '1595215804', '1595215804');
INSERT INTO `mg_image` VALUES ('1478', '20200720', '5f150fbcb648a.jpg', 'colonnade_06.jpg', '032beda5db2830b90a1006148007d563', 'dd33b9df342d7fc057af0a083020b53b56cdb10f', '1', '1595215804', '1595215804');
INSERT INTO `mg_image` VALUES ('1479', '20200720', '5f150fbcbb9da.jpg', 'colonnade_04.jpg', '800b1a31ac74cb2d2b9bfbd67bab33f9', '3b3adf5f7b6fc045cc90c0614e16e9cc909236ff', '1', '1595215804', '1595215804');
INSERT INTO `mg_image` VALUES ('1480', '20200720', '5f150fbd3e07c.jpg', 'colonnade_05.jpg', '860190c206892885753a0841e796d940', 'b3c81f36e1aa2a3349752c075bda467958108461', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1481', '20200720', '5f150fbd42a67.jpg', 'colonnade_08.jpg', 'ce45b1e8d42fb4890d08c9d89b2e52b6', '6c432bef2cb48cc5cd80a0f309d1a57f22b3fa14', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1482', '20200720', '5f150fbd46eae.jpg', 'colonnade_09.jpg', '6591c19f9722ddb886e4a8a98966d347', '63573b723066ed1c4afe40639fed38259bdaa055', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1483', '20200720', '5f150fbd51e05.jpg', 'colonnade_07.jpg', '51eda01aa78f795df3c0f9274fe5eb09', '3f61a3e6804a4639f3a8fa6962c134f133b469e6', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1484', '20200720', '5f150fbd5f1da.jpg', 'colonnade_10.jpg', '8965902b3d8d46037702f6ed6e2e5056', '09e8dd0628d5119b31b4f7e7d8cacbe606f3e63c', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1485', '20200720', '5f150fbd6a315.jpg', 'colonnade_11.jpg', '0fba460557a541d14e722d58fa153e38', '92471c8a23e1e31c7ca5ad52a4e15d77e7445ce5', '1', '1595215805', '1595215805');
INSERT INTO `mg_image` VALUES ('1486', '20200720', '5f150fbe2650c.jpg', 'colonnade_12.jpg', '9af25164bca5d62b540121dfe74d2fcd', 'c00bbf4e017160670941ec6b19e7d9268bf7a146', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1487', '20200720', '5f150fbe2baa9.jpg', 'colonnade_13.jpg', 'ece736ab7d6e9d867bb187cbac3e1a8e', '0337dcdbec89b85c42ad24e4208479ffc3d667cf', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1488', '20200720', '5f150fbe3224d.jpg', 'colonnade_15.jpg', '355fdba0841c355a0668332c29e24338', 'a73b596080493af8fe4bbfc8ab390a590c19c93a', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1489', '20200720', '5f150fbe3a33f.jpg', 'colonnade_16.jpg', '0092290f74a5d18b7b9d1d28870086d0', '9681fd6e46272ae453354d74c1e435d8cd5d8657', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1490', '20200720', '5f150fbe423df.jpg', 'colonnade_14.jpg', '1b5f36e0e990b7ad64fae67582f046c2', '0828556578def2aca0997130b8661d2e2aca9b98', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1491', '20200720', '5f150fbe51eff.jpg', 'colonnade_17.jpg', 'e445a4a91c3d85e6032c94df92f578ed', '34f93a93d5c4d9a026f020cb70f0efe5037081f3', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1492', '20200720', '5f150fbef23d7.jpg', 'colonnade_19.jpg', 'befafeafc04351baa65f39b1a2371345', '0c5429774a6538b121b58b336c3670722a841f4b', '1', '1595215806', '1595215806');
INSERT INTO `mg_image` VALUES ('1493', '20200720', '5f150fbf04b91.jpg', 'colonnade_18.jpg', '3538c713c4634c43a278d3f2ca31a179', 'd82b8e5d81e10a09ba7185a57b3969587982b6f2', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1494', '20200720', '5f150fbf09159.jpg', 'colonnade_22.jpg', 'ccc0b95fcd5daa7de91c002cce606880', 'c6ef4cde33862236e92549407c18c44db5831a8a', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1495', '20200720', '5f150fbf6a620.jpg', 'colonnade_25.jpg', 'd6271ea98646eae26451678c80792212', 'c1d28122bb8af7615470d97c6fb38d0a0b6455b8', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1496', '20200720', '5f150fbf8449d.jpg', 'colonnade_21.jpg', 'd9942993b44c4b585e21f1335bbda6e8', 'b835e94a57122e7d1522ca0ee81cf66044e6a2da', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1497', '20200720', '5f150fbf8ce91.jpg', 'colonnade_23.jpg', 'e1a8bed5fd7539853ae3e17c3028d16d', '141eefa187184e1793d66ae289d301f356817fbb', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1498', '20200720', '5f150fbf9512e.jpg', 'colonnade_27.jpg', 'd71157beef8f5e71f38fb02bcb720633', '7553dfcfed9d61edc89485bcc1c36c7db15f69b5', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1499', '20200720', '5f150fbfbb934.jpg', 'colonnade_24.jpg', 'fe059734342654b4b9f16116f6b71752', 'bbed266e67fe73468519a784010a8415dcf27329', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1500', '20200720', '5f150fbfc3ef3.jpg', 'colonnade_29.jpg', '31b6cd4bc41d1737cecde861b0f525f3', '34a9c1804581bfcb37cc40be8aac3307955c9269', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1501', '20200720', '5f150fbfd5961.jpg', 'colonnade_30.jpg', '00af9b111cbedcf907cb4138ed0ed09d', '0d8b748840c773ac6a545f0f2329efdf3dac5217', '1', '1595215807', '1595215807');
INSERT INTO `mg_image` VALUES ('1502', '20200720', '5f150fc0a4d65.jpg', 'colonnade_26.jpg', '9e7bc9841c71593b37dc0637035ddad3', '133ed5e727507207c03aa36367d95cdf0fe4f533', '1', '1595215808', '1595215808');
INSERT INTO `mg_image` VALUES ('1503', '20200720', '5f150fc0ab728.jpg', 'colonnade_31.jpg', '20e86d86a2534f69aeba56cfe42d66d7', '2009f4ed95faed2968ce3778a7fed1ac8196d547', '1', '1595215808', '1595215808');
INSERT INTO `mg_image` VALUES ('1504', '20200720', '5f150fc0b6be1.jpg', 'colonnade_32.jpg', 'a26ea2f1927097194ae1cac583942f08', '66e201eaa922bca927feaf8797af304380786dcb', '1', '1595215808', '1595215808');
INSERT INTO `mg_image` VALUES ('1505', '20200720', '5f150fc0bde57.jpg', 'colonnade_28.jpg', '540a70eb1c058e9ce1648a1901cd2b15', '7d1f9ea495b80de442577d00b3728c7daff7b02d', '1', '1595215808', '1595215808');
INSERT INTO `mg_image` VALUES ('1506', '20200720', '5f150fc0d8d25.jpg', 'colonnade_35.jpg', '77b4802bd4cfcbb597d03f7fef8760fd', '8202b0bb220ceec89ca435c5b1519c955aa4bfbe', '1', '1595215808', '1595215808');
INSERT INTO `mg_image` VALUES ('1507', '20200720', '5f150fc10371f.jpg', 'colonnade_33.jpg', 'fd490a0ee9a527c6b59907019c75f061', '12f8851b918c261c3a55084d1282ea1f0f5d12ae', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1508', '20200720', '5f150fc10f4a6.jpg', 'colonnade_38.jpg', 'c67946db4830d71f8ee60cca7b98a202', 'b019a754d35c0b46d8e6748f54df96aa6862e0e4', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1509', '20200720', '5f150fc12bbf7.jpg', 'colonnade_36.jpg', '71d45f562ee808d6820a9d351532ead4', 'ca5889107fb7629d5e049cf314f494a85f583c12', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1510', '20200720', '5f150fc16a5a3.jpg', 'colonnade_20.jpg', '37812bcd7419ec3507ec1430130f0c13', '26a783aeac58623f4403d88ea69b4f7dfe087389', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1511', '20200720', '5f150fc17711e.jpg', 'colonnade_40.jpg', 'a2247a2ee4bb286e7e1b7fb92ac9d262', '473976c2c373805bf032d6b9ae45ab568054b620', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1512', '20200720', '5f150fc17cd9a.jpg', 'colonnade_39.jpg', '9a86b385d8f834cd5c234a2f65bcec2a', 'ccd54bbfb001cbcee4fe2b7eccaaa7c47d81ba28', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1513', '20200720', '5f150fc184bc6.jpg', 'colonnade_34.jpg', 'be36b1c911d61e722f202d94b9e00cba', 'cd1f9a0b5fe066f0d289e68f46bd15c0e2f2397a', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1514', '20200720', '5f150fc1ac3e9.jpg', 'colonnade_45.jpg', 'fdb812ed6bea3cbc4105d7e9befa72b0', 'f6f8e9a660be6d3b9506103126e6b71530059ed8', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1515', '20200720', '5f150fc1cf8f0.jpg', 'colonnade_41.jpg', 'd35b86a4ea5c0687a37b5fb67f5f523f', 'd611ef11593d72cff6855a64d2ddbf9677c03e7a', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1516', '20200720', '5f150fc1ddc68.jpg', 'colonnade_37.jpg', '7a236a3e6dad0d07c702ee8c80540c9a', '14c5ba91f64316f12074766bd08fb3c9746f3da4', '1', '1595215809', '1595215809');
INSERT INTO `mg_image` VALUES ('1517', '20200720', '5f150fc34994b.jpg', 'colonnade_43.jpg', '9dd6ccf095f0b08ec632ad93d767d291', 'aa6a22818361d5beb584179e45553d71769f8ec6', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1518', '20200720', '5f150fc34f0b1.jpg', 'colonnade_44.jpg', '496995793d46bb4ceb0dacdbdbdab698', 'a48b9e2e5f2a8063cdaeb7ac69ff11d8a09e586d', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1519', '20200720', '5f150fc353c08.jpg', 'colonnade_42.jpg', '30ed71f11205708614feafcac7f05465', 'c598554f4005111d579cb3977fc982a322861a39', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1520', '20200720', '5f150fc35ab43.jpg', 'colonnade_46.jpg', '8f396b405e61e8ebb15d48ce3537862c', '2f3703bc9c922b7f0bfa225fbb72dbefb8eb9c51', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1521', '20200720', '5f150fc367112.jpg', 'colonnade_47.jpg', 'b5a49b3b6e575637d2f387b6c451d9e7', '558e981c97a353358d87481cee208d1e8a7ca869', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1522', '20200720', '5f150fc39c696.jpg', 'colonnade_48.jpg', '1c72f63430d38354feb7c88aa30767cc', 'b8c38433995e07e43624f1a1e23938452d16f08d', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1523', '20200720', '5f150fc3aae1c.jpg', 'colonnade_53.jpg', 'c656661bb75569e2274253da913e7ded', '6ac7a251338e76dad81143538ba66a28bc0e22a7', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1524', '20200720', '5f150fc3da8de.jpg', 'colonnade_54.jpg', '17a89711544c9c31022a2e3ea7a8839b', 'e9b31272bb4b183df9c7038b9890c8dc9e198001', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1525', '20200720', '5f150fc3e87d6.jpg', 'colonnade_52.jpg', '96d1e18941c2898b6d7233c449bbf9b5', '5b78b40e418961accef13b77286957a9919a3ff3', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1526', '20200720', '5f150fc3f2473.jpg', 'colonnade_49.jpg', 'f53e228b16a9d427105742398c37265c', 'eb98e60370812bcbcef2677ca5fe71c8d4cb1570', '1', '1595215811', '1595215811');
INSERT INTO `mg_image` VALUES ('1527', '20200720', '5f150fc41fdbd.jpg', 'colonnade_55.jpg', 'a0eb09e5b74781aca102b362a9ed4c6b', '6fdcdaf91feb4e7448f4b297d10ddee32ed769f1', '1', '1595215812', '1595215812');
INSERT INTO `mg_image` VALUES ('1528', '20200720', '5f150fc4298cc.jpg', 'colonnade_56.jpg', 'd4dc237129bf8077af1618418c4d178b', '2275f5256b5124e6dfcf9e9b05819f11717e5a9f', '1', '1595215812', '1595215812');
INSERT INTO `mg_image` VALUES ('1529', '20200720', '5f150fc46aadf.jpg', 'colonnade_60.jpg', 'c5507724265638fc078688d85f1b6a50', 'c4bacc66fa0d601de309b7863d2b4b845f5ac0a3', '1', '1595215812', '1595215812');
INSERT INTO `mg_image` VALUES ('1530', '20200720', '5f150fc5841dc.jpg', 'colonnade_59.jpg', '303cefc48a316d49f5847ce7a1f8b187', '686876de28707a1764c498807307159fa60b0741', '1', '1595215813', '1595215813');
INSERT INTO `mg_image` VALUES ('1531', '20200720', '5f150fc588ef9.jpg', 'colonnade_57.jpg', 'bdd510c0856c1b1e73a2abbfe9fc8862', '836e017bea18e1938eba01e53aa9972888a9481f', '1', '1595215813', '1595215813');
INSERT INTO `mg_image` VALUES ('1532', '20200720', '5f150fc59184a.jpg', 'colonnade_51.jpg', 'df873deef9d8ff76d43a886de7e1f575', '9654f29e9cff748e6331dc704336541240914b97', '1', '1595215813', '1595215813');
INSERT INTO `mg_image` VALUES ('1533', '20200720', '5f150fc5977af.jpg', 'colonnade_50.jpg', '3faf47e7e138188200c054e82550f309', 'e21bfbe491a2d81d5c40f85cec3c08ddc83e161e', '1', '1595215813', '1595215813');
INSERT INTO `mg_image` VALUES ('1534', '20200720', '5f150fc59e3bf.jpg', 'colonnade_58.jpg', '1a56e27c6f9ed3c5652dd83065696a67', 'b8ec76a9daac18cdd807f33ee98391f9e4d36544', '1', '1595215813', '1595215813');
INSERT INTO `mg_image` VALUES ('1536', '20200720', '5f1513ba9450f.jpg', 'wannaeat_03.jpg', 'ad39188a495f8bf25cb107931af24888', 'acd5768a67213931ddc3f254420e90dbf4d7aa11', '1', '1595216826', '1595216826');
INSERT INTO `mg_image` VALUES ('1537', '20200720', '5f1513baac53c.jpg', 'wannaeat_07.jpg', 'e665265171881beb4886c1004c89c6d7', 'e2d04d5a8599fbbe66e3cdf8c7ff122e392d1a2f', '1', '1595216826', '1595216826');
INSERT INTO `mg_image` VALUES ('1538', '20200720', '5f1513bab37fe.jpg', 'wannaeat_06.jpg', 'bdf3e5e73407934eb0ef2c5a3c83724b', '1035e777a8a94e467d1fddd87a11b24a7c9e98e0', '1', '1595216826', '1595216826');
INSERT INTO `mg_image` VALUES ('1539', '20200720', '5f1513bb495a4.jpg', 'wannaeat_10.jpg', '6ffbed84d94c618f1365ab86bcbf863d', '3eba9ed350ed5a9c31758f510e8f853c4844ddc6', '1', '1595216827', '1595216827');
INSERT INTO `mg_image` VALUES ('1540', '20200720', '5f1513bb5798b.jpg', 'wannaeat_08.jpg', 'fc3d45d9abb5a97094a101d813934a47', '71f014942927ee61c520af0156fd7a07006ebecb', '1', '1595216827', '1595216827');
INSERT INTO `mg_image` VALUES ('1541', '20200720', '5f1513bb6bef0.jpg', 'wannaeat_11.jpg', 'c6ebb5b04a7f948de4f703e4eeb3c8eb', '77908dbba4e4161f0027554cc8412126b4869050', '1', '1595216827', '1595216827');
INSERT INTO `mg_image` VALUES ('1542', '20200720', '5f1513bb7588a.jpg', 'wannaeat_09.jpg', '298cbf24a0da1e69ad3c4aa5e013f7c4', 'a589234db30b8d1da7cecb86e54dca9214589ee9', '1', '1595216827', '1595216827');
INSERT INTO `mg_image` VALUES ('1543', '20200720', '5f1513bb7ae93.jpg', 'wannaeat_12.jpg', '3deb3a96b748d98b16dadfce98ec5db7', '5781587b8d84f4ed3c9ca678f33ad4c270aa7730', '1', '1595216827', '1595216827');
INSERT INTO `mg_image` VALUES ('1544', '20200720', '5f1513bbf0c1a.jpg', 'wannaeat_13.jpg', 'f3b53bce5d5549b1a5ad60ba9147971b', '19b5324a8f081d5b2585efe41869dff4e0f60f2c', '1', '1595216827', '1595216827');

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
INSERT INTO `mg_setting` VALUES ('home_banner_2_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_img', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_text', '', '0');
INSERT INTO `mg_setting` VALUES ('home_about_image', '1072', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_1_link', 'index.html', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_2_link', 'project.html?cate_id=1&id=19', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_4_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_5_link', '', '0');
INSERT INTO `mg_setting` VALUES ('home_about_en', 'O Interiors Ltd. is an interior design firm based in Hong Kong. We create space for residential, restaurant, office and retail. We are a team of professional, energetic individual’s with talented designers and experienced managers available to guide our client’s through the flawless and timely execution of any residential design project.', '0');
INSERT INTO `mg_setting` VALUES ('home_about_zh', 'O Interiors Ltd是位於香港的室內設計公司，專門為住家, 餐廳, 辦公室和商店作出設計規劃。團隊擁有專業的知識和活力，運用豐富的經驗完成每一個設計項目，做到完美及時。', '0');
INSERT INTO `mg_setting` VALUES ('name=', '39', '0');
INSERT INTO `mg_setting` VALUES ('home_project_list', '[\"43\",\"42\",\"19\",\"18\",\"17\"]', '1');
INSERT INTO `mg_setting` VALUES ('project_flow_title_1_en', 'MEETING AND DISCUSS WHAT CLIENT NEEDS', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_2_en', 'LAYOUT PLAN PROPOSAL AND REFERENCE IMAGES', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_2_zh', '提交草稿及相關參考', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_3_en', 'QUOTATION', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_3_zh', '報價', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_4_en', 'DESIGN IDEA /CONCEPT AND MATERIAL SELECTION', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_4_zh', '提交設計槪念及選用物料', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_5_en', 'CONSTRUCTION DRAWING AND SPECIFICATION', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_6_en', 'CONSTUCTION WORK', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_6_zh', '動工', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_img', '1071', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_title', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_company', 'O  Interiors Limited', '0');
INSERT INTO `mg_setting` VALUES ('contact_address', 'Unit A, 21/F, DAN 6, NO.6 FUI YIU KOK STREET, TSUEN WAN, HONG KONG\r\n荃灣灰窰角街6號 DAN6 21樓 A室', '0');
INSERT INTO `mg_setting` VALUES ('contact_tel', '+852 3612 4670', '0');
INSERT INTO `mg_setting` VALUES ('contact_fax', '+852 3612 4671', '0');
INSERT INTO `mg_setting` VALUES ('contact_facebook_name', 'O Interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_facebook_link', 'https://www.facebook.com/o.interiors', '0');
INSERT INTO `mg_setting` VALUES ('contact_whatsapp', '+852 5547 6974', '0');
INSERT INTO `mg_setting` VALUES ('contact_email', 'info@ointeriorshk.com', '0');
INSERT INTO `mg_setting` VALUES ('contact_address_link', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.6672701143543!2d114.11431811505426!3d22.366188985289313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3403f8eb980881cb%3A0x2aa18bd521bfbab3!2sDAN6!5e0!3m2!1sen!2shk!4v1589872190468!5m2!1sen!2shk', '0');
INSERT INTO `mg_setting` VALUES ('site_meta_icon', '1070', '0');
INSERT INTO `mg_setting` VALUES ('home_description', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"mso-spacerun: \'yes\'; font-family: \'Century Gothic\'; mso-fareast-font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 18.0000pt; mso-font-kerning: 0.0000pt;\">&nbsp;Mas Studio Limited</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"font-family: \'Century Gothic\'; color: #2f2f2f; font-size: 14pt;\">&nbsp;<span style=\"font-size: 12pt;\">actualizes imagination with creative designs</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-indent: 0.0000pt; mso-char-indent-count: 0.0000; text-autospace: ideograph-numeric; mso-pagination: widow-orphan; text-align: center; mso-line-height-alt: 0pt;\" align=\"center\"><span style=\"font-family: \'Century Gothic\'; color: #2f2f2f; font-size: 12pt;\">&nbsp;We strive to create exquisite interior space to realize stylish &ldquo;Green&rdquo; living</span></p>\r\n', '0');
INSERT INTO `mg_setting` VALUES ('home_description_hk', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"mso-spacerun: \'yes\'; font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 18.0000pt; mso-font-kerning: 0.0000pt;\">Mas Studio Limited</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; mso-char-indent-count: 2.0000; text-autospace: ideograph-numeric; mso-pagination: none; text-align: center;\" align=\"center\"><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f; font-size: 12pt;\"><span style=\"font-family: Microsoft JhengHei;\">以創意空間設計成就無限想像</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-right: 0.0000pt; margin-bottom: 23.4500pt; margin-left: 0.0000pt; mso-para-margin-right: 0.0000gd; mso-para-margin-bottom: 1.5000gd; mso-para-margin-left: 0.0000gd; text-autospace: ideograph-numeric; mso-pagination: widow-orphan; text-align: center;\" align=\"center\"><span style=\"font-size: 12pt;\"><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">我</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">們</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">致</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">力成就優質空間設計</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">,</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">創造時尚</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">&rdquo;</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">綠</span></span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\">&rdquo;</span><span style=\"font-family: \'Microsoft JhengHei\'; color: #2f2f2f;\"><span style=\"font-family: Microsoft JhengHei;\">色生活</span></span></span></p>\r\n<p class=\"MsoNormal\" style=\"mso-pagination: widow-orphan; text-align: center;\" align=\"center\">&nbsp;</p>\r\n</body>\r\n</html>', '0');
INSERT INTO `mg_setting` VALUES ('home_item1_link2', '', '0');
INSERT INTO `mg_setting` VALUES ('about', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_5_zh', '詳細設計圖', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_2_img', '1155', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_img', '1156', '0');
INSERT INTO `mg_setting` VALUES ('home_banner_3_link', '/project.html?type=new&id=18', '0');
INSERT INTO `mg_setting` VALUES ('project_flow_title_1_zh', '會面並了解客戶需要', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_column
-- ----------------------------
INSERT INTO `mg_z_column` VALUES ('24', '人性化的現代中式家居', '人性化的現代中式家居', '人性化的現代中式家居 飯廳展示櫃化作傳菜窗口', '人性化的現代中式家居 飯廳展示櫃化作傳菜窗口', '1151', '1591718400', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"margin: 1em 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\"><span style=\"font-size: 12pt;\">設計公司：&nbsp;<a class=\"profileLink\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/ointeriorshk/?__tn__=KH-R&amp;eid=ARCM1xB_crUMd7oirP6rvT7i0hRvSlHjo0E3qfheE85EqwnoIlCc0uRNhBYm2FwILkIYghdBRDlxVvlP&amp;fref=mentions&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq\" data-hovercard=\"/ajax/hovercard/page.php?id=564468857069170&amp;extragetparams=%7B%22__tn__%22%3A%22%2CdKH-R-R%22%2C%22eid%22%3A%22ARCM1xB_crUMd7oirP6rvT7i0hRvSlHjo0E3qfheE85EqwnoIlCc0uRNhBYm2FwILkIYghdBRDlxVvlP%22%2C%22fref%22%3A%22mentions%22%7D\" data-hovercard-prefer-more-content-show=\"1\">O Interiors</a></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\"><span style=\"font-size: 12pt;\">現代很多風格都會融入簡妁元素，新中式風格就是將傳統中式風格的複雜花線簡化，以較為簡單的線條呈現出中式設計的精粹。今次介紹這個單位位於沙田御龍山，戶主也喜歡中式風格，O Interiors的設計師就以印有中式圖案的牆紙來呈現中式感覺，再<span class=\"text_exposed_show\" style=\"display: inline; font-family: inherit;\">搭配線條簡單俐落的傢俬，令整間屋更為時尚。除此之外，屋內的空間規劃也十分有心思，廚房與飯廳之間的展示櫃就隱藏了極方便的機關，為戶主造就更美好的生活。</span></span></p>\r\n<div class=\"text_exposed_show\" style=\"display: inline; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\">\r\n<p style=\"margin: 1em 0px; font-family: inherit;\"><span style=\"font-size: 12pt;\">詳情：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/2LhmZor?fbclid=IwAR3khA_cDiQPb8hh0O7K8uhgXbhBZcn_xBE4GsZtsgxm1odjAaZWuTvy8u0\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2LhmZor%3Ffbclid%3DIwAR3khA_cDiQPb8hh0O7K8uhgXbhBZcn_xBE4GsZtsgxm1odjAaZWuTvy8u0&amp;h=AT21Ac4AZBvNgGoTpBkMuo2pjPwakn1yD6sfTQPh9gIkue6qFxu6asI1F7MjR7l6vgwHcRRJBMDGh6m6QE_gD56QvknzkGJyHVhm_kuGy6gtsh-F5CZam1r5ynuQXi1yR9y6iA1a9spwplHoUYYJJrHHcN0D9T9tqaLHcq_5gi7uOJ2EiS4ey9yoeOPp0Jkd2RB3NyBarKlXlwzxwJmLyArvnbsfEPc5aQARDAXpC5p5dcrmp6Tb-NH0U9EuCcxuc0wo3L-Fw0hrnTn_QkidhWNV5e-3SrIlXvqiv4nHuu8mHiDU6VzKQaGl0lIBkoqg_aQwZzv7LIKXBYkKE96MgAXEYB_3BHbJr7RsNtiy6RZgmIUvSy-zcwYefKhm_OT8G5LXwQ7w2e-IBnhRMVgwckqjgHy7A_lh-dUH2OrrXPqlTHpb9uHEHkT0sY7VS_omFt3dmk17OUPubFHR4sPxaU_NQ87n0A0ZhkIBtctzVB3hV59BjhMHmtbfDEYdVNi6h5el12JHBnskhs3LlUYCGcUVy0lLUAWK0z6lZNm-ZBAtoqUwnvsvO1TvmeWewhgTsis1288p0EEx8t6TP_NAnJ9Ig4qo25MHzhMLC7naQTzQKeaTPN4mlzwvXXGDfgBPJyTepv6Slr0JDoNw9tHjVsqkaLJsQMCEkhaXpOLiOGTCGSQjP0LB2w36YWLzVw3sZ0uVE0E6Fwf30xHS7P8gdlu96bpjjGC_csTXcWtvE-IZms42lPSQNGSLwpvifDJgVSh2sKs7Kppom7iC7a2mGb0QAh4CoBi8pkfWk8CM51X_RE47j_Z0MxT7_tioQ4vtj8K6RKsXXzQLenHWdtucKgWBDLA\">https://bit.ly/2LhmZor</a></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><span style=\"font-size: 12pt;\"><a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%A4%E5%85%A7%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">室內設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E8%A3%9D%E4%BF%AE%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">裝修設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%B6%E5%B1%85%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">家居設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%BD%8F%E5%AE%85%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">住宅設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%B6%E5%B1%85%E8%A3%9D%E4%BF%AE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">家居裝修</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%BD%8F%E5%AE%85%E8%A3%9D%E4%BF%AE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">住宅裝修</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%B8%AD%E5%BC%8F%E9%A2%A8%E6%A0%BC?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">中式風格</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%84%B2%E7%89%A9%E6%AB%83%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">儲物櫃設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E7%89%B9%E8%89%B2%E7%89%86?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">特色牆</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E9%A6%99%E6%B8%AF%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">香港設計</span></span></a></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><img src=\"/o_interiors/storage/image/20200611/5ee1ea771c644.jpg\" alt=\"\" width=\"827\" height=\"464\" /></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><iframe src=\"//www.youtube.com/embed/AAL31aDGrrU\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n</div>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"margin: 1em 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\"><span style=\"font-size: 12pt;\"><img src=\"/o_interiors/storage/cache/180_180/image/20200611/5ee1ea76bfe9f.jpg\" width=\"300\" /></span></p>\r\n<p style=\"margin: 1em 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\"><span style=\"font-size: 12pt;\">設計公司：&nbsp;<a class=\"profileLink\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/ointeriorshk/?__tn__=KH-R&amp;eid=ARCM1xB_crUMd7oirP6rvT7i0hRvSlHjo0E3qfheE85EqwnoIlCc0uRNhBYm2FwILkIYghdBRDlxVvlP&amp;fref=mentions&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq\" data-hovercard=\"/ajax/hovercard/page.php?id=564468857069170&amp;extragetparams=%7B%22__tn__%22%3A%22%2CdKH-R-R%22%2C%22eid%22%3A%22ARCM1xB_crUMd7oirP6rvT7i0hRvSlHjo0E3qfheE85EqwnoIlCc0uRNhBYm2FwILkIYghdBRDlxVvlP%22%2C%22fref%22%3A%22mentions%22%7D\" data-hovercard-prefer-more-content-show=\"1\">O Interiors</a></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\"><span style=\"font-size: 12pt;\">現代很多風格都會融入簡妁元素，新中式風格就是將傳統中式風格的複雜花線簡化，以較為簡單的線條呈現出中式設計的精粹。今次介紹這個單位位於沙田御龍山，戶主也喜歡中式風格，O Interiors的設計師就以印有中式圖案的牆紙來呈現中式感覺，再<span class=\"text_exposed_show\" style=\"display: inline; font-family: inherit;\">搭配線條簡單俐落的傢俬，令整間屋更為時尚。除此之外，屋內的空間規劃也十分有心思，廚房與飯廳之間的展示櫃就隱藏了極方便的機關，為戶主造就更美好的生活。</span></span></p>\r\n<div class=\"text_exposed_show\" style=\"display: inline; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #666666; font-size: 12px;\">\r\n<p style=\"margin: 1em 0px; font-family: inherit;\"><span style=\"font-size: 12pt;\">詳情：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/2LhmZor?fbclid=IwAR3khA_cDiQPb8hh0O7K8uhgXbhBZcn_xBE4GsZtsgxm1odjAaZWuTvy8u0\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F2LhmZor%3Ffbclid%3DIwAR3khA_cDiQPb8hh0O7K8uhgXbhBZcn_xBE4GsZtsgxm1odjAaZWuTvy8u0&amp;h=AT21Ac4AZBvNgGoTpBkMuo2pjPwakn1yD6sfTQPh9gIkue6qFxu6asI1F7MjR7l6vgwHcRRJBMDGh6m6QE_gD56QvknzkGJyHVhm_kuGy6gtsh-F5CZam1r5ynuQXi1yR9y6iA1a9spwplHoUYYJJrHHcN0D9T9tqaLHcq_5gi7uOJ2EiS4ey9yoeOPp0Jkd2RB3NyBarKlXlwzxwJmLyArvnbsfEPc5aQARDAXpC5p5dcrmp6Tb-NH0U9EuCcxuc0wo3L-Fw0hrnTn_QkidhWNV5e-3SrIlXvqiv4nHuu8mHiDU6VzKQaGl0lIBkoqg_aQwZzv7LIKXBYkKE96MgAXEYB_3BHbJr7RsNtiy6RZgmIUvSy-zcwYefKhm_OT8G5LXwQ7w2e-IBnhRMVgwckqjgHy7A_lh-dUH2OrrXPqlTHpb9uHEHkT0sY7VS_omFt3dmk17OUPubFHR4sPxaU_NQ87n0A0ZhkIBtctzVB3hV59BjhMHmtbfDEYdVNi6h5el12JHBnskhs3LlUYCGcUVy0lLUAWK0z6lZNm-ZBAtoqUwnvsvO1TvmeWewhgTsis1288p0EEx8t6TP_NAnJ9Ig4qo25MHzhMLC7naQTzQKeaTPN4mlzwvXXGDfgBPJyTepv6Slr0JDoNw9tHjVsqkaLJsQMCEkhaXpOLiOGTCGSQjP0LB2w36YWLzVw3sZ0uVE0E6Fwf30xHS7P8gdlu96bpjjGC_csTXcWtvE-IZms42lPSQNGSLwpvifDJgVSh2sKs7Kppom7iC7a2mGb0QAh4CoBi8pkfWk8CM51X_RE47j_Z0MxT7_tioQ4vtj8K6RKsXXzQLenHWdtucKgWBDLA\">https://bit.ly/2LhmZor</a></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><span style=\"font-size: 12pt;\"><a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%A4%E5%85%A7%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">室內設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E8%A3%9D%E4%BF%AE%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">裝修設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%B6%E5%B1%85%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">家居設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%BD%8F%E5%AE%85%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">住宅設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%AE%B6%E5%B1%85%E8%A3%9D%E4%BF%AE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">家居裝修</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%BD%8F%E5%AE%85%E8%A3%9D%E4%BF%AE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">住宅裝修</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E4%B8%AD%E5%BC%8F%E9%A2%A8%E6%A0%BC?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">中式風格</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E5%84%B2%E7%89%A9%E6%AB%83%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">儲物櫃設計</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E7%89%B9%E8%89%B2%E7%89%86?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">特色牆</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E9%A6%99%E6%B8%AF%E8%A8%AD%E8%A8%88?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARA4P9blXSkIo6F0QcBV4Kf6XawleQrZJRMztVH_LoqMK-Ym3c9iVKExIPOIONu9bs-cljcI-qnntZeQhdhWwfp0F7qeyWlGXhYqdMK2Q1TrHup2h4_R9nviXC02PtN0QN3v4v0S7A3mcHWkS8ifuzgKREbk1yuxtnQu_ot6om5dIzG2N5FiA7hd8XlMKUrUQ7YqmeojgiDxGnBXOOWFa7E6dgQCo6NZPvuKWib0v8Xo9phNlDuFkqx4gx8cL0jKW3SFNKu9qFB0UowJKa9ppgfjdsOamDfv8N1nm7E6hSZZUQdxkLtKui2TrSGDFAzQ8adp0npTLdTL_rhI9qbI3AmnaeiG-mttMLwW9ZKG829AspffDAfEh5nV6pP15oLRNbJtMmqtC9-cPte5HFB8htdI93uPqzGOGRuBHR-QGPuebkVQNMhtBVwv8kaM2tnjqDE5u8yVzVdrRqk2SuKCUXsWiCZe5RXTbfOi8iGGbUeF9RdkeJ9Xz_wq&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">香港設計</span></span></a></span></p>\r\n</div>\r\n</body>\r\n</html>', '', '0', '1');
INSERT INTO `mg_z_column` VALUES ('28', '【樓‧計飾】', '【樓‧計飾】', 'Now Finance - 財經﻿ ', 'Now Finance - 財經﻿ ', '1154', '1591804800', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"font-size: 14pt;\"><span class=\"_1nb_ fwn fcg\" style=\"color: #90949c; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; font-size: 24pt;\" data-ft=\"{\"><span class=\"fwb\" style=\"font-weight: 600; font-family: inherit;\" data-ft=\"{\"><a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/now.comFinance/?__tn__=kCH-R&amp;eid=ARBSm-moBNThfVjxSh-ujwzHKrG7NFvMCb2ZFrRYNGcxlC5qu5U35NYCPTAW5SaNVAX66TXqo6984Wtt&amp;hc_ref=ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw&amp;fref=nf&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg\" data-hovercard=\"/ajax/hovercard/page.php?id=575108459181042&amp;extragetparams=%7B%22__tn__%22%3A%22%2CdkCH-R-R%22%2C%22eid%22%3A%22ARBSm-moBNThfVjxSh-ujwzHKrG7NFvMCb2ZFrRYNGcxlC5qu5U35NYCPTAW5SaNVAX66TXqo6984Wtt%22%2C%22hc_ref%22%3A%22ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw%22%2C%22fref%22%3A%22nf%22%7D\" data-hovercard-prefer-more-content-show=\"1\" data-hovercard-referer=\"ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw\">Now Finance - 財經</a></span></span><span id=\"u_7z_1d\" class=\"uiLikePageButton _47we\" style=\"float: right; margin: 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #1c1e21;\"><button id=\"u_7z_3n\" class=\"_42ft _4jy0 PageLikeButton _4jy3 _517h _51sy\" style=\"font-family: inherit; margin: 0px; border-radius: 2px; box-sizing: content-box; -webkit-font-smoothing: antialiased; font-weight: bold; justify-content: center; padding: 0px 8px; position: relative; vertical-align: middle; transition: background-color 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s, box-shadow 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s, transform 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s; background-color: #f5f6f7; color: #4b4f56; line-height: 22px; cursor: pointer; white-space: nowrap; border: 1px solid #ccd0d5;\" type=\"submit\" value=\"1\" data-profileid=\"575108459181042\" data-ft=\"{\" data-ownerid=\"u_7z_1d\">Like Page</button></span></span></p>\r\n<div class=\"_171_\" style=\"padding-right: 80px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #1c1e21; font-size: 12px;\">\r\n<div id=\"feed_subtitle_3978899662135221:9:0\" class=\"_5pcp _5lel _2jyu _232_\" style=\"position: relative; color: #616770; font-family: inherit;\" data-testid=\"story-subtitle\"><span style=\"font-size: 14pt;\"><span class=\"n_1oupk0-gr8\" style=\"font-family: inherit;\"><span class=\"fsm fwn fcg\" style=\"color: #90949c; font-family: inherit;\"><a class=\"async_saving _400z _2-40 _5pcq\" style=\"color: #616770; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/now.comFinance/videos/1342872815913983/?__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=H-R\" target=\"\" rel=\"async\" aria-label=\"Video, April 15, 2020, Duration: 5 minutes, 9 seconds\" data-video-channel-id=\"575108459181042\" data-channel-caller=\"channel_view_from_page_timeline\" data-onclick=\"[{\">April 15</a></span></span><span class=\"_6spk\" style=\"font-family: inherit;\" role=\"presentation\" aria-hidden=\"true\">&nbsp;&middot;&nbsp;</span></span></div>\r\n</div>\r\n<div class=\"mtm _5pco\" style=\"font-size: 12px; color: #666666; margin-top: 10px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif;\" data-testid=\"post_message\" data-ft=\"{\">\r\n<div id=\"id_5ee1ed74155805223986764\" class=\"text_exposed_root text_exposed\" style=\"display: inline; font-family: inherit;\">\r\n<p style=\"margin: 1em 0px; font-family: inherit;\"><span style=\"font-size: 14pt;\">【樓‧計飾】設計用色加入深淺對比，可以增加層次感之外，喺今次參觀單位當中，亦起到轉移視覺焦點嘅效果；單位兩房，其中一間縮細，目的要騰出位置喺客廳增設小朋友玩樂空間。</span></p>\r\n<p style=\"margin: 1em 0px; font-family: inherit;\"><iframe style=\"border: none; overflow: hidden;\" src=\"https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fnow.comFinance%2Fvideos%2F1342872815913983%2F&amp;show_text=0&amp;width=560\" width=\"560\" height=\"315\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n<p style=\"margin: 1em 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><span style=\"font-size: 14pt;\"><a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E6%A8%93%E8%A8%88%E9%A3%BE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">樓計飾</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/now%E8%B2%A1%E7%B6%93%E5%8F%B0?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">Now財經台</span></span></a></span><br /><span style=\"font-size: 14pt;\">===============================</span><br /><span style=\"font-size: 14pt;\">- 下載《Now財經》App，睇盡財經及地產新聞 -<span class=\"text_exposed_show\" style=\"display: inline; font-family: inherit;\"><br />iOS：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/11bgYgy?fbclid=IwAR1AC1HM-h85KL-17SrEDkvCkYD1b3FlKwHPTNa5q_Xu_dFCWuC4n595SRQ\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F11bgYgy%3Ffbclid%3DIwAR1AC1HM-h85KL-17SrEDkvCkYD1b3FlKwHPTNa5q_Xu_dFCWuC4n595SRQ&amp;h=AT19u8pQeC03sHn_or2R5_uK3Tv6aVnTLgbQJuze240Cbd9_3zkJaE_ZaMPsni0a1qiEYJwrEJv4lTKoxQosuDHdOG5e3I6ki7hGJ1KG_ZMMFtMnnWFf-NDi1pZkLIsfgANYZsRHht2f8DGDYSwvtAgpoT0H9p24Ly-V6bhoS0O6c1WQ4L-SZacy2JmuRTat_M-yXtZb4DCTJPsZyqGwGzfvVcV7zHqu-TerWLJhNCxQLyjUE3ZBVVkGPbgyWF0iovXDENa-xExra0IW6bws1-9xr6FysfvLpGpjC-nylwJIPZxXmcHm0nclmO8ub8OQiQoKtaY46KofFQw54VPWzMtmVTfvf53H8lYiyEo6QMY40QH939cI4qSnpuYrTlF8Pa3Pl0l2khFY9sGf0Rr5RPd9TPgHIvyjV20phILhDoGws_-Ao3ciL43PSCn-wB1i8BUxnJm1nkTPtSs3kFIBg--uL-GBOiEzGsRDWTpxxBksbr7pi-zZiLWirrncXwBIU-TyywI-EgoyNxQyKcB4kgdtu9UaKGWm4rNqp1t2lH9IhhtrIzrMCK5foVj64DHiXizyFqaEwPKX-jV6PBADcZMYha_ZQNhJ0PNd0hkcvuVOKSL2tKxNT6V4Stv-2yVQ46tEr4OxkKEHxHbAuy0AVxh6le-c37abIXpU0qAscrpq9FnRbpMjvVs3LHFcuXZXB3JjPAIbQZAio9NPoY05xFL9eDLZ7ewKc7OyG9KGFdajEArSoqEvGS4xbLStrW84BsLxX9JdEDXLg2Kn3D0ljfx7YGGSNmGtUKMvIjzkXTkq91_NhkaUn2YDrfQi7cXdCvwZK3Ryh8d8JpNWrYTP6wd2LFMLyvHvhE5Ec3bbCg\">http://bit.ly/11bgYgy</a><br />Android：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/ZLf9WC?fbclid=IwAR0qpzXvIhzYJZEBVYGNDGI21bkgo05qjrq4l9W2Nipmr7NCxg52E6qeric\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2FZLf9WC%3Ffbclid%3DIwAR0qpzXvIhzYJZEBVYGNDGI21bkgo05qjrq4l9W2Nipmr7NCxg52E6qeric&amp;h=AT3odu5u0gubQTDWI3jThCX6i49uMYvL5IwHj2GX2KSFEx_iwrg3LnNS6C8NNdQkkTZOw_9BXVFLMqoVk_EtQvtxEVh_Vq8A11D6cX6WrhjxHUBBG3RoBVpRwsaxaT7NPoKFEIvhTBlymM5JKN1EWp3ncR3EhKOCE0lsXEN1AYG_Npzya65l1V9xPdClEIS4ouP-dmlHMIV_HSmK4xUy0FK81dv14ouReWOvSqVZFyRbwT7RFY2X-_l-E3wi3igKggfrEmVP7f5bTZkx_6bHVXZIHozrDbcsOEioxPrAmWWX9jBIGZbRuN28hg4ZhvsrygcenYmc8w4DfoZ0F5i6EvYiE_y2GP9D9ukegP2vfdxbMAONFO9wdtizzCbN3eKIFWk9Mf5gmvvnklHe3_jzjqKhj0wNrP3OYZuLV42ZAQN-OXppLv9Lpz0z4uMaJffwXX8CH4w6gbDB4kepnv3V5Vzg-jkKjjow113vkta0KWfZWDd4DGd1j17Fx8KL6F07EFv0c94dGimfSpnatBBok-lVvL_7y2HGC7MjDsg_qZQDiOZbx9I8GU-OMOBjnlrUweZS-VbqjjEjg55tZ-lZMl4bWViKY2cE8oc97syU6eUMHC31JuoFky_HTnUA3qr004FLGu70ZeSBfcq_JcxHwozncqj-NL3dH7X0y_y1yFGG8YYfdwFPQ_27bNVQUSypmQruOFVqQeFrITLgTdlWw8AI60ReaPKA1yU_4eiPQf67rRxdvwZVnA6rWKMsggish8drVbz-L2HE7wQZ64DrRofaeYSaaC1a2EnK_dVs047puW0fj_-CppbE5JPmssz6TM4RjPiKd64zAv8bwobylDViU4__8lk4BvTa0lvk1Q\">http://bit.ly/ZLf9WC</a><br />*記得將我哋個page設為「搶先看」呀*<br />===============================</span></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><iframe style=\"border: none; overflow: hidden;\" src=\"https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fnow.comFinance%2Fvideos%2F1342872815913983%2F&amp;show_text=1&amp;width=560\" width=\"560\" height=\"948\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"allowfullscreen\"></iframe></p>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><span style=\"font-size: 14pt;\"><span class=\"_1nb_ fwn fcg\" style=\"color: #90949c; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; font-size: 24pt;\" data-ft=\"{\"><span class=\"fwb\" style=\"font-weight: 600; font-family: inherit;\" data-ft=\"{\"><a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/now.comFinance/?__tn__=kCH-R&amp;eid=ARBSm-moBNThfVjxSh-ujwzHKrG7NFvMCb2ZFrRYNGcxlC5qu5U35NYCPTAW5SaNVAX66TXqo6984Wtt&amp;hc_ref=ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw&amp;fref=nf&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg\" data-hovercard=\"/ajax/hovercard/page.php?id=575108459181042&amp;extragetparams=%7B%22__tn__%22%3A%22%2CdkCH-R-R%22%2C%22eid%22%3A%22ARBSm-moBNThfVjxSh-ujwzHKrG7NFvMCb2ZFrRYNGcxlC5qu5U35NYCPTAW5SaNVAX66TXqo6984Wtt%22%2C%22hc_ref%22%3A%22ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw%22%2C%22fref%22%3A%22nf%22%7D\" data-hovercard-prefer-more-content-show=\"1\" data-hovercard-referer=\"ARSL227HgBmXZI9qVRcyXZ-CZlokxKP4RehaFzLeIZiXBoojKCtQjHg1JPam9gE-kkw\">Now Finance - 財經</a></span></span><span id=\"u_7z_1d\" class=\"uiLikePageButton _47we\" style=\"float: right; margin: 0px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #1c1e21;\"><button id=\"u_7z_3n\" class=\"_42ft _4jy0 PageLikeButton _4jy3 _517h _51sy\" style=\"font-family: inherit; margin: 0px; border-radius: 2px; box-sizing: content-box; -webkit-font-smoothing: antialiased; font-weight: bold; justify-content: center; padding: 0px 8px; position: relative; vertical-align: middle; transition: background-color 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s, box-shadow 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s, transform 200ms cubic-bezier(0.08, 0.52, 0.52, 1) 0s; background-color: #f5f6f7; color: #4b4f56; line-height: 22px; cursor: pointer; white-space: nowrap; border: 1px solid #ccd0d5;\" type=\"submit\" value=\"1\" data-profileid=\"575108459181042\" data-ft=\"{\" data-ownerid=\"u_7z_1d\">Like Page</button></span></span></p>\r\n<div class=\"_171_\" style=\"padding-right: 80px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif; color: #1c1e21; font-size: 12px;\">\r\n<div id=\"feed_subtitle_3978899662135221:9:0\" class=\"_5pcp _5lel _2jyu _232_\" style=\"position: relative; color: #616770; font-family: inherit;\" data-testid=\"story-subtitle\"><span style=\"font-size: 14pt;\"><span class=\"n_1oupk0-gr8\" style=\"font-family: inherit;\"><span class=\"fsm fwn fcg\" style=\"color: #90949c; font-family: inherit;\"><a class=\"async_saving _400z _2-40 _5pcq\" style=\"color: #616770; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/now.comFinance/videos/1342872815913983/?__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=H-R\" target=\"\" rel=\"async\" aria-label=\"Video, April 15, 2020, Duration: 5 minutes, 9 seconds\" data-video-channel-id=\"575108459181042\" data-channel-caller=\"channel_view_from_page_timeline\" data-onclick=\"[{\">April 15</a></span></span><span class=\"_6spk\" style=\"font-family: inherit;\" role=\"presentation\" aria-hidden=\"true\">&nbsp;&middot;&nbsp;</span></span></div>\r\n</div>\r\n<div class=\"mtm _5pco\" style=\"font-size: 12px; color: #666666; margin-top: 10px; font-family: system-ui, -apple-system, system-ui, \'.SFNSText-Regular\', sans-serif;\" data-testid=\"post_message\" data-ft=\"{\">\r\n<div id=\"id_5ee1ed74155805223986764\" class=\"text_exposed_root text_exposed\" style=\"display: inline; font-family: inherit;\">\r\n<p style=\"margin: 1em 0px; font-family: inherit;\"><span style=\"font-size: 14pt;\">【樓‧計飾】設計用色加入深淺對比，可以增加層次感之外，喺今次參觀單位當中，亦起到轉移視覺焦點嘅效果；單位兩房，其中一間縮細，目的要騰出位置喺客廳增設小朋友玩樂空間。</span></p>\r\n<p style=\"margin: 1em 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\"><span style=\"font-size: 14pt;\"><a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/%E6%A8%93%E8%A8%88%E9%A3%BE?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">樓計飾</span></span></a>&nbsp;<a class=\"_58cn\" style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://www.facebook.com/hashtag/now%E8%B2%A1%E7%B6%93%E5%8F%B0?__eep__=6&amp;source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARAIKU8uE8y28Ct6dDCEDmZveme_PcXFNynNQs8jAmcCM4bSxfH-yyqxwqBEvcHqlIyDcR4zDdH6c1dsxb97TJtLX7GICnbb5niuumSzi1KuQ4CJnMu7Q-B_oQXuJrNKvddzFYYUTD8yIsbOgcIXQ99Ybx8fzs2YCyUzY3H751r_Jzc_Kje3-GLgveQ8IA45_9y-JdaiSibyRsrQjeGE7p-ftu8N4qLm9DvCTnRCelv2w2zLquXBvZDBlOOGiES1dbt4Ae6gAI7zESteKbgyo8KovSuAPPNv4ogbygbEd4HUEtBqkRQpjdWrxzduidEb6zZDPxIiJd30SZKDtA675ol5SckrJb5fpnXpGTAlYOcsBZGx2nS75YqEW3ZG6yfvTabM8NOinjTR7pnXRHJUOgCEz-AQvPsleQ_YxNEhdaPlspdka2vc21_kezMZnDqUnpILs-BDPjKGthB7iaKfYCGkWm6HI6vdaQvgKQ7agWaA0u-NvkuGMpe_is7tfCgUFg&amp;__tn__=%2ANKH-R\" type=\"\" data-ft=\"{\"><span class=\"_5afx\" style=\"direction: ltr; unicode-bidi: isolate; font-family: inherit;\"><span class=\"_58cl _5afz\" style=\"unicode-bidi: isolate; color: #365899; font-family: inherit;\" aria-label=\"hashtag\">#</span><span class=\"_58cm\" style=\"font-family: inherit;\">Now財經台</span></span></a></span><br /><span style=\"font-size: 14pt;\">===============================</span><br /><span style=\"font-size: 14pt;\">- 下載《Now財經》App，睇盡財經及地產新聞 -<span class=\"text_exposed_show\" style=\"display: inline; font-family: inherit;\"><br />iOS：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/11bgYgy?fbclid=IwAR1AC1HM-h85KL-17SrEDkvCkYD1b3FlKwHPTNa5q_Xu_dFCWuC4n595SRQ\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2F11bgYgy%3Ffbclid%3DIwAR1AC1HM-h85KL-17SrEDkvCkYD1b3FlKwHPTNa5q_Xu_dFCWuC4n595SRQ&amp;h=AT19u8pQeC03sHn_or2R5_uK3Tv6aVnTLgbQJuze240Cbd9_3zkJaE_ZaMPsni0a1qiEYJwrEJv4lTKoxQosuDHdOG5e3I6ki7hGJ1KG_ZMMFtMnnWFf-NDi1pZkLIsfgANYZsRHht2f8DGDYSwvtAgpoT0H9p24Ly-V6bhoS0O6c1WQ4L-SZacy2JmuRTat_M-yXtZb4DCTJPsZyqGwGzfvVcV7zHqu-TerWLJhNCxQLyjUE3ZBVVkGPbgyWF0iovXDENa-xExra0IW6bws1-9xr6FysfvLpGpjC-nylwJIPZxXmcHm0nclmO8ub8OQiQoKtaY46KofFQw54VPWzMtmVTfvf53H8lYiyEo6QMY40QH939cI4qSnpuYrTlF8Pa3Pl0l2khFY9sGf0Rr5RPd9TPgHIvyjV20phILhDoGws_-Ao3ciL43PSCn-wB1i8BUxnJm1nkTPtSs3kFIBg--uL-GBOiEzGsRDWTpxxBksbr7pi-zZiLWirrncXwBIU-TyywI-EgoyNxQyKcB4kgdtu9UaKGWm4rNqp1t2lH9IhhtrIzrMCK5foVj64DHiXizyFqaEwPKX-jV6PBADcZMYha_ZQNhJ0PNd0hkcvuVOKSL2tKxNT6V4Stv-2yVQ46tEr4OxkKEHxHbAuy0AVxh6le-c37abIXpU0qAscrpq9FnRbpMjvVs3LHFcuXZXB3JjPAIbQZAio9NPoY05xFL9eDLZ7ewKc7OyG9KGFdajEArSoqEvGS4xbLStrW84BsLxX9JdEDXLg2Kn3D0ljfx7YGGSNmGtUKMvIjzkXTkq91_NhkaUn2YDrfQi7cXdCvwZK3Ryh8d8JpNWrYTP6wd2LFMLyvHvhE5Ec3bbCg\">http://bit.ly/11bgYgy</a><br />Android：<a style=\"color: #385898; cursor: pointer; text-decoration-line: none; font-family: inherit;\" href=\"https://bit.ly/ZLf9WC?fbclid=IwAR0qpzXvIhzYJZEBVYGNDGI21bkgo05qjrq4l9W2Nipmr7NCxg52E6qeric\" target=\"_blank\" rel=\"noopener nofollow\" data-ft=\"{\" data-lynx-mode=\"async\" data-lynx-uri=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fbit.ly%2FZLf9WC%3Ffbclid%3DIwAR0qpzXvIhzYJZEBVYGNDGI21bkgo05qjrq4l9W2Nipmr7NCxg52E6qeric&amp;h=AT3odu5u0gubQTDWI3jThCX6i49uMYvL5IwHj2GX2KSFEx_iwrg3LnNS6C8NNdQkkTZOw_9BXVFLMqoVk_EtQvtxEVh_Vq8A11D6cX6WrhjxHUBBG3RoBVpRwsaxaT7NPoKFEIvhTBlymM5JKN1EWp3ncR3EhKOCE0lsXEN1AYG_Npzya65l1V9xPdClEIS4ouP-dmlHMIV_HSmK4xUy0FK81dv14ouReWOvSqVZFyRbwT7RFY2X-_l-E3wi3igKggfrEmVP7f5bTZkx_6bHVXZIHozrDbcsOEioxPrAmWWX9jBIGZbRuN28hg4ZhvsrygcenYmc8w4DfoZ0F5i6EvYiE_y2GP9D9ukegP2vfdxbMAONFO9wdtizzCbN3eKIFWk9Mf5gmvvnklHe3_jzjqKhj0wNrP3OYZuLV42ZAQN-OXppLv9Lpz0z4uMaJffwXX8CH4w6gbDB4kepnv3V5Vzg-jkKjjow113vkta0KWfZWDd4DGd1j17Fx8KL6F07EFv0c94dGimfSpnatBBok-lVvL_7y2HGC7MjDsg_qZQDiOZbx9I8GU-OMOBjnlrUweZS-VbqjjEjg55tZ-lZMl4bWViKY2cE8oc97syU6eUMHC31JuoFky_HTnUA3qr004FLGu70ZeSBfcq_JcxHwozncqj-NL3dH7X0y_y1yFGG8YYfdwFPQ_27bNVQUSypmQruOFVqQeFrITLgTdlWw8AI60ReaPKA1yU_4eiPQf67rRxdvwZVnA6rWKMsggish8drVbz-L2HE7wQZ64DrRofaeYSaaC1a2EnK_dVs047puW0fj_-CppbE5JPmssz6TM4RjPiKd64zAv8bwobylDViU4__8lk4BvTa0lvk1Q\">http://bit.ly/ZLf9WC</a><br />*記得將我哋個page設為「搶先看」呀*<br />===============================</span></span></p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\">&nbsp;</p>\r\n<p style=\"margin: 1em 0px 0px; font-family: inherit;\">&nbsp;</p>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', '', '0', '1');

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
  `cover` int(11) NOT NULL DEFAULT '0',
  `image` text NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `video` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_z_project
-- ----------------------------
INSERT INTO `mg_z_project` VALUES ('17', '5', 'Wanna Eat', 'Wanna Eat', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">城市太忙，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">一路走著，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">總想找個地方歇一下，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">與</span><span lang=\"EN-US\" style=\"font-family: Helvetica; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">ISM DESIGN</span><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">共同合作下，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">營造出這繁囂中的清新氣息。</span></span></p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">城市太忙，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">一路走著，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">總想找個地方歇一下，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">與</span><span lang=\"EN-US\" style=\"font-family: Helvetica; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">ISM DESIGN</span><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">共同合作下，</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin: 0cm 0cm 0.0001pt; font-size: 12pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12pt;\"><span lang=\"ZH-TW\" style=\"font-family: MingLiU; color: #1c1e21; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">營造出這繁囂中的清新氣息。</span></span></p>\r\n</body>\r\n</html>', '1144', '[\"1544\",\"1543\",\"1542\",\"1541\",\"1540\",\"1539\",\"1538\",\"1537\",\"1536\",\"1535\",\"1146\",\"1145\",\"1144\",\"1142\"]', '1', '5', '1', '');
INSERT INTO `mg_z_project` VALUES ('18', '2', 'The Colonnade', ' 嘉崙台', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '1530', '[\"1534\",\"1533\",\"1532\",\"1531\",\"1530\",\"1529\",\"1528\",\"1527\",\"1526\",\"1525\",\"1524\",\"1523\",\"1522\",\"1521\",\"1520\",\"1519\",\"1518\",\"1517\",\"1516\",\"1515\",\"1514\",\"1513\",\"1512\",\"1511\",\"1510\",\"1509\",\"1508\",\"1507\",\"1506\",\"1505\",\"1504\",\"1503\",\"1502\",\"1501\",\"1500\",\"1499\",\"1498\",\"1497\",\"1496\",\"1495\",\"1494\",\"1493\",\"1492\",\"1491\",\"1490\",\"1489\",\"1488\",\"1487\",\"1486\",\"1485\",\"1484\",\"1483\",\"1482\",\"1481\",\"1480\",\"1479\",\"1478\",\"1477\",\"1476\",\"1475\"]', '1', '4', '1', 'https://www.youtube.com/embed/SmhO27Zij84');
INSERT INTO `mg_z_project` VALUES ('19', '1', 'Olive Physio and Stretch Centre', '健活理療伸展中心', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '1459', '[\"1474\",\"1473\",\"1472\",\"1471\",\"1470\",\"1469\",\"1468\",\"1467\",\"1466\",\"1465\",\"1464\",\"1463\",\"1462\",\"1461\",\"1460\",\"1459\"]', '1', '3', '1', '');
INSERT INTO `mg_z_project` VALUES ('42', '2', 'Chelsea Court ', '爵悅庭', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港</p>\r\n</body>\r\n</html>', '1440', '[\"1458\",\"1457\",\"1456\",\"1455\",\"1454\",\"1453\",\"1452\",\"1451\",\"1450\",\"1449\",\"1448\",\"1447\",\"1446\",\"1445\",\"1444\",\"1443\",\"1442\",\"1441\",\"1440\",\"1439\",\"1438\",\"1437\",\"1436\",\"1435\",\"1434\",\"1433\"]', '1', '2', '1', '');
INSERT INTO `mg_z_project` VALUES ('43', '1', 'Anucell ', '華憶科技', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Kwun Tong, Hong Kong</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>香港觀塘</p>\r\n</body>\r\n</html>', '1424', '[\"1432\",\"1431\",\"1430\",\"1429\",\"1428\",\"1427\",\"1426\",\"1425\",\"1424\",\"1423\",\"1422\",\"1421\",\"1420\",\"1419\",\"1418\",\"1131\"]', '1', '1', '1', '');
INSERT INTO `mg_z_project` VALUES ('44', '2', 'Fleur pavilia', '柏蔚山', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1182', '[\"1182\",\"1181\",\"1180\",\"1179\",\"1178\",\"1177\",\"1176\",\"1175\",\"1174\",\"1173\",\"1172\",\"1171\",\"1170\",\"1169\",\"1168\",\"1167\",\"1166\",\"1165\",\"1164\",\"1163\",\"1162\",\"1161\",\"1160\",\"1159\",\"1158\",\"1157\"]', '1', '0', '1', 'https://www.youtube.com/embed/flPfGTmOY9I');
INSERT INTO `mg_z_project` VALUES ('45', '2', 'GreenwoodTerrace', '康翠臺', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1185', '[\"1210\",\"1209\",\"1208\",\"1207\",\"1206\",\"1205\",\"1204\",\"1203\",\"1202\",\"1201\",\"1200\",\"1199\",\"1198\",\"1197\",\"1196\",\"1195\",\"1194\",\"1193\",\"1192\",\"1191\",\"1190\",\"1189\",\"1187\",\"1186\",\"1185\",\"1188\",\"1184\",\"1183\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('46', '2', 'Kwan Yick', '均益大廈', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1217', '[\"1236\",\"1235\",\"1234\",\"1233\",\"1232\",\"1231\",\"1230\",\"1229\",\"1228\",\"1227\",\"1226\",\"1225\",\"1224\",\"1223\",\"1222\",\"1221\",\"1220\",\"1219\",\"1218\",\"1217\",\"1216\",\"1215\",\"1214\",\"1213\",\"1212\",\"1211\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('47', '2', 'Manhattan Hill 36F', '曼克頓山 36F ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1242', '[\"1249\",\"1248\",\"1247\",\"1246\",\"1245\",\"1244\",\"1243\",\"1242\",\"1241\",\"1240\",\"1239\",\"1238\",\"1237\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('48', '2', 'The Hermitage 8B', '帝峰皇殿 8B ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1277', '[\"1278\",\"1277\",\"1276\",\"1275\",\"1274\",\"1273\",\"1272\",\"1271\",\"1270\",\"1269\",\"1268\",\"1267\",\"1266\",\"1265\",\"1264\",\"1263\",\"1262\",\"1261\",\"1260\",\"1259\",\"1258\",\"1257\",\"1256\",\"1255\",\"1254\",\"1253\",\"1252\",\"1251\",\"1250\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('49', '2', 'The Hermitage 60A', '帝峰皇殿 60A ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1282', '[\"1289\",\"1288\",\"1287\",\"1286\",\"1285\",\"1284\",\"1283\",\"1282\",\"1281\",\"1280\",\"1279\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('50', '2', 'The Hermitage 69C', '帝峰皇殿 69C ', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1290', '[\"1316\",\"1315\",\"1314\",\"1313\",\"1312\",\"1311\",\"1310\",\"1309\",\"1308\",\"1307\",\"1306\",\"1305\",\"1304\",\"1303\",\"1302\",\"1301\",\"1300\",\"1299\",\"1298\",\"1297\",\"1296\",\"1295\",\"1294\",\"1293\",\"1292\",\"1291\",\"1290\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('51', '2', 'The Monterey', 'The Monterey', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1338', '[\"1340\",\"1339\",\"1338\",\"1337\",\"1336\",\"1335\",\"1334\",\"1333\",\"1332\",\"1331\",\"1330\",\"1329\",\"1328\",\"1327\",\"1326\",\"1325\",\"1324\",\"1323\",\"1322\",\"1321\",\"1320\",\"1319\",\"1318\",\"1317\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('52', '2', 'The Palazzo', '御龍山', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1356', '[\"1379\",\"1378\",\"1377\",\"1376\",\"1375\",\"1374\",\"1373\",\"1372\",\"1371\",\"1370\",\"1369\",\"1368\",\"1367\",\"1366\",\"1365\",\"1364\",\"1363\",\"1362\",\"1361\",\"1360\",\"1359\",\"1358\",\"1357\",\"1356\",\"1355\",\"1354\",\"1353\",\"1352\",\"1351\",\"1350\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('53', '2', 'Twinpeak', '嘉悅', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1389', '[\"1406\",\"1405\",\"1404\",\"1403\",\"1402\",\"1401\",\"1400\",\"1399\",\"1398\",\"1397\",\"1396\",\"1395\",\"1394\",\"1393\",\"1392\",\"1391\",\"1390\",\"1389\",\"1388\",\"1387\",\"1386\",\"1385\",\"1384\",\"1383\",\"1382\",\"1381\",\"1380\"]', '1', '0', '1', '');
INSERT INTO `mg_z_project` VALUES ('54', '1', 'C Studio Office - Lioyds Commercial Building', 'C Studio 辦公室 - 萊德商業中心', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', '1414', '[\"1417\",\"1416\",\"1415\",\"1414\",\"1413\",\"1412\",\"1411\",\"1410\",\"1409\",\"1408\",\"1407\"]', '1', '0', '1', '');

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
INSERT INTO `mg_z_project_category` VALUES ('1', 'Commercial Projects', '商業項目', '1', '1');
INSERT INTO `mg_z_project_category` VALUES ('2', 'Residential Projects', '住宅項目', '3', '1');
INSERT INTO `mg_z_project_category` VALUES ('5', 'Restaurant Projects', '餐廳項目', '2', '1');
