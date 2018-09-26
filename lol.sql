/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : lol

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-21 15:11:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lol_about
-- ----------------------------
DROP TABLE IF EXISTS `lol_about`;
CREATE TABLE `lol_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `miss` text,
  `orderby` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '1',
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_about
-- ----------------------------
INSERT INTO `lol_about` VALUES ('3', '/public\\uploads\\thumb/20180921\\5fed5517f6278b36139f59b25e73e22a.png', '222', '<p>2222<br/></p>', '2', '2', '2018-09-21');
INSERT INTO `lol_about` VALUES ('4', '/public\\uploads\\thumb/20180921\\627322ae3d38e05173c7f4edf1796a9f.png', '333', '<p>333<br/></p>', '3', '3', '2018-09-21');
INSERT INTO `lol_about` VALUES ('5', '/public\\uploads\\thumb/20180921\\7d4ca5bc686a23b700c8cc0e942cdb42.png', '444', '<p>4444<br/></p>', '4', '4', '2018-09-21');
INSERT INTO `lol_about` VALUES ('6', '/public\\uploads\\thumb/20180921\\f9e188490e2d20f5f6a7fb28120c4c16.png', '55555', '<p>5555555<br/></p>', '5', '5', '2018-09-21');
INSERT INTO `lol_about` VALUES ('7', '/public\\uploads\\thumb/20180921\\1959de5415aba5aaf10f067576086317.png', '6666', '<p>66666<br/></p>', '6', '6', '2018-09-21');

-- ----------------------------
-- Table structure for lol_admin_user
-- ----------------------------
DROP TABLE IF EXISTS `lol_admin_user`;
CREATE TABLE `lol_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `主键索引` (`id`) USING BTREE,
  UNIQUE KEY `唯一索引` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of lol_admin_user
-- ----------------------------
INSERT INTO `lol_admin_user` VALUES ('3', 'admin', '65335d2dbc320a7c25be5a4f3979b21a', '1234567891', '超级管理员', '1');
INSERT INTO `lol_admin_user` VALUES ('5', '测试', '42298d861da56d6c1a9b775b9c458112', 'yr1g1rdSWh', '测试', '1');

-- ----------------------------
-- Table structure for lol_advantage
-- ----------------------------
DROP TABLE IF EXISTS `lol_advantage`;
CREATE TABLE `lol_advantage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `miss` text NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_advantage
-- ----------------------------
INSERT INTO `lol_advantage` VALUES ('2', '112', '222', '/public\\uploads\\thumb/20180921\\8f17abc81ef3749957b518c7054ad731.jpg', '1');
INSERT INTO `lol_advantage` VALUES ('3', '222', '131312', '/public\\uploads\\thumb/20180921\\649778a307ba1e626fc87281f197f526.jpg', '0');

-- ----------------------------
-- Table structure for lol_banner
-- ----------------------------
DROP TABLE IF EXISTS `lol_banner`;
CREATE TABLE `lol_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `linkurl` varchar(100) NOT NULL,
  `createtime` int(10) NOT NULL,
  `position` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_banner
-- ----------------------------
INSERT INTO `lol_banner` VALUES ('1', '11', '/public\\uploads\\thumb/20180920\\8e090454ae793224b9efff8311781d1d.png', '', '1537427222', '1', '1', null);
INSERT INTO `lol_banner` VALUES ('2', '1111', '/public\\uploads\\thumb/20180920\\1846b3e03af6ee7338ef638bdc8b95f4.png', '111111', '1537427602', '1', '1', null);
INSERT INTO `lol_banner` VALUES ('3', '啛啛喳喳', '/public\\uploads\\thumb/20180920\\6d3477fd44c67d7d4aa0461a686ebb9b.png', '', '1537432790', '2', '1', null);
INSERT INTO `lol_banner` VALUES ('4', '111', '/public\\uploads\\thumb/20180920\\2a980d1a564142b172c792671da9e34f.png', '1111', '1537433140', '3', '1', null);
INSERT INTO `lol_banner` VALUES ('5', '111', '/public\\uploads\\thumb/20180920\\177c78e5b372bd02eeba0880e0755963.png', '1111', '1537433328', '4', '1', null);
INSERT INTO `lol_banner` VALUES ('7', '测试2', '/public\\uploads\\thumb/20180920\\6732d31def6df92b1f9a08d2a8b42b21.png', '', '1537457335', '5', '1', null);
INSERT INTO `lol_banner` VALUES ('8', '啛啛喳喳', '/public\\uploads\\thumb/20180920\\b4b568a4d24dc10f46b8dd7c9631cf10.jpg', 'http://127.0.0.1/admin', '1537457386', '5', '1', null);
INSERT INTO `lol_banner` VALUES ('9', '11', '/public\\uploads\\thumb/20180920\\53e1b7c374a4634521b1be6a87dcd01a.jpg', '2222', '1537457702', '5', '1', '<p><br/></p><p>dasdasdasdasdasd</p>');

-- ----------------------------
-- Table structure for lol_honor
-- ----------------------------
DROP TABLE IF EXISTS `lol_honor`;
CREATE TABLE `lol_honor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(100) NOT NULL,
  `orderby` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_honor
-- ----------------------------
INSERT INTO `lol_honor` VALUES ('1', '/public\\uploads\\thumb/20180921\\a07785ed43369e93d7173b46fe581a58.png', '10', '0');
INSERT INTO `lol_honor` VALUES ('2', '/public\\uploads\\thumb/20180921\\ff0ea02d1932d49403a6b470a8997f4f.jpg', '11', '1');

-- ----------------------------
-- Table structure for lol_links
-- ----------------------------
DROP TABLE IF EXISTS `lol_links`;
CREATE TABLE `lol_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `linkurl` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_links
-- ----------------------------
INSERT INTO `lol_links` VALUES ('4', '测试1', 'http://127.0.0.1/admin', '1537372500');
INSERT INTO `lol_links` VALUES ('5', '测试2', 'http://127.0.0.1/admin', '1537372507');

