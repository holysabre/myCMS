-- 
-- Type: -- 备份数据库

-- 
-- 备份数据库
-- Description:当前SQL文件包含了表：my_admin、my_adminlog、my_article、my_auth、my_category、my_menu、my_modular、my_nav、my_news、my_page、my_products、my_setting
-- Time: 2015-11-19 11:18:47
--
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_adminlog` 的结构信息
DROP TABLE IF EXISTS `my_adminlog`;
CREATE TABLE `my_adminlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_nav` 的结构信息
DROP TABLE IF EXISTS `my_nav`;
CREATE TABLE `my_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `template` varchar(255) DEFAULT NULL,
  `status` tinyint(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `modular_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_news` 的结构信息
DROP TABLE IF EXISTS `my_news`;
CREATE TABLE `my_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `pid` int(11) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `top` tinyint(1) DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `imgdata` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_page` 的结构信息
DROP TABLE IF EXISTS `my_page`;
CREATE TABLE `my_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `edittime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ;

-- 数据库表：`my_products` 的结构信息
DROP TABLE IF EXISTS `my_products`;
CREATE TABLE `my_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `imgdata` varchar(255) DEFAULT NULL,
  `recommend` tinyint(1) DEFAULT '0',
  `top` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `descriptiom` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ;

-- 数据库表：my_admin 数据信息
INSERT INTO `my_admin` VALUES ('1','admin','7fef6171469e80d32c0559f88b377245','1','1','0','1447892999','1447807913','45','1','0');
INSERT INTO `my_admin` VALUES ('2','editor','e10adc3949ba59abbe56e057f20f883e','3','1','1447039282','1447059643','1447059523','5','0','0');
INSERT INTO `my_admin` VALUES ('3','bianji','670b14728ad9902aecba32e22fa4f6bd','4','1','1447039335','0','0','0','0','0');

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
INSERT INTO `my_auth` VALUES ('1','超级管理员','超管说了算','1','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17','1446881389');
INSERT INTO `my_auth` VALUES ('3','高级管理员','权限高','1','1,2,3,4,5,6,7,8,9,10,11,12,13,14','1446881601');
INSERT INTO `my_auth` VALUES ('4','管理员','基础权限','1','1,2,3,4,5','1447036558');

-- 数据库表：my_category 数据信息
INSERT INTO `my_category` VALUES ('1','0','一级分类','./upload/category/2015-10-24/1445667099723603.jpg','','2','','1','1445480216','1445667100');
INSERT INTO `my_category` VALUES ('2','1','二级分类','','','0','','1','1445480275','0');
INSERT INTO `my_category` VALUES ('4','0','一级分类2','','','2','','1','1445480291','0');
INSERT INTO `my_category` VALUES ('5','0','一级分类3','','','3','','1','1445480297','0');
INSERT INTO `my_category` VALUES ('7','5','二级分类3','','','0','二级分类3','1','1445646944','1445668415');
INSERT INTO `my_category` VALUES ('8','5','二级分类3-1','./upload/category/2015-10-24/1445668426692846.jpg,./upload/category/2015-10-24/1445668429175396.jpg,','','0','二级分类3-1','1','1445647003','1445668429');
INSERT INTO `my_category` VALUES ('9','6','三级分类2','./upload/category/2015-10-24/1445667134656758.jpg','','0','','1','1445667135','0');
INSERT INTO `my_category` VALUES ('10','0','一级分类4','./upload/category/2015-10-24/1445668038968200.jpg,./upload/category/2015-10-24/1445668041856317.jpg,','','2','','1','1445668054','1445668167');

-- 数据库表：my_menu 数据信息
INSERT INTO `my_menu` VALUES ('1','0','文章管理','','','1','1','0','1446793048','&#xe616;');
INSERT INTO `my_menu` VALUES ('2','1','文章列表','Article/index','','1','1','0','1446793269','');
INSERT INTO `my_menu` VALUES ('3','1','文章添加','Article/add','','0','1','0','1446794596','');
INSERT INTO `my_menu` VALUES ('4','1','文章修改','Article/edit','','0','1','0','1446857883','');
INSERT INTO `my_menu` VALUES ('5','1','文章删除','Article/delete','','0','1','0','1446796106','');
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
INSERT INTO `my_menu` VALUES ('18','0','单页管理','','','1','1','0','1447115794','&amp;#xe623;');
INSERT INTO `my_menu` VALUES ('19','18','单页列表','Page/index','','1','1','0','1447116578','');
INSERT INTO `my_menu` VALUES ('20','18','单页增加','Page/add','','0','1','0','1447116621','');
INSERT INTO `my_menu` VALUES ('21','18','单页修改','Page/edit','','0','1','0','1447116640','');
INSERT INTO `my_menu` VALUES ('22','18','单页删除','Page/delete','','0','1','0','1447116657','');
INSERT INTO `my_menu` VALUES ('23','1','栏目列表','Nav/index','','1','1','0','1447117538','');
INSERT INTO `my_menu` VALUES ('24','6','模块管理','Modular/index','','1','1','0','1447133795','');
INSERT INTO `my_menu` VALUES ('25','1','内容管理','Nav/content','','1','1','0','1447138449','');
INSERT INTO `my_menu` VALUES ('26','6','数据库管理','Database/index','','1','1','0','1447737851','');

-- 数据库表：my_modular 数据信息
INSERT INTO `my_modular` VALUES ('1','单页模块','page','Page','1','1','1447134649','1');
INSERT INTO `my_modular` VALUES ('2','产品模块','products','Products','3','1','1447135167','1');
INSERT INTO `my_modular` VALUES ('3','新闻模块','news','News','3','1','1447135188','1');

-- 数据库表：my_nav 数据信息
INSERT INTO `my_nav` VALUES ('1','0','关于我们','0','page','1','1447119076','1447205982','','关于我们','1');
INSERT INTO `my_nav` VALUES ('2','1','公司简介','0','','1','1447119661','0','公司简介','公司简介','1');
INSERT INTO `my_nav` VALUES ('3','1','企业文化','0','','1','1447133143','0','企业文化','企业文化','1');
INSERT INTO `my_nav` VALUES ('4','0','联系我们','0','','1','1447133156','0','联系我们','联系我们','1');
INSERT INTO `my_nav` VALUES ('5','4','联系方式','0','','1','1447133174','0','联系方式','联系方式','1');
INSERT INTO `my_nav` VALUES ('6','4','在线地图','0','','1','1447133189','0','在线地图','在线地图','1');
INSERT INTO `my_nav` VALUES ('7','0','产品中心','0','','1','1447205584','1447205829','','','2');
INSERT INTO `my_nav` VALUES ('8','7','产品分类1','0','','1','1447205601','0','','','2');
INSERT INTO `my_nav` VALUES ('9','7','产品分类2','0','','1','1447206002','0','','','2');
INSERT INTO `my_nav` VALUES ('10','0','新闻中心','0','','1','1447206026','0','','','3');
INSERT INTO `my_nav` VALUES ('11','10','公司新闻','0','0','1','1447206041','1447383547','','','3');
INSERT INTO `my_nav` VALUES ('12','10','行业资讯','0','0','1','1447206052','1447383557','','','3');
INSERT INTO `my_nav` VALUES ('13','8','产品二级分类1','0','','1','1447206571','0','','','2');
INSERT INTO `my_nav` VALUES ('14','8','产品二级分类2','0','','1','1447206583','0','','','2');

-- 数据库表：my_news 数据信息
INSERT INTO `my_news` VALUES ('1','测试新闻1','测试新闻1测试新闻1测试新闻1测试新闻1测试新闻1&lt;img src=&quot;upload/image/20151116/20151116021046_20464.jpg&quot; alt=&quot;&quot; /&gt;','11','1','0','测试新闻1','测试新闻1','1447639204','1','0','./upload/article/2015-11-16/1447639202138758.jpg','./upload/article/2015-11-16/1447639202138758.jpg');

-- 数据库表：my_page 数据信息
INSERT INTO `my_page` VALUES ('1','2','公司简介','公司简介','公司简介','公司简介','1447223471','1447289171');

-- 数据库表：my_products 数据信息
INSERT INTO `my_products` VALUES ('1','测试产品1','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('2','测试产品2','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('3','测试产品3','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('4','测试产品4','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('5','测试产品5','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('6','测试产品6','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('7','测试产品7','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('8','测试产品8','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('9','测试产品9','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('10','测试产品10','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('11','测试产品11','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('12','测试产品12','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('13','测试产品13','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('14','测试产品14','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('15','测试产品15','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');
INSERT INTO `my_products` VALUES ('16','测试产品16','./upload/article/2015-11-16/1447652722843931.jpg','./upload/article/2015-11-16/1447652722843931.jpg,./upload/article/2015-11-16/1447652722259367.jpg','1','0','1','1447652730','测试产品1','测试产品1','','0','13');

-- 数据库表：my_setting 数据信息
INSERT INTO `my_setting` VALUES ('1','WEB_SITE_KEYWORDS','5','1446531498','1446711823','0','0','1','网站关键字','网站关键字','');
INSERT INTO `my_setting` VALUES ('2','WEB_SITE_TEL','2','1446531502','1446689180','0','1','2','网站电话','88888888','');
INSERT INTO `my_setting` VALUES ('3','WEB_SITE_NAME','1','1446531597','1446534757','1','1','1','网站名称','222333','111');
INSERT INTO `my_setting` VALUES ('4','WEB_SITE_EWM','4','1446706171','0','0','1','2','网站二维码','./upload/system/2015-11-05/1446708985631767.jpg','');
INSERT INTO `my_setting` VALUES ('5','WEB_SITE_OPEN','3','1446708280','0','0','1','4','网站是否开启','0','1:开启,0:关闭');
INSERT INTO `my_setting` VALUES ('6','WEB_SITE_ICP','1','1446708715','0','0','1','3','网站版权','','');

