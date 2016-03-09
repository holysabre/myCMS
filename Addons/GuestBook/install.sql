CREATE TABLE `eg_guest_book` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言表';