-- ----------------------------
-- Table structure for lol_mazhu
-- ----------------------------
DROP TABLE IF EXISTS `lol_mazhu`;
CREATE TABLE `lol_mazhu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thumb` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `miss` text,
  `orderby` int(11) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_mazhu
-- ----------------------------
INSERT INTO `lol_mazhu` VALUES ('6', null, '发的发的说法', '对方水电费', '0', '2');
INSERT INTO `lol_mazhu` VALUES ('2', '/public\\uploads\\thumb/20180921\\8e0a3174f220fee75abfa75b23311c3d.png', '1111', '222', '2', '2');
INSERT INTO `lol_mazhu` VALUES ('3', '/public\\uploads\\thumb/20180921\\c0b9ec3507e94abede4be81665b6d17a.png', '232', '123123', '321', '3');
INSERT INTO `lol_mazhu` VALUES ('4', '/public\\uploads\\thumb/20180921\\7dece9ed3ce8b1e93e35caefb0357f24.png', '12321', '123123', '0', '4');
INSERT INTO `lol_mazhu` VALUES ('5', '/public\\uploads\\thumb/20180921\\3f5d8f3805d8a2e0ed2a00fc77e8ac39.png', '01', '啊大大', '0', '1');
INSERT INTO `lol_mazhu` VALUES ('7', '/public\\uploads\\thumb/20180921\\7f46a48d1c46af33d6a4f426cfa18602.png', '奥术大师大', '按时大大', '0', '3');
INSERT INTO `lol_mazhu` VALUES ('8', '/public\\uploads\\thumb/20180921\\15a2d810e0649aa4107c672559f201d9.png', '奥术大师大', '奥术大师大', '0', '4');
INSERT INTO `lol_mazhu` VALUES ('9', '/public\\uploads\\thumb/20180921\\40d5eae25b20f78e467e7bd26bb6949c.jpg', '奥术大师', '奥术大师大', '0', '4');
INSERT INTO `lol_mazhu` VALUES ('10', '/public\\uploads\\thumb/20180921\\ad367179e620d40a4783437b54a73845.jpg', '奥术大师大', '奥术大师大', '0', '4');
INSERT INTO `lol_mazhu` VALUES ('11', '/public\\uploads\\thumb/20180921\\f9e1a9ec84aad48967dd0c546bfe42c3.png', '阿斯达的', '奥术大师大', '0', '4');
INSERT INTO `lol_mazhu` VALUES ('12', '/public\\uploads\\thumb/20180921\\8b3a54994ac07e8951429a6a2cc0a3df.png', 'qq', '<p>asdasdasda<br/></p>', '1', '1');

-- ----------------------------
-- Table structure for lol_news
-- ----------------------------
DROP TABLE IF EXISTS `lol_news`;
CREATE TABLE `lol_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `miss` text,
  `keywords` text,
  `description` text,
  `orderby` int(11) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_news
-- ----------------------------
INSERT INTO `lol_news` VALUES ('2', '111', '<p><br/></p><p>1111<br/></p>', '1111', '1111', '111', '1389196800', '1', '1');
INSERT INTO `lol_news` VALUES ('3', '1', '<p>是是是<br/></p>', '搜索', '搜索', '11', '1537459200', '3', '1');
INSERT INTO `lol_news` VALUES ('4', '是是是', '<p>撒大声地<br/></p>', '是是是', '是是是', '0', '1537459200', '3', '1');

-- ----------------------------
-- Table structure for lol_news_type
-- ----------------------------
DROP TABLE IF EXISTS `lol_news_type`;
CREATE TABLE `lol_news_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `orderby` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_news_type
-- ----------------------------
INSERT INTO `lol_news_type` VALUES ('1', '出错1', '1');
INSERT INTO `lol_news_type` VALUES ('3', '三生三世', '2');

-- ----------------------------
-- Table structure for lol_set
-- ----------------------------
DROP TABLE IF EXISTS `lol_set`;
CREATE TABLE `lol_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lol_set
-- ----------------------------
INSERT INTO `lol_set` VALUES ('1', 'a:12:{s:5:\"title\";s:3:\"111\";s:8:\"keywords\";s:3:\"222\";s:11:\"description\";s:3:\"111\";s:9:\"addresscn\";s:3:\"222\";s:9:\"addressen\";s:3:\"111\";s:8:\"shoplink\";s:3:\"222\";s:6:\"mobile\";s:3:\"111\";s:3:\"icp\";s:3:\"222\";s:3:\"tel\";s:3:\"111\";s:7:\"toplogo\";s:69:\"/public\\uploads\\toplogo/20180920\\53252b9d4037b929101f464dfb57c3ef.jpg\";s:6:\"qrcode\";s:68:\"/public\\uploads\\qrcode/20180920\\ac5c7d4b04aad4e4663c219cb4313701.jpg\";s:10:\"bottomlogo\";s:72:\"/public\\uploads\\bottomlogo/20180920\\ae8793d2380a8e2b5c96b1839f46eea0.jpg\";}');
