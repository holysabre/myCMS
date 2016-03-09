DROP TABLE IF EXISTS `eg_job`;
CREATE TABLE `eg_job` (
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
  KEY `list` (`nid`,`lang`,`display`,`istop`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='招聘表';