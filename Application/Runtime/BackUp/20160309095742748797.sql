-- 
-- Type: -- 备份数据库

-- 
-- 备份数据库
-- Description:当前SQL文件包含了表：my_addons、my_admin、my_adminlog、my_article、my_auth、my_banner、my_banner_pos、my_category、my_custom、my_guest_book、my_hooks、my_job、my_language、my_menu、my_modular、my_nav、my_news、my_news_data、my_page、my_products、my_products_data、my_setting
-- Time: 2016-03-09 09:57:42
--
-- 数据库表：`my_addons` 的结构信息
DROP TABLE IF EXISTS `my_addons`;
CREATE TABLE `my_addons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `config` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_admin` 的结构信息
DROP TABLE IF EXISTS `my_admin`;
CREATE TABLE `my_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roleid` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `regtime` int(11) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `is_system` tinyint(1) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_adminlog` 的结构信息
DROP TABLE IF EXISTS `my_adminlog`;
CREATE TABLE `my_adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_article` 的结构信息
DROP TABLE IF EXISTS `my_article`;
CREATE TABLE `my_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `auth` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `imgdata` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `content` text,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_auth` 的结构信息
DROP TABLE IF EXISTS `my_auth`;
CREATE TABLE `my_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_banner` 的结构信息
DROP TABLE IF EXISTS `my_banner`;
CREATE TABLE `my_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_banner_pos` 的结构信息
DROP TABLE IF EXISTS `my_banner_pos`;
CREATE TABLE `my_banner_pos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_category` 的结构信息
DROP TABLE IF EXISTS `my_category`;
CREATE TABLE `my_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `imgdata` text,
  `sort` int(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_custom` 的结构信息
DROP TABLE IF EXISTS `my_custom`;
CREATE TABLE `my_custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_guest_book` 的结构信息
DROP TABLE IF EXISTS `my_guest_book`;
CREATE TABLE `my_guest_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `lang` varchar(20) NOT NULL DEFAULT 'zh-cn' COMMENT '语言',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `name` varchar(20) NOT NULL COMMENT '姓名',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '性别',
  `address` varchar(100) NOT NULL COMMENT '地址',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `mobile` varchar(20) NOT NULL COMMENT '手机',
  `fax` varchar(20) NOT NULL COMMENT '传真',
  `company` varchar(50) NOT NULL COMMENT '公司名称',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `home` varchar(50) NOT NULL COMMENT '主页',
  `content` text NOT NULL COMMENT '内容',
  `back` text NOT NULL COMMENT '回复',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '留言时间戳',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='留言表' ;

-- 数据库表：`my_hooks` 的结构信息
DROP TABLE IF EXISTS `my_hooks`;
CREATE TABLE `my_hooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `addons` varchar(255) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_job` 的结构信息
DROP TABLE IF EXISTS `my_job`;
CREATE TABLE `my_job` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nav_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `lang` varchar(10) NOT NULL DEFAULT 'zh-cn' COMMENT '语言',
  `title` varchar(50) NOT NULL,
  `count` smallint(4) unsigned NOT NULL DEFAULT '0',
  `place` varchar(20) NOT NULL DEFAULT '',
  `deal` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `lifedays` smallint(4) unsigned NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL DEFAULT '',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `edittime` int(10) unsigned NOT NULL DEFAULT '0',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `iswap` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `views` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `list` (`nav_id`,`lang`,`display`,`istop`,`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='招聘表' ;

-- 数据库表：`my_language` 的结构信息
DROP TABLE IF EXISTS `my_language`;
CREATE TABLE `my_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_menu` 的结构信息
DROP TABLE IF EXISTS `my_menu`;
CREATE TABLE `my_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_left` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  `edittime` int(11) DEFAULT NULL,
  `css` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_modular` 的结构信息
DROP TABLE IF EXISTS `my_modular`;
CREATE TABLE `my_modular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `modular` int(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `is_system` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_nav` 的结构信息
DROP TABLE IF EXISTS `my_nav`;
CREATE TABLE `my_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `modular_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `langset` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_news` 的结构信息
DROP TABLE IF EXISTS `my_news`;
CREATE TABLE `my_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `top` tinyint(1) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `imgdata` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_news_data` 的结构信息
DROP TABLE IF EXISTS `my_news_data`;
CREATE TABLE `my_news_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `custom` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_page` 的结构信息
DROP TABLE IF EXISTS `my_page`;
CREATE TABLE `my_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) DEFAULT NULL,
  `nav_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `custom` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_products` 的结构信息
DROP TABLE IF EXISTS `my_products`;
CREATE TABLE `my_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `imgdata` varchar(255) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `top` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_products_data` 的结构信息
DROP TABLE IF EXISTS `my_products_data`;
CREATE TABLE `my_products_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `custom` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_setting` 的结构信息
DROP TABLE IF EXISTS `my_setting`;
CREATE TABLE `my_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `groups` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标识',
  `value` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ;

-- 数据库表：my_addons 数据信息
INSERT INTO `my_addons` VALUES ('5','GuestBook','留言管理','网友反馈的信息,留言板管理','1','null','','0.1','','1');
INSERT INTO `my_addons` VALUES ('6','Job','人才招聘管理','人才招聘管理','1','null','','1.0','','');

-- 数据库表：my_admin 数据信息
INSERT INTO `my_admin` VALUES ('1','admin','7fef6171469e80d32c0559f88b377245','1','1','0','1457488547','1457488122','97','1','0');
INSERT INTO `my_admin` VALUES ('2','editor','e10adc3949ba59abbe56e057f20f883e','3','1','1447039282','1457488449','1447059643','6','0','0');
INSERT INTO `my_admin` VALUES ('3','bianji','670b14728ad9902aecba32e22fa4f6bd','4','1','1447039335','0','0','0','0','0');
INSERT INTO `my_admin` VALUES ('4','ceshi1','9464c3798239e316379036767f0ff7d1','4','1','1457487386','1457488282','1457487530','3','','');

-- 数据库表：my_adminlog 数据信息
INSERT INTO `my_adminlog` VALUES ('1','admin','0.0.0.0','1445312160','登录成功!');
INSERT INTO `my_adminlog` VALUES ('2','admin','0.0.0.0','1445312206','登录成功!');
INSERT INTO `my_adminlog` VALUES ('3','admin','0.0.0.0','1445312233','登录成功!');
INSERT INTO `my_adminlog` VALUES ('4','admin','0.0.0.0','1445312286','登录成功!');
INSERT INTO `my_adminlog` VALUES ('5','admin','0.0.0.0','1445312340','登录成功!');
INSERT INTO `my_adminlog` VALUES ('6','admin','0.0.0.0','1445312473','登录成功!');
INSERT INTO `my_adminlog` VALUES ('7','admin','0.0.0.0','1445912389','登录成功!');
INSERT INTO `my_adminlog` VALUES ('8','admin','0.0.0.0','1446430198','登录成功!');
INSERT INTO `my_adminlog` VALUES ('9','admin','0.0.0.0','1446430214','登录成功!');
INSERT INTO `my_adminlog` VALUES ('10','admin','0.0.0.0','1446430286','登录成功!');
INSERT INTO `my_adminlog` VALUES ('11','admin','0.0.0.0','1446430864','登录成功!');
INSERT INTO `my_adminlog` VALUES ('12','admin','0.0.0.0','1446431209','登录成功!');
INSERT INTO `my_adminlog` VALUES ('13','admin','0.0.0.0','1446443242','登录成功!');
INSERT INTO `my_adminlog` VALUES ('14','admin','0.0.0.0','1446443337','登录成功!');
INSERT INTO `my_adminlog` VALUES ('15','admin','0.0.0.0','1446443723','登录成功!');
INSERT INTO `my_adminlog` VALUES ('16','admin','0.0.0.0','1446443780','登录成功!');
INSERT INTO `my_adminlog` VALUES ('17','admin','0.0.0.0','1446443863','登录成功!');
INSERT INTO `my_adminlog` VALUES ('18','admin','0.0.0.0','1446444104','登录成功!');
INSERT INTO `my_adminlog` VALUES ('19','admin','0.0.0.0','1446444157','登录成功!');
INSERT INTO `my_adminlog` VALUES ('20','admin','0.0.0.0','1446444403','登录成功!');
INSERT INTO `my_adminlog` VALUES ('21','admin','0.0.0.0','1446444751','登录成功!');
INSERT INTO `my_adminlog` VALUES ('22','admin','0.0.0.0','1446444757','登录成功!');
INSERT INTO `my_adminlog` VALUES ('23','admin','0.0.0.0','1446444769','登录成功!');
INSERT INTO `my_adminlog` VALUES ('24','admin','0.0.0.0','1446445065','登录成功!');
INSERT INTO `my_adminlog` VALUES ('25','admin','0.0.0.0','1446445173','登录成功!');
INSERT INTO `my_adminlog` VALUES ('26','admin','0.0.0.0','1446445206','登录成功!');
INSERT INTO `my_adminlog` VALUES ('27','admin','0.0.0.0','1446445246','登录成功!');
INSERT INTO `my_adminlog` VALUES ('28','admin','0.0.0.0','1446445668','登录成功!');
INSERT INTO `my_adminlog` VALUES ('29','admin','0.0.0.0','1446446023','登录成功!');
INSERT INTO `my_adminlog` VALUES ('30','admin','0.0.0.0','1446446058','登录成功!');
INSERT INTO `my_adminlog` VALUES ('31','admin','0.0.0.0','1446713052','登录成功!');
INSERT INTO `my_adminlog` VALUES ('32','admin','0.0.0.0','1446771355','登录成功!');
INSERT INTO `my_adminlog` VALUES ('33','admin','0.0.0.0','1446795722','登录成功!');
INSERT INTO `my_adminlog` VALUES ('34','admin','0.0.0.0','1446856525','登录成功!');
INSERT INTO `my_adminlog` VALUES ('35','admin','0.0.0.0','1446859687','登录成功!');
INSERT INTO `my_adminlog` VALUES ('36','admin','0.0.0.0','1447029244','登录成功!');
INSERT INTO `my_adminlog` VALUES ('37','admin','0.0.0.0','1447055147','登录成功!');
INSERT INTO `my_adminlog` VALUES ('38','editor','0.0.0.0','1447055171','登录成功!');
INSERT INTO `my_adminlog` VALUES ('39','editor','0.0.0.0','1447055213','登录成功!');
INSERT INTO `my_adminlog` VALUES ('40','editor','0.0.0.0','1447059102','登录成功!');
INSERT INTO `my_adminlog` VALUES ('41','editor','0.0.0.0','1447059523','登录成功!');
INSERT INTO `my_adminlog` VALUES ('42','editor','0.0.0.0','1447059643','登录成功!');
INSERT INTO `my_adminlog` VALUES ('43','admin','0.0.0.0','1447115201','登录成功!');
INSERT INTO `my_adminlog` VALUES ('44','admin','0.0.0.0','1447205547','登录成功!');
INSERT INTO `my_adminlog` VALUES ('45','admin','0.0.0.0','1447287993','登录成功!');
INSERT INTO `my_adminlog` VALUES ('46','admin','0.0.0.0','1447383375','登录成功!');
INSERT INTO `my_adminlog` VALUES ('47','admin','0.0.0.0','1447633577','登录成功!');
INSERT INTO `my_adminlog` VALUES ('48','admin','0.0.0.0','1447726615','登录成功!');
INSERT INTO `my_adminlog` VALUES ('49','admin','0.0.0.0','1447807913','登录成功!');
INSERT INTO `my_adminlog` VALUES ('50','admin','0.0.0.0','1447892999','登录成功!');
INSERT INTO `my_adminlog` VALUES ('51','admin','0.0.0.0','1448087601','登录成功!');
INSERT INTO `my_adminlog` VALUES ('52','admin','0.0.0.0','1448238367','登录成功!');
INSERT INTO `my_adminlog` VALUES ('53','admin','0.0.0.0','1448413463','登录成功!');
INSERT INTO `my_adminlog` VALUES ('54','admin','0.0.0.0','1448498063','登录成功!');
INSERT INTO `my_adminlog` VALUES ('55','admin','0.0.0.0','1449025408','登录成功!');
INSERT INTO `my_adminlog` VALUES ('56','admin','0.0.0.0','1449104640','登录成功!');
INSERT INTO `my_adminlog` VALUES ('57','admin','0.0.0.0','1449191052','登录成功!');
INSERT INTO `my_adminlog` VALUES ('58','admin','0.0.0.0','1449292266','登录成功!');
INSERT INTO `my_adminlog` VALUES ('59','admin','0.0.0.0','1449448800','登录成功!');
INSERT INTO `my_adminlog` VALUES ('60','admin','0.0.0.0','1449624391','登录成功!');
INSERT INTO `my_adminlog` VALUES ('61','admin','0.0.0.0','1449624790','登录成功!');
INSERT INTO `my_adminlog` VALUES ('62','admin','0.0.0.0','1449707514','登录成功!');
INSERT INTO `my_adminlog` VALUES ('63','admin','0.0.0.0','1450052385','登录成功!');
INSERT INTO `my_adminlog` VALUES ('64','admin','0.0.0.0','1450138808','登录成功!');
INSERT INTO `my_adminlog` VALUES ('65','admin','0.0.0.0','1450512155','登录成功!');
INSERT INTO `my_adminlog` VALUES ('66','admin','0.0.0.0','1450657992','登录成功!');
INSERT INTO `my_adminlog` VALUES ('67','admin','0.0.0.0','1450829762','登录成功!');
INSERT INTO `my_adminlog` VALUES ('68','admin','0.0.0.0','1450917908','登录成功!');
INSERT INTO `my_adminlog` VALUES ('69','admin','0.0.0.0','1451265310','登录成功!');
INSERT INTO `my_adminlog` VALUES ('70','admin','0.0.0.0','1451370215','登录成功!');
INSERT INTO `my_adminlog` VALUES ('71','admin','0.0.0.0','1451436032','登录成功!');
INSERT INTO `my_adminlog` VALUES ('72','admin','0.0.0.0','1451522005','登录成功!');
INSERT INTO `my_adminlog` VALUES ('73','admin','0.0.0.0','1451867208','登录成功!');
INSERT INTO `my_adminlog` VALUES ('74','admin','0.0.0.0','1451955135','登录成功!');
INSERT INTO `my_adminlog` VALUES ('75','admin','0.0.0.0','1451955791','登录成功!');
INSERT INTO `my_adminlog` VALUES ('76','admin','0.0.0.0','1451955835','登录成功!');
INSERT INTO `my_adminlog` VALUES ('77','admin','0.0.0.0','1452494268','登录成功!');
INSERT INTO `my_adminlog` VALUES ('78','admin','0.0.0.0','1452581396','登录成功!');
INSERT INTO `my_adminlog` VALUES ('79','admin','0.0.0.0','1452645410','登录成功!');
INSERT INTO `my_adminlog` VALUES ('80','admin','0.0.0.0','1452733384','登录成功!');
INSERT INTO `my_adminlog` VALUES ('81','admin','0.0.0.0','1452826213','登录成功!');
INSERT INTO `my_adminlog` VALUES ('82','admin','0.0.0.0','1452905516','登录成功!');
INSERT INTO `my_adminlog` VALUES ('83','admin','0.0.0.0','1453077068','登录成功!');
INSERT INTO `my_adminlog` VALUES ('84','admin','0.0.0.0','1453164066','登录成功!');
INSERT INTO `my_adminlog` VALUES ('85','admin','0.0.0.0','1453251912','登录成功!');
INSERT INTO `my_adminlog` VALUES ('86','admin','0.0.0.0','1453337002','登录成功!');
INSERT INTO `my_adminlog` VALUES ('87','admin','0.0.0.0','1453429609','登录成功!');
INSERT INTO `my_adminlog` VALUES ('88','admin','0.0.0.0','1453681080','登录成功!');
INSERT INTO `my_adminlog` VALUES ('89','admin','0.0.0.0','1456102216','登录成功!');
INSERT INTO `my_adminlog` VALUES ('90','admin','0.0.0.0','1456186971','登录成功!');
INSERT INTO `my_adminlog` VALUES ('91','admin','0.0.0.0','1456274209','登录成功!');
INSERT INTO `my_adminlog` VALUES ('92','admin','0.0.0.0','1456360251','登录成功!');
INSERT INTO `my_adminlog` VALUES ('93','admin','0.0.0.0','1456448544','登录成功!');
INSERT INTO `my_adminlog` VALUES ('94','admin','0.0.0.0','1456705733','登录成功!');
INSERT INTO `my_adminlog` VALUES ('95','admin','0.0.0.0','1457050636','登录成功!');
INSERT INTO `my_adminlog` VALUES ('96','admin','0.0.0.0','1457138117','登录成功!');
INSERT INTO `my_adminlog` VALUES ('97','admin','0.0.0.0','1457332279','登录成功!');
INSERT INTO `my_adminlog` VALUES ('98','admin','0.0.0.0','1457397453','登录成功!');
INSERT INTO `my_adminlog` VALUES ('99','admin','0.0.0.0','1457486598','登录成功!');
INSERT INTO `my_adminlog` VALUES ('100','admin','0.0.0.0','1457487354','登录成功!');
INSERT INTO `my_adminlog` VALUES ('101','ceshi1','0.0.0.0','1457487429','登录成功!');
INSERT INTO `my_adminlog` VALUES ('102','ceshi1','0.0.0.0','1457487530','登录成功!');
INSERT INTO `my_adminlog` VALUES ('103','admin','0.0.0.0','1457488122','登录成功!');
INSERT INTO `my_adminlog` VALUES ('104','ceshi1','0.0.0.0','1457488282','登录成功!');
INSERT INTO `my_adminlog` VALUES ('105','editor','0.0.0.0','1457488449','登录成功!');
INSERT INTO `my_adminlog` VALUES ('106','admin','0.0.0.0','1457488547','登录成功!');

-- 数据库表：my_article 数据信息
INSERT INTO `my_article` VALUES ('1','333','8','0','0','0','','0','0','admin','0','0','./upload/article/2015-10-27/1445926749990436.jpg','./upload/article/2015-10-27/1445926749990436.jpg','0','&lt;p&gt;&amp;lt;p&amp;gt;4566666645361531534154几乎与i就可i健康不&amp;lt;/p&amp;gt;&lt;/p&gt;','1445259620','1446105093');
INSERT INTO `my_article` VALUES ('3','','0','','0','','','','0','','','','','','1','','1445908236','0');
INSERT INTO `my_article` VALUES ('5','','0','','','','','0','0','admin','','','','','1','','1445915684','0');
INSERT INTO `my_article` VALUES ('6','','0','','','','','0','0','admin','','','','','1','','1445915852','0');
INSERT INTO `my_article` VALUES ('7','','0','','','','','0','0','admin','','','','','1','','1445916104','0');
INSERT INTO `my_article` VALUES ('11','111','2','','','','','0','0','admin','','0','./upload/article/2015-10-27/1445932076500980.jpg','./upload/article/2015-10-27/1445932076500980.jpg','1','','1445931805','1445932490');
INSERT INTO `my_article` VALUES ('12','111','8','','','','','0','0','admin','','0','./upload/article/2015-10-27/1445931933956270.jpg','./upload/article/2015-10-27/1445931933956270.jpg','0','','1445931805','1445932598');
INSERT INTO `my_article` VALUES ('15','111','8','','1','','','0','0','admin','','0','./upload/article/2015-10-27/1445933571273183.jpg','./upload/article/2015-10-27/1445933571273183.jpg','1','','1445933553','1446101967');
INSERT INTO `my_article` VALUES ('16','11023','8','','','','','0','0','','','0','./upload/article/2015-11-02/1446429368507938.jpg','./upload/article/2015-11-02/1446429368507938.jpg','1','sabxasjknxajskl第三轮量化卡死刻录机看马大帅快来加盟 1@#￥%……&amp;amp;*IO&lt;img src=&quot;upload/image/20151102/20151102023216_32126.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;upload/image/20151102/20151102023319_36941.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;upload/image/20151102/20151102023319_42843.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;upload/image/20151102/20151102023320_15424.jpg&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;upload/image/20151102/20151102023320_51583.jpg&quot; alt=&quot;&quot; /&gt;','1446425922','1446534560');

-- 数据库表：my_auth 数据信息
INSERT INTO `my_auth` VALUES ('1','超级管理员','超管说了算','1','0','1457398069');
INSERT INTO `my_auth` VALUES ('3','高级管理员','权限高','1','1,23,25,6,13,14,26,15,16,17,29,30','1457488214');
INSERT INTO `my_auth` VALUES ('4','管理员','基础权限','1','1,23,25,6,13,29,30','1457488181');

-- 数据库表：my_banner 数据信息
INSERT INTO `my_banner` VALUES ('1','1','banner1','http://www.baidu.com','./upload/banner/2016-03-05/1457154896936767.jpg','1','0','1457154898');
INSERT INTO `my_banner` VALUES ('2','2','111','','./upload/banner/2016-01-20/1453273145352716.jpg','1','0','1453273154');
INSERT INTO `my_banner` VALUES ('3','1','222','','./upload/banner/2016-01-20/1453273208383967.png','1','0','1453273212');

-- 数据库表：my_banner_pos 数据信息
INSERT INTO `my_banner_pos` VALUES ('1','首页banner图','0','1','1451272985','首页banner图');
INSERT INTO `my_banner_pos` VALUES ('2','内页banner图','0','1','1453273133','');

-- 数据库表：my_category 数据信息
INSERT INTO `my_category` VALUES ('1','0','一级分类','./upload/category/2015-10-24/1445667099723603.jpg','','2','','1','1445480216','1445667100');
INSERT INTO `my_category` VALUES ('2','1','二级分类','','','0','','1','1445480275','0');
INSERT INTO `my_category` VALUES ('4','0','一级分类2','','','2','','1','1445480291','0');
INSERT INTO `my_category` VALUES ('5','0','一级分类3','','','3','','1','1445480297','0');
INSERT INTO `my_category` VALUES ('7','5','二级分类3','','','0','二级分类3','1','1445646944','1445668415');
INSERT INTO `my_category` VALUES ('8','5','二级分类3-1','./upload/category/2015-10-24/1445668426692846.jpg,./upload/category/2015-10-24/1445668429175396.jpg,','','0','二级分类3-1','1','1445647003','1445668429');
INSERT INTO `my_category` VALUES ('9','6','三级分类2','./upload/category/2015-10-24/1445667134656758.jpg','','0','','1','1445667135','0');
INSERT INTO `my_category` VALUES ('10','0','一级分类4','./upload/category/2015-10-24/1445668038968200.jpg,./upload/category/2015-10-24/1445668041856317.jpg,','','2','','1','1445668054','1445668167');

-- 数据库表：my_custom 数据信息
INSERT INTO `my_custom` VALUES ('1','page','单页','a:6:{i:1;a:5:{s:4:\"name\";s:5:\"page2\";s:11:\"instruction\";s:12:\"普通文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"1\";s:6:\"option\";s:0:\"\";}i:2;a:5:{s:4:\"name\";s:5:\"page3\";s:11:\"instruction\";s:12:\"多行文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"2\";s:6:\"option\";s:0:\"\";}i:3;a:5:{s:4:\"name\";s:5:\"page4\";s:11:\"instruction\";s:9:\"富文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"3\";s:6:\"option\";s:0:\"\";}i:4;a:5:{s:4:\"name\";s:5:\"page5\";s:11:\"instruction\";s:9:\"单选框\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"4\";s:6:\"option\";s:17:\"0:关闭,1:开启\";}i:5;a:5:{s:4:\"name\";s:5:\"page6\";s:11:\"instruction\";s:9:\"多选框\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"5\";s:6:\"option\";s:26:\"0:苹果,1:香蕉,2:西瓜\";}i:6;a:5:{s:4:\"name\";s:5:\"page7\";s:11:\"instruction\";s:6:\"上传\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"6\";s:6:\"option\";s:0:\"\";}}','1450938342');
INSERT INTO `my_custom` VALUES ('2','news','新闻','a:6:{i:1;a:5:{s:4:\"name\";s:5:\"news2\";s:11:\"instruction\";s:12:\"普通文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"1\";s:6:\"option\";s:0:\"\";}i:2;a:5:{s:4:\"name\";s:5:\"news3\";s:11:\"instruction\";s:12:\"多行文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"2\";s:6:\"option\";s:0:\"\";}i:3;a:5:{s:4:\"name\";s:4:\"new4\";s:11:\"instruction\";s:9:\"富文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"3\";s:6:\"option\";s:0:\"\";}i:4;a:5:{s:4:\"name\";s:4:\"new5\";s:11:\"instruction\";s:9:\"单选框\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"4\";s:6:\"option\";s:17:\"0:关闭,1:开启\";}i:5;a:5:{s:4:\"name\";s:4:\"new6\";s:11:\"instruction\";s:9:\"多选框\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"5\";s:6:\"option\";s:26:\"0:苹果,1:香蕉,2:西瓜\";}i:0;a:5:{s:4:\"name\";s:5:\"news7\";s:11:\"instruction\";s:6:\"上传\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"6\";s:6:\"option\";s:0:\"\";}}','1451457136');
INSERT INTO `my_custom` VALUES ('3','products','产品','a:2:{i:1;a:5:{s:4:\"name\";s:4:\"pro2\";s:11:\"instruction\";s:12:\"普通文本\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"1\";s:6:\"option\";s:0:\"\";}i:0;a:5:{s:4:\"name\";s:4:\"pro7\";s:11:\"instruction\";s:6:\"上传\";s:5:\"order\";s:3:\"255\";s:4:\"type\";s:1:\"6\";s:6:\"option\";s:0:\"\";}}','1451457347');

-- 数据库表：my_guest_book 数据信息
INSERT INTO `my_guest_book` VALUES ('1','LANG_SET','111','1111','1','111','','','','','','','111','','1449474462','0');

-- 数据库表：my_hooks 数据信息
INSERT INTO `my_hooks` VALUES ('4','HomeBookList','留言管理钩子','1','GuestBook','1449469570');
INSERT INTO `my_hooks` VALUES ('5','HomeJobList','人才招聘管理钩子','1','Job','1449474210');

-- 数据库表：my_job 数据信息
INSERT INTO `my_job` VALUES ('1','19','zh-cn','销售','0','地点','待遇','具体要求','0','','1451875760','1451890569','1','1','0','0','0');

-- 数据库表：my_language 数据信息
INSERT INTO `my_language` VALUES ('1','中文','zh-cn','1','1','0','');
INSERT INTO `my_language` VALUES ('2','英文','en-us','0','1','1','');

-- 数据库表：my_menu 数据信息
INSERT INTO `my_menu` VALUES ('1','0','文章管理','','','1','1','0','1446793048','&#xe616;');
INSERT INTO `my_menu` VALUES ('6','0','系统管理','','','1','1','0','1446858037','&amp;#xe62e;');
INSERT INTO `my_menu` VALUES ('7','6','菜单管理','Menu/index','','1','1','0','1446858109','');
INSERT INTO `my_menu` VALUES ('8','6','菜单添加','Menu/add','','0','1','0','1446858239','');
INSERT INTO `my_menu` VALUES ('9','6','菜单删除','Menu/delete','','0','1','0','1446858421','');
INSERT INTO `my_menu` VALUES ('10','6','菜单修改','Menu/edit','','0','1','0','1446858316','');
INSERT INTO `my_menu` VALUES ('11','6','站点配置','System/setting','','1','1','0','1446858408','');
INSERT INTO `my_menu` VALUES ('12','6','站点配置修改','System/settingEdit','','0','1','0','1446858505','');
INSERT INTO `my_menu` VALUES ('13','6','站点设置','System/baseSetting','','1','1','0','1446858713','');
INSERT INTO `my_menu` VALUES ('14','6','系统日志','System/adminLog','','1','1','0','1446858737','');
INSERT INTO `my_menu` VALUES ('15','0','管理员管理','','','1','1','0','1446858898','&amp;#xe62d;');
INSERT INTO `my_menu` VALUES ('16','15','管理员列表','Admin/index','','1','1','0','1446858886','');
INSERT INTO `my_menu` VALUES ('17','15','角色管理','Auth/index','','1','1','0','1446858999','');
INSERT INTO `my_menu` VALUES ('23','1','栏目列表','Nav/index','','1','1','0','1447117538','');
INSERT INTO `my_menu` VALUES ('24','6','模块管理','Modular/index','','1','1','0','1447133795','');
INSERT INTO `my_menu` VALUES ('25','1','内容管理','Nav/content','','1','1','0','1447138449','');
INSERT INTO `my_menu` VALUES ('26','6','数据库管理','Database/index','','1','1','0','1447737851','');
INSERT INTO `my_menu` VALUES ('27','6','插件管理','Addons/index','','1','1','0','1448239602','');
INSERT INTO `my_menu` VALUES ('28','6','自定义管理','Custom/index','','1','1','0','1450835350','');
INSERT INTO `my_menu` VALUES ('29','0','幻灯片管理','','','1','1','0','1451266227','&amp;#xe613;');
INSERT INTO `my_menu` VALUES ('30','29','幻灯片列表','banner/index','','1','1','0','1451266292','');
INSERT INTO `my_menu` VALUES ('31','6','语言管理','Language/index','','1','1','0','1456192023','');

-- 数据库表：my_modular 数据信息
INSERT INTO `my_modular` VALUES ('1','单页模块','page','Page','1','1','1447134649','1');
INSERT INTO `my_modular` VALUES ('2','产品模块','products','Products','3','1','1447135167','1');
INSERT INTO `my_modular` VALUES ('3','新闻模块','news','News','3','1','1447135188','1');
INSERT INTO `my_modular` VALUES ('4','留言模块','GuestBook','GuestBook/GuestBook/index','3','1','1451523013','0');
INSERT INTO `my_modular` VALUES ('5','招聘模块','job','Job/Job/index','3','1','1451548105','0');

-- 数据库表：my_nav 数据信息
INSERT INTO `my_nav` VALUES ('1','0','关于我们','0','page','1','1447119076','1','page/about','');
INSERT INTO `my_nav` VALUES ('2','1','公司简介1','0','','1','1447119661','1','page/about','a:2:{s:5:\"zh-cn\";a:3:{s:4:\"name\";s:13:\"公司简介1\";s:8:\"keywords\";s:22:\"公司简介 关键词\";s:11:\"description\";s:19:\"公司简介 描述\";}s:5:\"en-us\";a:3:{s:4:\"name\";s:8:\"about us\";s:8:\"keywords\";s:17:\"about us keywords\";s:11:\"description\";s:20:\"about us description\";}}');
INSERT INTO `my_nav` VALUES ('3','1','企业文化','0','','1','1447133143','1','page/culture','');
INSERT INTO `my_nav` VALUES ('4','0','联系我们','0','','1','1447133156','1','','');
INSERT INTO `my_nav` VALUES ('5','4','联系方式','0','','1','1447133174','1','','');
INSERT INTO `my_nav` VALUES ('6','4','在线地图','0','','1','1447133189','1','','');
INSERT INTO `my_nav` VALUES ('7','0','产品中心','0','products','1','1447205584','2','products/index','');
INSERT INTO `my_nav` VALUES ('8','7','产品分类1','0','','1','1447205601','2','products/pro1','');
INSERT INTO `my_nav` VALUES ('9','7','产品分类2','0','','1','1447206002','2','products/pro2','');
INSERT INTO `my_nav` VALUES ('10','0','新闻中心','0','news','1','1447206026','3','news/index','');
INSERT INTO `my_nav` VALUES ('11','10','公司新闻','0','','1','1456711399','3','news/company','a:2:{s:5:\"zh-cn\";a:3:{s:4:\"name\";s:12:\"公司新闻\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";}s:5:\"en-us\";a:3:{s:4:\"name\";s:12:\"company news\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";}}');
INSERT INTO `my_nav` VALUES ('12','10','行业资讯','0','','1','1456711425','3','news/industry','a:2:{s:5:\"zh-cn\";a:3:{s:4:\"name\";s:12:\"行业资讯\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";}s:5:\"en-us\";a:3:{s:4:\"name\";s:13:\"industry news\";s:8:\"keywords\";s:0:\"\";s:11:\"description\";s:0:\"\";}}');
INSERT INTO `my_nav` VALUES ('13','8','产品二级分类1','0','','1','1447206571','2','products/pro1son1','');
INSERT INTO `my_nav` VALUES ('14','8','产品二级分类2','0','','1','1447206583','2','products/pro1son2','');
INSERT INTO `my_nav` VALUES ('15','0','在线留言','0','0','1','1451524246','4','','');
INSERT INTO `my_nav` VALUES ('16','15','在线留言','0','0','1','1451524274','4','','');
INSERT INTO `my_nav` VALUES ('17','0','诚聘英才','0','0','1','1451548149','1','','');
INSERT INTO `my_nav` VALUES ('18','17','人才理念','0','0','1','1451548164','1','','');
INSERT INTO `my_nav` VALUES ('19','17','人才招聘','0','0','1','1451548179','5','','');

-- 数据库表：my_news 数据信息
INSERT INTO `my_news` VALUES ('1','11','1','0','1456711057','1','0','./upload/article/2016-02-29/1456710550539956.jpg','./upload/article/2016-02-29/1456710550539956.jpg','13');
INSERT INTO `my_news` VALUES ('2','11','0','0','1452664820','1','0','','','9');
INSERT INTO `my_news` VALUES ('3','11','0','0','1452664829','1','0','','','3');
INSERT INTO `my_news` VALUES ('4','11','0','0','1452664837','1','0','','','4');
INSERT INTO `my_news` VALUES ('5','11','0','0','1452664849','1','0','','','3');
INSERT INTO `my_news` VALUES ('6','11','0','0','1457051594','1','0','./upload/article/2016-02-29/1456732201465817.jpg','./upload/article/2016-02-29/1456732201465817.jpg','');

-- 数据库表：my_news_data 数据信息
INSERT INTO `my_news_data` VALUES ('1','6','zh-cn','新闻','','','','a:4:{s:5:\"page2\";s:0:\"\";s:5:\"page3\";s:0:\"\";s:5:\"page4\";s:0:\"\";s:5:\"page7\";s:47:\"./upload/custom/2016-03-04/1457050700266708.jpg\";}','1457051594');
INSERT INTO `my_news_data` VALUES ('2','6','en-us','news','','','','a:4:{s:5:\"page2\";s:0:\"\";s:5:\"page3\";s:0:\"\";s:5:\"page4\";s:0:\"\";s:5:\"page7\";s:47:\"./upload/custom/2016-03-04/1457050705673887.jpg\";}','1457051594');

-- 数据库表：my_page 数据信息
INSERT INTO `my_page` VALUES ('18','zh-cn','2','公司简介222','&lt;p&gt;内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容
					内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容内容&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;upload/image/20151116/20151116021046_20464.jpg&quot; alt=&quot;&quot; /&gt;&lt;/p&gt;','公司简介','公司简介','1456453218','a:6:{s:5:\"page2\";s:16:\"jksdjkjsd dssdsd\";s:5:\"page3\";s:20:\"1111111111
11111111\";s:5:\"page4\";s:9:\"111111111\";s:5:\"page5\";s:1:\"0\";s:5:\"page6\";a:2:{i:0;s:1:\"0\";i:1;s:1:\"1\";}s:5:\"page7\";s:47:\"./upload/custom/2016-02-26/1456453198951888.jpg\";}');
INSERT INTO `my_page` VALUES ('19','en-us','2','about us','about usabout us','about us','about us','1456453218','a:6:{s:5:\"page2\";s:7:\"2222222\";s:5:\"page3\";s:10:\"2222
2222\";s:5:\"page4\";s:5:\"22222\";s:5:\"page5\";s:1:\"0\";s:5:\"page6\";a:2:{i:1;s:1:\"1\";i:2;s:1:\"2\";}s:5:\"page7\";s:47:\"./upload/custom/2016-02-26/1456453203883526.jpg\";}');

-- 数据库表：my_products 数据信息
INSERT INTO `my_products` VALUES ('1','13','','./upload/article/2016-03-04/1457069781348961.jpg','./upload/article/2016-03-04/1457069781348961.jpg','0','0','1','1457070509','0','');

-- 数据库表：my_products_data 数据信息
INSERT INTO `my_products_data` VALUES ('1','1','zh-cn','产品','产品','产品','产品','a:6:{s:5:\"page2\";s:1:\"1\";s:5:\"page3\";s:1:\"1\";s:5:\"page4\";s:1:\"1\";s:5:\"page5\";s:1:\"1\";s:5:\"page6\";a:1:{i:1;s:1:\"1\";}s:5:\"page7\";s:47:\"./upload/custom/2016-03-04/1457070500719156.jpg\";}','1457070509');
INSERT INTO `my_products_data` VALUES ('2','1','en-us','pro','pro','pro','pro','a:6:{s:5:\"page2\";s:1:\"2\";s:5:\"page3\";s:1:\"2\";s:5:\"page4\";s:1:\"2\";s:5:\"page5\";s:1:\"0\";s:5:\"page6\";a:2:{i:0;s:1:\"0\";i:1;s:1:\"1\";}s:5:\"page7\";s:47:\"./upload/custom/2016-03-04/1457070508372673.jpg\";}','1457070509');

-- 数据库表：my_setting 数据信息
INSERT INTO `my_setting` VALUES ('1','WEB_SITE_KEYWORDS','5','1446531498','1446711823','0','1','1','网站关键字','网站关键字','','');
INSERT INTO `my_setting` VALUES ('2','WEB_SITE_TEL','2','1446531502','1446689180','0','1','2','网站电话','88888888','','');
INSERT INTO `my_setting` VALUES ('3','WEB_SITE_NAME','1','1446531597','1446534757','1','1','1','网站名称','222333','111','');
INSERT INTO `my_setting` VALUES ('4','WEB_SITE_EWM','4','1446706171','0','0','1','2','网站二维码','./upload/system/2015-12-10/1449733286448182.jpg','','');
INSERT INTO `my_setting` VALUES ('5','WEB_SITE_OPEN','3','1446708280','0','0','1','4','网站是否开启','1','1:开启,0:关闭','');
INSERT INTO `my_setting` VALUES ('6','WEB_SITE_ICP','1','1446708715','0','0','1','3','网站版权','','','');
INSERT INTO `my_setting` VALUES ('7','WATER_SWITCH','6','1449713600','','0','1','5','水印开关','1','1:开启,0:关闭','');
INSERT INTO `my_setting` VALUES ('8','WATER_TEXT','1','1449724487','','0','0','5','水印文字','111111','','222');
INSERT INTO `my_setting` VALUES ('9','WATER_IMG','4','1449724528','1449727927','0','1','5','水印图片','./upload/system/2015-12-14/1450061839169561.JPG','','水印图片');
INSERT INTO `my_setting` VALUES ('10','WATER_SIZE','2','1449734917','','0','1','5','水印文字大小','20','','');
INSERT INTO `my_setting` VALUES ('11','WATER_COLOR','1','1449734948','','0','1','5','水印文字颜色','#000000','','');
INSERT INTO `my_setting` VALUES ('12','WATER_PCT','2','1449735002','','0','1','5','水印透明度','70','','');
INSERT INTO `my_setting` VALUES ('13','WATER_POS','6','1449735189','1449735562','0','1','5','水印位置','5','1:左上,2:中上,3:右上,4:中左,5:正中,6:中右,7:左下,8:中下,9:右下','水印位置，默认正中');
INSERT INTO `my_setting` VALUES ('14','EMAIL_USERNAME','1','1450145954','1450148735','0','1','6','邮箱用户名','1812168237@qq.com','','使用126或qq邮箱');
INSERT INTO `my_setting` VALUES ('15','EMAIL_PASSWORD','1','1450146613','1450158235','0','1','6','邮箱密码','e123456789','','邮箱的密码');
INSERT INTO `my_setting` VALUES ('16','EMAIL_SMTP_HOST','1','1450146651','1450148711','0','1','6','smtp地址','smtp.qq.com','','如smtp.gmail.com');
INSERT INTO `my_setting` VALUES ('17','EMAIL_SMTP_PORT','1','1450148291','1450148699','0','1','6','smtp端口','465','','qq,126为25，gmail为465');
INSERT INTO `my_setting` VALUES ('18','MAP_LNG','1','1450664443','1457488294','0','1','7','地图地理-纬度','121.439105','','');
INSERT INTO `my_setting` VALUES ('19','MAP_LAT','1','1450664469','1457488294','0','1','7','地图地理-经度','28.657616','','');
INSERT INTO `my_setting` VALUES ('20','MAP_CONTENT','5','1450664505','1457488294','0','1','7','地图地理-内容1','地址：浙江省台州市椒江区市府大道251-2<br/>电话：15603103232
','','');

