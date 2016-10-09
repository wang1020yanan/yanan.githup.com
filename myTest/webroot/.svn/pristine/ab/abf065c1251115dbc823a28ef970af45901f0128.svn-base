# Host: localhost  (Version: 5.5.40)
# Date: 2016-02-25 14:40:53
# Generator: MySQL-Front 5.3  (Build 4.263)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "api"
#

CREATE TABLE `api` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '接口编号',
  `aid` int(11) DEFAULT '0' COMMENT '接口分类id',
  `num` varchar(100) DEFAULT NULL COMMENT '接口编号',
  `url` varchar(240) DEFAULT NULL COMMENT '请求地址',
  `name` varchar(100) DEFAULT NULL COMMENT '接口名',
  `des` varchar(300) DEFAULT NULL COMMENT '接口描述',
  `parameter` text COMMENT '请求参数{所有的主求参数,以json格式在此存放}',
  `memo` text COMMENT '备注',
  `re` text COMMENT '返回值',
  `lasttime` int(11) unsigned DEFAULT NULL COMMENT '提后操作时间',
  `lastuid` int(11) unsigned DEFAULT NULL COMMENT '最后修改uid',
  `isdel` tinyint(4) unsigned DEFAULT '0' COMMENT '{0:正常,1:删除}',
  `type` char(11) DEFAULT NULL COMMENT '请求方式',
  `ord` int(11) DEFAULT '0' COMMENT '排序(值越大,越靠前)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='接口明细表';

#
# Data for table "api"
#

INSERT INTO `api` VALUES (1,2,'000','http://api.xxx.com','会员注册','会员注册调用此接口','a:4:{s:4:\"name\";a:3:{i:0;s:10:\"login_name\";i:1;s:8:\"password\";i:2;s:5:\"email\";}s:4:\"type\";a:3:{i:0;s:1:\"Y\";i:1;s:1:\"Y\";i:2;s:1:\"N\";}s:7:\"default\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}s:3:\"des\";a:3:{i:0;s:9:\"登录名\";i:1;s:6:\"密码\";i:2;s:12:\"用户邮箱\";}}','','{\r\n    &quot;status&quot;: 1, \r\n    &quot;info&quot;: &quot;注册成功&quot;, \r\n    &quot;data&quot;: {\r\n        &quot;uid&quot;: &quot;20&quot;\r\n    }\r\n}',1435588983,1,0,'POST',0),(2,2,'001','http://api.xxx.com','会员登录','会员登录调用此接口','a:4:{s:4:\"name\";a:3:{i:0;s:10:\"login_name\";i:1;s:5:\"email\";i:2;s:8:\"password\";}s:4:\"type\";a:3:{i:0;s:1:\"Y\";i:1;s:1:\"Y\";i:2;s:1:\"Y\";}s:7:\"default\";a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}s:3:\"des\";a:3:{i:0;s:30:\"登录名与邮箱二选其一\";i:1;s:30:\"邮箱与登录名二选其一\";i:2;s:6:\"密码\";}}','login_name 与 email 二选其一','{\r\n    &quot;status&quot;: 1, \r\n    &quot;info&quot;: &quot;登录成功&quot;, \r\n    &quot;data&quot;: [ ]\r\n}',1435576729,2,0,'POST',0);
